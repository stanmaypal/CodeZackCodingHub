@extends(
    'dashboard.layout'
)


@section('content')
<div class="container mt-4">
    <h1>Teacher Details</h1>
    <div class="card mb-4">
        <div class="card-header">
            <h2>{{ $teacher->name }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    @if($teacher->photo)
                        <img src="{{ asset('storage/' . $teacher->photo) }}" alt="Profile Photo" class="img-fluid rounded">
                    @else
                        <img src="path/to/default-photo.jpg" alt="Default Photo" class="img-fluid rounded">
                    @endif
                </div>
                <div class="col-md-8">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th scope="row">Teacher ID</th>
                                <td>{{ $teacher->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Designation</th>
                                <td>{{ $teacher->designation}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Subject In Export</th>
                                <td>{{ $teacher->subject_expertise }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Date Of Birth</th>
                                <td>{{ $teacher->dob }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>{{ $teacher->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row"> Contact Details</th>
                                <td>{{ $teacher->phone }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Gender</th>
                                <td>{{ $teacher->gender }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Address</th>
                                <td>{{ $teacher->address }}</td>
                            </tr>
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('teachers.index') }}" class="btn btn-primary">Back to List</a>
    {{-- <a href="{{ route('teachers.delete',['id'=>$teacher->id ]) }}" class="btn btn-danger">Delete</a>  --}}

    <form action="{{ route('teachers.delete',['id'=>$teacher->id ]) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this teacher?')">Delete</button>
                                        </form>
    <a  href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning">Update</a> 
</div>
@endsection
