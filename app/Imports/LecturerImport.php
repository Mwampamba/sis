<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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

        $password = Str::random(8);
        $hashed_password = Hash::make($password);

        $staff = new User();
        $staff->name = $row['name'];
        $staff->phone = $row['phone'];
        $staff->email = $row['email'];
        $staff->staff_id = $row['staff_id'];
        $staff->department_id = $department->id;
        $staff->role = 0;
        $staff->password = $hashed_password;

        $staff->save();

        $body = "You can now use this as your default password. Remember to change it";

        Mail::send(
            'admin.auth.default-password',
            ['password' => $password, 'body' => $body],
            function ($message) use ($staff) {
                $message->from('info@sis.ac.tz', 'Student Information System');
                $message->to($staff->email, $staff->name)
                    ->subject('Default Password');
            }
        );
        return $staff;
    }
}
