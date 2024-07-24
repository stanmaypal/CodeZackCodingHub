@extends('dashboard.layout')


@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Student</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Student</li>
    </ol>
    
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Registerd Student
        <a href="{{ route('students.export') }}" class="btn btn-success float-end">Export to Excel</a>
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
                    <th>SR</th>
                    <th>Name</th>
                    <th>Parents' Names</th>
                    <th>Course</th>
                   
                    <th>Enroll. Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>SR</th>
                    <th>Name</th>
                    <th>Parents' Names</th>
                    <th>Course</th>
                  
                    <th>Enroll. Number</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($students as $index => $student)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    {{-- <td>{{ $student->registration_number }}</td>
                    <td>{{ $student->enrollment_number }}</td> --}}
                    <td>{{ $student->student_name }}</td>
                    <td>{{ $student->father_name }}</td>
                    <td>{{ $student->classModel->name ?? 'N/A' }}</td>
                  
                    <td>{{ $student->enrollment_number }}</td>
                   
                    <td>
                        
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Student?')">Delete</button>
                        </form>
                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-success btn-sm">view</a>

                    </td>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
