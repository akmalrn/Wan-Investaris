@extends('admin.layout')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">DataTables</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tables</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Datatables</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Manage Teams</h4>
                            <a href="{{ route('teams.create') }}" class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-plus"></i>
                                Add Team
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Team Name</th>
                                        <th>Project</th>
                                        <th>Leader</th>
                                        <th style="width: 10%; text-align:center">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nama Tim</th>
                                        <th>Proyek</th>
                                        <th>Pemimpin</th>
                                        <th style="width: 10%; text-align:center">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($teams as $team)
                                        <tr>
                                            <td>{{ $team->name }}</td>
                                            <td>{{ $team->project->name ?? '-' }}</td>
                                            <td>{{ $team->leader->name ?? '-' }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <!-- Tombol untuk Show Team -->
                                                    <a href="{{ route('teams.show', $team->id) }}"
                                                       class="btn btn-link btn-info btn-lg" data-bs-toggle="tooltip"
                                                       title="Show Team" data-original-title="Show Team">
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                    <!-- Form untuk Edit Team -->
                                                    <form action="{{ route('teams.edit', $team->id) }}" method="GET" style="display: inline;">
                                                        @csrf
                                                        <button type="submit" data-bs-toggle="tooltip" title=""
                                                            class="btn btn-link btn-primary btn-lg"
                                                            data-original-title="Edit Team">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    </form>

                                                    <!-- Form untuk Hapus Team -->
                                                    <form id="delete-form-{{ $team->id }}" action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" data-bs-toggle="tooltip" title="Delete Team" class="btn btn-link btn-danger" onclick="confirmDelete({{ $team->id }})">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
