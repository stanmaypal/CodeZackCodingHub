@extends('dashboard.layout')


@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Teacher</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Teacher</li>
    </ol>
    
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Registerd Teacher
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
                    <th>Designation</th>
                    
                    <th>Phone</th>
               
                    <th>Gender</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Designation</th>
                   
                    <th>Phone</th>
                 
                    <th>Gender</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($teachers as $teacher)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $teacher->name }}</td>
                                    <td>{{ $teacher->designation }}</td>
                              
                                    
                                    <td>{{ $teacher->phone }}</td>
                                
                                    <td>{{ $teacher->gender }}</td>
                                    <td>
                                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-sm btn-info">View</a>
                                        {{-- <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this teacher?')">Delete</button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
