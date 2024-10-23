@extends('admin.layout')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Add New Client</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('clients.index') }}">Clients</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Client</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Name Input -->
                            <div class="form-group">
                                <label for="name">Client Name</label>
                                <input id="name" type="text" class="form-control" name="name" required>
                            </div>

                            <!-- Email Input -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email">
                            </div>

                            <!-- Password Input -->
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>

                            <!-- Phone Number Input -->
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input id="phone_number" type="text" class="form-control" name="phone_number">
                            </div>

                            <!-- Address Input -->
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input id="address" type="text" class="form-control" name="address">
                            </div>

                            <!-- Contact Person Input -->
                            <div class="form-group">
                                <label for="contact_person">Contact Person</label>
                                <input id="contact_person" type="text" class="form-control" name="contact_person">
                            </div>

                            <!-- Project Count Input -->
                            <div class="form-group">
                                <label for="project_count">Project Count</label>
                                <input id="project_count" type="number" class="form-control" name="project_count" value="0">
                            </div>

                            <!-- Role Input (default to 'client') -->
                            <input type="hidden" name="role" value="client">

                            <!-- Submit Button -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create</button>
                                <a href="{{ route('clients.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
