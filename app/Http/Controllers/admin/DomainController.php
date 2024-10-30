<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Domain;
use App\Models\admin\Project;

class DomainController extends Controller
{
    // Menampilkan semua domain
    public function index()
    {
        $domains = Domain::with('project.client')->get();
        return view('admin.domains.index', compact('domains'));
    }

    // Menampilkan form untuk membuat domain baru
    public function create()
    {
        $projects = Project::all(); // Ambil semua proyek untuk dropdown
        return view('admin.domains.create', compact('projects'));
    }

    // Menyimpan domain baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
            'project_id' => 'required|exists:projects,id',
        ]);

        // Cek jika proyek sudah memiliki domain dengan URL yang sama
        $existingDomain = Domain::where('project_id', $request->project_id)
            ->where('url', $request->url)
            ->first();

        if ($existingDomain) {
            return redirect()->back()->with(['error' => 'Domain with this URL already exists for the selected project.']);
        }

        // Jika tidak ada domain yang sama, lanjutkan untuk membuat domain baru
        Domain::create([
            'name' => $request->name,
            'url' => $request->url,
            'project_id' => $request->project_id,
            'description' => $request->description,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'dns' => $request->dns ? json_encode($request->dns) : null,
        ]);

        return redirect()->route('domains.index')->with('success', 'Domain added successfully.');
    }

    // Menampilkan detail domain berdasarkan ID
    public function show($id)
    {
        $domain = Domain::with('project.client')->findOrFail($id);
        return view('admin.domains.show', compact('domain'));
    }

    // Menampilkan form untuk mengedit domain
    public function edit($id)
    {
        $domain = Domain::findOrFail($id);
        $projects = Project::all();
        return view('admin.domains.edit', compact('domain', 'projects'));
    }

    // Memperbarui domain di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
            'project_id' => 'nullable|exists:projects,project_id'
        ]);

        $domain = Domain::findOrFail($id);
        $domain->update([
            'name' => $request->name,
            'url' => $request->url,
            'project_id' => $request->project_id,
            'description' => $request->description,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'dns' => $request->dns ? json_encode($request->dns) : null,
        ]);

        return redirect()->route('domains.index')->with('success', 'Domain updated successfully.');
    }

    // Menghapus domain dari database
    public function destroy($id)
    {
        $domain = Domain::findOrFail($id);
        $domain->delete();

        return redirect()->route('domains.index')->with('success', 'Domain successfully deleted.');
    }
}
