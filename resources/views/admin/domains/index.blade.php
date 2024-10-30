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
                        <a href="#">Domains</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Row</h4>
                                <a href="{{ route('domains.create') }}" class="btn btn-primary btn-round ms-auto">
                                    <i class="fa fa-plus"></i>
                                    Add Domain
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>URL</th>
                                            <th>Project</th>
                                            <th>Registration Date</th>
                                            <th>Expiration Date</th>
                                            <th style="width: 10%; text-align:center">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>URL</th>
                                            <th>Project</th>
                                            <th>Registration Date</th>
                                            <th>Expiration Date</th>
                                            <th style="width: 10%; text-align:center">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($domains as $domain)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $domain->name }}</td>
                                                <td>{{ $domain->url }}</td>
                                                <td>{{ $domain->project->name ?? '-' }}</td>
                                                <td>{{ $domain->start_date ?? '-' }}</td>
                                                <td class="
                                                    @if ($domain->end_date)
                                                        @if (now()->isPast($domain->end_date))
                                                            bg-danger
                                                        @elseif (now()->isToday($domain->end_date))
                                                            bg-warning
                                                        @else
                                                            bg-success
                                                        @endif
                                                    @else
                                                        bg-secondary
                                                    @endif
                                                ">
                                                    {{ $domain->end_date ?? '-' }}
                                                </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <!-- Tombol untuk Show domain -->
                                                        <a href="{{ route('domains.show', $domain->id) }}"
                                                            class="btn btn-link btn-info btn-lg" data-bs-toggle="tooltip"
                                                            title="Show Domain">
                                                            <i class="fa fa-eye"></i>
                                                        </a>

                                                        <!-- Form untuk Edit domain -->
                                                        <form action="{{ route('domains.edit', $domain->id) }}"
                                                            method="GET" style="display: inline;">
                                                            @csrf
                                                            <button type="submit" data-bs-toggle="tooltip" title="Edit Domain"
                                                                class="btn btn-link btn-primary btn-lg">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </form>

                                                        <!-- Form untuk Hapus domain -->
                                                        <form id="delete-form-{{ $domain->id }}" action="{{ route('domains.destroy', $domain->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" data-bs-toggle="tooltip" title="Delete Domain" class="btn btn-link btn-danger" onclick="confirmDelete({{ $domain->id }})">
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
