@extends('dashboard.layout');


@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Class</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Class</li>
    </ol>
    
    <div class="card-header">   
        <i class="fas fa-table me-1"></i>
        Registerd Class
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
                    <th>Class ID</th>
                    {{-- <th>School Name</th> --}}
                    <th>Class Name</th>
                    <th>Description</th>
                    <th>logo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Class ID</th>
                    {{-- <th>School Name</th> --}}
                    <th>Class Name</th>
                    <th>Description</th>
                    <th>logo</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($classes as $class)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $class->name }}</td>
                    <td>{{ $class->description }}</td>
                    <td>
                        @if($class->logo)
                            <img src="{{ Storage::url($class->logo) }}" alt="{{ $class->name }}" width="50px">
                        @endif
                    </td>
                    <td>
                        <!-- Add action buttons if needed -->
                        <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('classes.destroy', $class->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
