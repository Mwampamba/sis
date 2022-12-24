<?php

namespace App\Imports;

use App\Models\Grade;
use App\Models\Course;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Semester;
use App\Models\Programme;
use App\Models\Examination;
use App\Models\AcademicYear;
use App\Models\ExaminationMark;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExaminationMarkImport implements ToModel, WithHeadingRow
{
    private $student_id;
    private $course_id;
    private $grade_id;
    private $class_id;
    private $programme_id;
    private $exam_id;
    private $year_id;
    private $semester_id;

    public function __construct()
    {
        $this->student_id = Student::select('id', 'name')->get();
        $this->course_id = Course::select('id', 'title')->get();
        $this->grade_id = Grade::select('id', 'grade_name')->get();
        $this->class_id = Classes::select('id', 'name')->get();
        $this->programme_id = Programme::select('id', 'name')->get();
        $this->exam_id = Examination::select('id', 'exam_name')->get();
        $this->semester_id = Semester::select('id', 'name')->get();
        $this->year_id = AcademicYear::select('id', 'name')->get();
    }


    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $check_grade = '';
        if ($row['score'] >= 70 && $row['score'] <= 100) {
            $check_grade = 'A';
        }
        if ($row['score'] >= 60 && $row['score'] <= 69) {
            $check_grade = 'B+';
        }
        if ($row['score'] >= 50 && $row['score'] <= 59) {
            $check_grade = 'B';
        }
        if ($row['score'] >= 40 && $row['score'] <= 49) {
            $check_grade = 'C';
        }
        if ($row['score'] >= 35 && $row['score'] <= 39) {
            $check_grade = 'D';
        }
        if ($row['score'] >= 0 && $row['score'] <= 34) {
            $check_grade = 'E';
        }
        $student = $this->student_id->where('name', $row['student_name'])->first();
        $course = $this->course_id->where('title', $row['course_title'])->first();
        $grade = $this->grade_id->where('grade_name', $check_grade)->first();
        $class = $this->class_id->where('name', $row['class_name'])->first();
        $programme = $this->programme_id->where('name', $row['programme_of_study'])->first();
        $exam = $this->exam_id->where('exam_name', $row['exam_name'])->first();
        $semester = $this->semester_id->where('name', $row['semester'])->first();
        $year = $this->year_id->where('name', $row['academic_year'])->first();

        return new ExaminationMark([
            'score' => $row['score'],
            'student_id' => $student->id ?? NULL,
            'course_id' => $course->id ?? NULL,
            'grade_id' => $grade->id ?? NULL,
            'class_id' => $class->id ?? NULL,
            'programme_id' => $programme->id ?? NULL,
            'examination_id' => $exam->id ?? NULL,
            'semester_id' => $semester->id ?? NULL,
            'academic_year_id' => $year->id ?? NULL
        ]);
    }
}
