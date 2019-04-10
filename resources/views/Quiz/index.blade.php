@extends('layouts.app')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Quiz Page</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <div class="container">
            <hr>
            <a href="#" class="btn btn-info" role="button">View</a>
            <a href="{{ url('quiz\create') }}" class="btn btn-info" role="button">Create</a>

        </div>


    </div>

@endsection