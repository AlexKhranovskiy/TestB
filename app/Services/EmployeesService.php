<?php


namespace App\Services;


use App\Models\Employee;

class EmployeesService
{
    private Employee $employee;

    public function setEmployee(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function getDirector()
    {
        $dirctorId = unserialize($this->employee->director);
        return Employee::find($dirctorId);
    }
}
