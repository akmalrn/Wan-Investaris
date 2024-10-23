@extends('client.layouts')
@section('content')
<div class="widget-container">
    <div class="widget">
        <div class="widget-header">
            <h3 class="widget-title">Total Clients</h3>
        </div>
        <div class="widget-content">128</div>
    </div>
    <div class="widget">
        <div class="widget-header">
            <h3 class="widget-title">Active Projects</h3>
        </div>
        <div class="widget-content">25</div>
    </div>
    <div class="widget">
        <div class="widget-header">
            <h3 class="widget-title">Revenue</h3>
        </div>
        <div class="widget-content">$52,350</div>
    </div>
    <div class="widget">
        <div class="widget-header">
            <h3 class="widget-title">Task Completion</h3>
        </div>
        <div class="widget-content">75%</div>
        <div class="progress-bar">
            <div class="progress"></div>
        </div>
    </div>
</div>
@endsection
