<?php

namespace App\Imports;

use App\Models\Classes;
use App\Models\Collage;
use App\Models\Programme;
use App\Models\Student;
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
        $default_password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';

        return new Student([
            'name' => $row['name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'reg_number' => $row['registration_number'],
            'class_id' => $class->id ?? NULL,
            'programme_id' => $programme->id ?? NULL,
            'collage_id' => $collage->id ?? NULL,
            'password' => $default_password
        ]);
    }
}
