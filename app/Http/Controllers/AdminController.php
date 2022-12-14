<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function indexAction()
    {
        $employees = Employee::all();
        return view('admin.employees', ['employees' => $employees]);
    }
}
