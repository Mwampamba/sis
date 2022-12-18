<?php

namespace App\Imports;

use App\Models\Department;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LecturerImport implements ToModel, WithHeadingRow
{
    private $department;

    public function __construct()
    {
        $this->department = Department::select('id', 'name')->get();
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $department = $this->department->where('name', $row['department'])->first();
        $default_password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';

        return new User([
            'name' => $row['name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'staff_id' => $row['staff_id'],
            'department_id' => $department->id ?? NULL,
            'role' => '0',
            'password' => $default_password
        ]);
    }
}
