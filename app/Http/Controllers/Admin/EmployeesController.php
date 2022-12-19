<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Services\EmployeesService;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function indexAction(EmployeesService $employeesService)
    {
        $employees = Employee::all();
        return view('admin.index', [
            'employees' => $employees,
            'employeesService' => $employeesService
            ]);
    }

    public function showAction(Request $request, EmployeesService $employeesService)
    {
        $employee = Employee::find($request->id);
        $directorFullName = $employeesService->getDirectorFullName($employee);

        $data = [
            'id' => $employee->id,
            'full_name' => $employee->full_name,
            'author_email' => $employee->author_email,
            'employment_date' => $employee->employment_date,
            'phone' => $employee->phone,
            'salary' => $employee->position->salary,
            'photo' => $employee->photo,
            'director_full_name' => $directorFullName,
            'directors_list' => $employeesService->getDirectorsFullNameList(),
            'position_name' => $employeesService->getPosition($request->id),
            'position_list' => $employeesService->getPositionsList()
        ];
        return view('admin.show', ['data' => $data]);
    }

    public function editPhoto(EmployeesService $employeesService, Request $request)
    {
        $employeesService->editPhoto($request, $request->id);

        return redirect()->back();
    }
}
