@extends('dashboard.layout')


@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Enquiry</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Enquiry</li>
    </ol>
    
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Registerd Enquiry
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="card-body">
        <table id="datatablesSimple" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    
                    <th>Phone No</th>
                    <th>Email</th>
                    <th>Interest Course</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                   
                    <th>Phone No</th>
                    <th>Email</th>
                    <th>Interest Course</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($enquiries as $enquiry)
                <tr>
                    <td>{{ $enquiry->id }}</td>
                    <td>{{ $enquiry->name }}</td>
                   >
                    <td>{{ $enquiry->phone_no }}</td>
                    <td>{{ $enquiry->email }}</td>
                    <td>{{ $enquiry->interest_course }}</td>
                    <td>{{ $enquiry->current_date}}</td>
                    <td>
                        <a href="{{ route('enquiry.index') }}" class="btn btn-info">View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
