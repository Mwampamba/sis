<?php

namespace App\Imports;

use App\Models\Classes;
use App\Models\Collage;
use App\Models\Student;
use App\Models\Programme;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel, WithHeadingRow
{
    private $class;
    private $programme;
    private $collage;

    public function __construct()
    {
        $this->class = Classes::select('id', 'name')->get();
        $this->programme = Programme::select('id', 'name')->get();
        $this->collage = Collage::select('id', 'name')->get();
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $class = $this->class->where('name', $row['class'])->first();
        $programme = $this->programme->where('name', $row['programme'])->first();
        $collage = $this->collage->where('name', $row['collage'])->first();

        $student = new Student();

        $student->name = $row['name'];
        $student->phone = $row['phone'];
        $student->email = $row['email'];
        $student->reg_number = $row['registration_number'];
        $student->class_id = $class->id;
        $student->programme_id = $programme->id;
        $student->collage_id = $collage->id;

        $password = Str::random(8);
        $hashed_password = Hash::make($password);
        $student->password = $hashed_password;

        $student->save();

        $body = "You can now use this as your default password. Remember to change it";

        Mail::send(
            'admin.auth.default-password',
            ['password' => $password, 'body' => $body],
            function ($message) use ($student) {
                $message->from('info@sis.ac.tz', 'Student Information System');
                $message->to($student->email, $student->name)
                    ->subject('Default Password');
            }
        );
        return $student;
       }
}
