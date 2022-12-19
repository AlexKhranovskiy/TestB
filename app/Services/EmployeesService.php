<?php


namespace App\Services;


use App\Models\Employee;
use App\Models\Position;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeesService
{
//    private Employee $employee;
//
//    public function setEmployee()
//    {
//        $this->employee = $employee;
//    }

//    public function getDirector(Employee $employee)
//    {
//        $dirctorId = unserialize($employee->director);
//        return Employee::find($dirctorId);
//    }

//    public function getCollectionOfDirectors(Collection $employee)
//    {
//        $collection = collect([]);
//        $employee->each(function($item) use($collection){
//            $collection->push(unserialize($item->director));
//        });
//        return $collection;
//    }

    public function getDirectorFullName(Employee $employee)
    {
        $dirctorId = unserialize($employee->director);
        $employee = Employee::find($dirctorId);
        return is_null($employee) ? '' : $employee->full_name;
    }

    public function getDirectorsFullNameList()
    {
        $directors = [];
        $employee = Employee::where('is_director', '=', 1)->get();
        $employee->each(function ($item) use (&$directors) {
            $directors[] = $item->full_name;
        });
        return $directors;
    }

    public function getPosition(int $id)
    {
        $employee = Employee::find($id);
        return $employee->position->name;
    }

    public function getPositionsList(): Collection
    {
      return Position::all();
    }

    public function editPhoto(Request $request, int $employeeId)
    {
        $file = $request->file('photo');
        if ($file) {
            $file->store('public');
        }
        $employee = Employee::find($employeeId);
        Storage::delete('public/' . $employee->photo);
        $employee->photo = $file->hashName();
        $employee->save();
    }
}
