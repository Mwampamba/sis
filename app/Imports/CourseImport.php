<?php

namespace App\Imports;

use App\Models\Course;
use App\Models\Semester;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CourseImport implements ToModel, WithHeadingRow
{
    private $semester;

    public function __construct()
    {
        $this->semester = Semester::select('id', 'name')->get();
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $semester = $this->semester->where('name', $row['semester'])->first();

        $course = new Course();
          $course->title = $row['title'];
          $course->code = $row['code'];
          $course->credit = $row['credit'];
          $course->status = $row['status'];
          $course->semester_id = $semester->id;
    }
}
