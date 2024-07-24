@extends(
    'dashboard.layout'
)


@section('content')
<div class="container mt-4">
    <h1>Student Details</h1>
    <div class="card mb-4">
        <div class="card-header">
            <h2>{{ $student->student_name }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    @if($student->photo)
                        <img src="{{ asset('storage/' . $student->photo) }}" alt="Profile Photo" class="img-fluid rounded">
                    @else
                        <img src="path/to/default-photo.jpg" alt="Default Photo" class="img-fluid rounded">
                    @endif
                </div>
                <div class="col-md-8">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th scope="row">Student ID</th>
                                <td>{{ $student->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Course</th>
                                <td>{{ $student->classModel->name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th scope="row">School</th>
                                <td>Code Zack Coding Hub</td>
                            </tr>
                            <tr>
                                <th scope="row">Date Of Birth</th>
                                <td>{{ $student->dob }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Parents' Names</th>
                                <td>{{ $student->father_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Parents' Contact Details</th>
                                <td>{{ $student->mobile }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Address</th>
                                <td>{{ $student->current_address }}</td>
                            </tr>
                           
                            <tr>
                                <th scope="row">Registration Number</th>
                                <td>{{ $student->registration_number }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Enrollement Number</th>
                                <td>{{ $student->enrollment_number }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('students.index') }}" class="btn btn-primary">Back to List</a>
    <a href="{{ route('students.idcard',['id'=>$student->id ]) }}" class="btn btn-success">Id Card</a> 
    <a  href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Update</a> 
</div>
@endsection
