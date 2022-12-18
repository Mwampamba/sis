<?php

namespace App\Imports;

use App\Models\Classes;
use App\Models\ClassCourse;
use App\Models\Course;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClassCourseImport implements ToModel, WithHeadingRow
{
    private $class;
    private $course;

    public function __construct()
    {
        $this->class = Classes::select('id', 'name')->get();
        $this->course = Course::select('id', 'title')->get();
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // $class_id = $this->class->where('name', $row['class'])->first();
        $course_id = $this->course->where('title', $row['title'])->first();
        return new ClassCourse([
            'class_id' => '7' ?? NULL,
            'course_id' => '8' ?? NULL
        ]);
    }
}
