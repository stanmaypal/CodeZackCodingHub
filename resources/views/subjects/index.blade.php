@extends('dashboard.layout');


@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Subject</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Subjects</li>
    </ol>
    
    <div class="card-header">   
        <i class="fas fa-table me-1"></i>
        Registerd Subjects
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
                    <th scope="col">#</th>
                    <th scope="col">Subject </th>
                    <th scope="col"> Code</th>
                    <th scope="col">Class </th>
                    <th scope="col">Teacher </th>
                    <th scope="col">Desc..</th>
                    <th scope="col">Actions</th>
                </tr>
                
            </thead>
            <tfoot>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Subject </th>
                    <th scope="col"> Code</th>
                    <th scope="col">Class </th>
                    <th scope="col">Teacher </th>
                    <th scope="col">Desc..</th>
                    <th scope="col">Actions</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($subjects as $subject)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->code }}</td>
                    <td>{{ $subject->class->name }}</td>
                    <td>{{ $subject->teacher->name }}</td>
                    <td>{{ $subject->description }}</td>
                    <td>
                        <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this subject?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
