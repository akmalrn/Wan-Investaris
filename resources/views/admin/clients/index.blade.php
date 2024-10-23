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
                                <h4 class="card-title">Add Row</h4>
                                <a href="{{ route('clients.create') }}" class="btn btn-primary btn-round ms-auto">
                                    <i class="fa fa-plus"></i>
                                    Add Client
                                </a>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone Number</th>
                                            <th>Contact Person</th>
                                            <th>Project Count</th>
                                            <th style="width: 10%; text-align:center">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Nomor HP</th>
                                            <th>Kontak person</th>
                                            <th>Jumlah Proyek</th>
                                            <th style="width: 10%; text-align:center">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($clients as $client)
                                            <tr>
                                                <td>{{ $client->name }}</td>
                                                <td>
                                                    @if ($client->phone_number)
                                                        {{ $client->phone_number }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($client->contact_person)
                                                        {{ $client->contact_person }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($client->project_count)
                                                        {{ $client->project_count }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <!-- Tombol untuk Show client -->
                                                        <a href="{{ route('clients.show', $client->id) }}"
                                                            class="btn btn-link btn-info btn-lg" data-bs-toggle="tooltip"
                                                            title="Show client" data-original-title="Show client">
                                                            <i class="fa fa-eye"></i>
                                                        </a>

                                                        <!-- Form untuk Edit client -->
                                                        <form action="{{ route('clients.edit', $client->id) }}"
                                                            method="GET" style="display: inline;">
                                                            @csrf
                                                            <button type="submit" data-bs-toggle="tooltip" title=""
                                                                class="btn btn-link btn-primary btn-lg"
                                                                data-original-title="Edit client">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </form>

                                                        <!-- Form untuk Hapus client -->
                                                        <form id="delete-form-{{ $client->id }}" action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" data-bs-toggle="tooltip" title="Delete Task" class="btn btn-link btn-danger" onclick="confirmDelete({{ $client->id }})">
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
