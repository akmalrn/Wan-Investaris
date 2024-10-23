<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $employeesCount = Employee::count();
        $clientsCount = Client::count();
        return view('admin.employees.index', compact('employeesCount', 'clientsCount', 'employees'));
    }

    public function create()
    {
        $user = Auth::user();
        $employeesCount = Employee::count();
        $clientsCount = Client::count();
        return view('admin.employees.create', compact('employeesCount', 'clientsCount', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'password' => 'required|string|min:6',
            'phone_number' => 'nullable|string|max:15',
            'hire_date' => 'nullable|date',
            'salary' => 'nullable|numeric',
            'status' => 'required|in:active,day off,resign',
        ]);

        $request['password'] = bcrypt($request['password']);
        $request['role'] = 'employee';
        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee successfully added');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $employee = Employee::findOrFail($id);
        $employeesCount = Employee::count();
        $clientsCount = Client::count();
        return view('admin.employees.edit', compact('employeesCount', 'clientsCount', 'employee', 'user'));
    }

    public function show($id)
    {
        $user = Auth::user();
        $employee = Employee::findOrFail($id);
        $employeesCount = Employee::count();
        $clientsCount = Client::count();
        return view('admin.employees.show', compact('employeesCount', 'clientsCount', 'employee', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'position' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:15',
            'hire_date' => 'nullable|date',
            'salary' => 'nullable|numeric',
            'status' => 'required|in:active,day off,resign',
            'password' => 'nullable|string|min:8',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->position = $request->input('position');
        $employee->phone_number = $request->input('phone_number');
        $employee->hire_date = $request->input('hire_date');
        $employee->salary = $request->input('salary');
        $employee->status = $request->input('status');

        if ($request->filled('password')) {
            $employee->password = Hash::make($request->input('password'));
        }

        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee successfully deleted');
    }
}
