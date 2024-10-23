<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $clients = Client::all();

        $employeesCount = Employee::count();
        $clientsCount = Client::count();
        return view('admin.clients.index', compact('employeesCount', 'clientsCount', 'user', 'clients'));
    }

    public function create()
    {
        $user = Auth::user();

        $employeesCount = Employee::count();
        $clientsCount = Client::count();
        return view('admin.clients.create', compact('employeesCount', 'clientsCount', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:clients,email',
            'password' => 'required|string|min:6',
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'project_count' => 'nullable|integer',
            'role' => 'required|string',
        ]);

        $request['password'] = bcrypt($request['password']);
        $request['role'] = 'client';

        Client::create($request->all());

        return redirect()->route('clients.index')->with('success', 'Client added successfully');
    }


    public function show($id)
    {
        $client = Client::findOrFail($id);
        $user = Auth::user();

        $employeesCount = Employee::count();
        $clientsCount = Client::count();
        return view('admin.clients.show', compact('employeesCount', 'clientsCount', 'user', 'client'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $client = Client::findOrFail($id);

        $employeesCount = Employee::count();
        $clientsCount = Client::count();
        return view('admin.clients.edit', compact('employeesCount', 'clientsCount', 'user', 'client'));
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:clients,email,' . $client->id,
            'password' => 'nullable|string|min:6',
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'project_count' => 'nullable|integer',
        ]);

        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone_number = $request->phone_number;
        $client->address = $request->address;
        $client->contact_person = $request->contact_person;
        $client->project_count = $request->project_count;

        if ($request->password) {
            $client->password = bcrypt($request->password);
        }

        $client->save();

        return redirect()->route('clients.index')->with('success', 'Client successfully updated');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'The client was successfully deleted');
    }
}
