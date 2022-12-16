<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function indexAction()
    {
        $employees = Employee::all();
        return view('admin.index', ['employees' => $employees]);
    }

    public function showAction(Request $request)
    {
        $employee = Employee::find($request->id);

        $data = [
            'full_name' => $employee->full_name,
            'author_email' => $employee->author_email,
            'employment_date' => $employee->employment_date,
            'phone' => $employee->phone,
            'salary' => $employee->position->salary,
            'photo' => $employee->photo,
            'director' => $employee->director,
            'position_id' => $employee->position_id
        ];
        return view('admin.show', ['data' => $data]);
    }
}
