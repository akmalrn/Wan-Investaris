<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Project;
use App\Models\Client;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('client')->get();
        $user = Auth::user();
        $employeesCount = Employee::count();
        $clientsCount = Client::count();
        $projectsCount = Project::count();

        return view('admin.projects.index', compact('projects', 'user', 'employeesCount', 'clientsCount', 'projectsCount'));
    }

    public function create()
    {
        $user = Auth::user();
        $clients = Client::all();
        $employeesCount = Employee::count();
        $clientsCount = Client::count();
        $projectsCount = Project::count();

        return view('admin.projects.create', compact('user', 'clients', 'employeesCount', 'clientsCount', 'projectsCount'));
    }

    public function show(Project $project)
    {
        $user = Auth::user();
        $employeesCount = Employee::count();
        $clientsCount = Client::count();
        $projectsCount = Project::count();

        return view('admin.projects.show', compact('project', 'user', 'employeesCount', 'clientsCount', 'projectsCount'));
    }

    public function edit(Project $project)
    {
        $user = Auth::user();
        $clients = Client::all();
        $employeesCount = Employee::count();
        $clientsCount = Client::count();
        $projectsCount = Project::count();

        return view('admin.projects.edit', compact('project', 'user', 'clients', 'employeesCount', 'clientsCount', 'projectsCount'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'required|exists:clients,id',
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'budget' => 'nullable|numeric|max:9999999999999999999999999999.99',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Mengambil proyek terakhir untuk menentukan nomor berikutnya
        $lastProject = Project::orderBy('created_at', 'desc')->first();
        $nextId = 1;

        if ($lastProject) {
            // Ambil nomor terakhir dari id
            $lastId = $lastProject->id;
            $lastNumber = (int) substr($lastId, -6); // Ambil 6 digit terakhir
            $nextId = $lastNumber + 1; // Tambahkan 1
        }

        // Ambil tahun saat ini
        $currentYear = date('Y'); // Mengambil tahun saat ini
        // Format ID sesuai kebutuhan
        $formattedId = 'PROJ' . $currentYear . ':' . str_pad($nextId, 6, '0', STR_PAD_LEFT); // Contoh: PROJ2024:000001

        // Simpan proyek dengan ID terformat
        Project::create([
            'id' => $formattedId, // Menyimpan ID terformat
            'client_id' => $request->input('client_id'),
            'name' => $request->input('name'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'status' => 'unprocessed',
            'budget' => $request->input('budget'),
        ]);

        return redirect()->route('projects.index')->with('success', 'Project created successfully!');
    }

    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|in:unprocessed,ongoing,completed,cancelled',
            'budget' => 'required|numeric',
        ]);

        $project->update($validatedData);
        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
