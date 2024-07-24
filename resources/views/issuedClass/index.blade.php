@extends('dashboard.layout')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Class Issues</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Class Issues</li>
    </ol>
    
    <div class="card-header">   
        <i class="fas fa-table me-1"></i>
        Registered Class Issues
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="mb-3 my-2">
        <form method="POST" action="{{ route('generate-pdf') }}">
            @csrf
            <div class="row align-items-center">
                <div class="col-md-4">
                    <input type="date" name="issue_date" class="form-control" value="{{ request('issue_date') }}">
                </div>
                <div class="col-md-4">
                    <select class="form-select @error('class_id') is-invalid @enderror" id="inputClass" name="class_id">
                        <option value="">Select Class</option>
                        @foreach($classN as $class)
                            <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>
                                {{ $class->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Download PDF</button>
                </div>
            </div>
        </form>
        
        
        
        
    </div>

    <div class="card-body">
        <table id="datatablesSimple" class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Teacher Name</th>
                    <th>Class Name</th>
                    <th>Subject Name</th>
                    <th>Issue Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Teacher Name</th>
                    <th>Class Name</th>
                    <th>Subject Name</th>
                    <th>Issue Date</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($classIssues as $issue)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $issue->student->student_name }}</td>
                        <td>{{ $issue->teacher->name }}</td>
                        <td>{{ $issue->class->name }}</td>
                        <td>{{ $issue->subject->name }}</td>
                        <td>{{ $issue->issue_date }}</td>
                        <td><a href="{{route('class_issues.edit',['id'=>$issue->id])}}" class="btn btn-info">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
