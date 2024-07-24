@extends(
    'welcome'
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
    {{-- <a href="{{ route('students.index') }}" class="btn btn-primary">Back to List</a> --}}
    <a href="{{ route('logout') }}" class="btn btn-primary">LogOut</a>
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

