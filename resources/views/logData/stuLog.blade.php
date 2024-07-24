@extends('welcome')
@section('content')
    

   <div class="container-xxl py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                    <div class="bg-light rounded p-5">
                        <h3 class="text-center mb-4">Student Login</h3>
                        <form method="POST" action="{{ route('student.login.submit') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="enrollment">Enrollment Number</label>
                                <input type="text" class="form-control" id="enrollment" name="enrollment" placeholder="Enter enrollment number" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="student-dob">Date of Birth</label>
                                <input type="date" class="form-control" id="student-dob" name="student_dob" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                      
                    </div>
                </div>
            </div>
        </div>
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