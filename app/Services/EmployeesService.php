<?php


namespace App\Services;


use App\Models\Employee;
use Illuminate\Database\Eloquent\Collection;

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

    public function getCollectionOfDirectors(Collection $employee)
    {
        $collection = collect([]);
        $employee->each(function($item) use($collection){
            $collection->push(unserialize($item->director));
        });
        return $collection;
    }

    public function getDirectorFullName(Employee $employee)
    {
        $dirctorId = unserialize($employee->director);
        $employee = Employee::find($dirctorId);
        return is_null($employee) ? '' : $employee->full_name;
    }
}
