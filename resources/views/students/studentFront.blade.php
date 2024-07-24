@extends(
    'welcome'
)


@section('content')
<div class="container mt-4">
    <h1>Student Details</h1>
    <div class="card mb-4">
        <div class="card-header">
            <a href="{{ route('logout') }}" class="btn btn-primary">LogOut</a>
            <h2>Hello,{{ $student->student_name }}  <a href="{{ route('students.idcard',['id'=>$student->id ]) }}" class="btn btn-success float-end">Id Card</a></h2>
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
                                <th scope="row">Registration Number</th>
                                <td>{{ $student->registration_number }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Enrollement Number</th>
                                <td>{{ $student->enrollment_number }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Student ID</th>
                                <td>{{ $student->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Course</th>
                                <td>{{ $student->classModel->name ?? 'N/A' }}</td>
                            </tr>
                            {{-- <tr>
                                <th scope="row">School</th>
                                <td>Code Zack Coding Hub</td>
                            </tr>
                            <tr> --}}
                                <th scope="row">Date Of Birth</th>
                                <td>{{ $student->dob }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Father Name</th>
                                <td>{{ $student->father_name }}</td>
                            </tr>
                          
                        
                        <tr>
                            <th scope="row">Mother Name</th>
                            <td>{{ $student->mother_name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Gender</th>
                            <td>{{ $student->gender }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Category</th>
                            <td>{{ $student->caste }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Adhar No</th>
                            <td>{{ $student->aadhar }}</td>
                        </tr>
                            <tr>
                                <th scope="row">Parents' Contact Details</th>
                                <td>{{ $student->mobile }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Address</th>
                                <td>{{ $student->current_address }}</td>
                            </tr>
                           
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <h2>Rate Us</h2>
    <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="student_id" value="{{ $student->id }}">
        <input type="hidden" name="course" value="{{ $student->course }}">
        <input type="text" name="image" id="image" hidden value="{{$student->photo}}" class="form-control-file">
        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea name="comment" id="comment" class="form-control" rows="4" required></textarea>
        </div>


        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
  
    
    {{-- <a  href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Update</a>  --}}
</div>
@endsection

@section('fdata')
<div class="col-lg-3 col-md-6">
    <h4 class="text-white mb-3">Contact</h4>
    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i> {{ $contactInfo->address}}</p>
    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91  {{ $contactInfo->phone}}</p>
    <p class="mb-2"><i class="fa fa-envelope me-3"></i> {{ $contactInfo->email}}</p>
    <div class="d-flex pt-2">
        <a class="btn btn-outline-light btn-social" href="{{ $contactInfo->twitter_link}}"><i class="fab fa-twitter"></i></a>
        <a class="btn btn-outline-light btn-social" href="{{ $contactInfo->facebook_link}}"><i class="fab fa-facebook-f"></i></a>
        <a class="btn btn-outline-light btn-social" href="{{ $contactInfo->youtube_link}}"><i class="fab fa-youtube"></i></a>
        <a class="btn btn-outline-light btn-social" href="{{ $contactInfo->linkedin_link}}"><i class="fab fa-linkedin-in"></i></a>
    </div>
    @endsection

