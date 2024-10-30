<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Project;
use App\Models\Client;
use App\Models\Employee;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $employeesCount = Employee::count();
        $clientsCount = Client::count();
        $projectsCount = Project::count();
        $projectsStatusCompleted = Project::where('status', 'completed')->count();
        return view('admin.index', compact('clientsCount', 'employeesCount', 'projectsCount', 'projectsStatusCompleted'));
    }

}
