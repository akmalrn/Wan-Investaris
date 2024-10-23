@extends('employee.layouts')
@section('title', 'Dashboard')
@section('content')

<div class="container mt-4">
    <div class="row">
        <!-- Performance Score Widget -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Performance Score</h3>
                </div>
                <div class="card-body text-center">
                    <h2 class="display-4">85%</h2>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upcoming Tasks Widget -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Upcoming Tasks</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Project Review
                            <span class="badge bg-warning text-dark">Pending</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Team Meeting
                            <span class="badge bg-info text-dark">In Progress</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Training Session
                            <span class="badge bg-success">Completed</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Time Off Balance Widget -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Time Off Balance</h3>
                </div>
                <div class="card-body text-center">
                    <h2 class="display-4">15 days</h2>
                </div>
            </div>
        </div>

        <!-- Recent Announcements Widget -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Announcements</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Company Picnic Next Month</li>
                        <li class="list-group-item">New Health Benefits Package</li>
                        <li class="list-group-item">Q4 Goals Submission Due</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
