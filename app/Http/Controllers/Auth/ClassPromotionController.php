<?php

namespace App\Http\Controllers\Auth;

use App\Models\Classes;
use App\Models\Collage;
use App\Models\Student;
use App\Models\Programme;
use App\Models\AcademicYear;
use App\Models\ClassPromotion;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ClassPromotionRequestForm;

class ClassPromotionController extends Controller
{
    public function create()
    {
        $title = [
            'title' => 'SIS | Promote class'
        ];

        $students = Student::all();
        $collages = Collage::all();
        $programmes = Programme::all();
        $classes = Classes::where('status', true)->get();
        $years = AcademicYear::all();

        return view('admin.class-promotions.create', $title, compact('students', 'collages', 'programmes', 'classes', 'years'));
    }

    public function save(ClassPromotionRequestForm $request)
    {
        $validatedData = $request->validated(); 
        $class_id = $validatedData['from_class_name'];

        DB::beginTransaction();
        $class = Classes::findOrFail($class_id);

        if ($class) {
            $students = Student::where('class_id', $class->id)->get();

            foreach ($students as $student) {
                $student_ids = explode(',', $student->id);
                Student::whereIn('id', $student_ids)->update([
                    'class_id' =>  $request->to_class_name,
                    'programme_id' => $request->to_programme_name,
                    'collage_id' => $request->to_collage_name
                ]);

                ClassPromotion::updateOrCreate([
                    'class_id' => $request->from_class_name,
                    'programme_id' => $request->from_programme_name,
                    'collage_id' =>  $request->from_collage_name,
                    'academic_year_id' => $request->from_year_name,
                    'to_collage_id' =>  $request->to_collage_name,
                    'to_programme_id' => $request->to_programme_name,
                    'to_class_id' => $request->to_class_name,
                    'new_academic_year_id' => $request->to_year_name
                ]);

                $class->update([
                    'academic_year_id' => $request->to_year_name
                ]);
            }

            DB::commit();

            return redirect()->route('classes')->with('success', 'Class has been promoted successfully!');
        } else {
            echo 'Something went wrong';
        }
    }
}
