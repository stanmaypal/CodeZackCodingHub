@extends('welcome')
@section('title')
    Enquirey
@endsection
@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="bg-light rounded p-5">
                    <h3 class="text-center mb-4">Enquiry Form</h3>
                    @if (session('success'))
                    <script>
                        alert('{{ session('success') }}');
                    </script>
                    @endif
                    <form method="POST" action="{{ route('enquiry.store') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="father_name">Father's Name</label>
                            <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Enter father's name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone_no">Phone No</label>
                            <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Enter phone number">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="interest_course">Interest Course</label>
                            <select class="form-control" id="interest_course" name="interest_course">
                                @foreach($courses as $course)
                                    <option value="{{ $course->name }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address" placeholder="Enter address"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="current_date">Current Date</label>
                            <input type="date" class="form-control" id="current_date" name="current_date"  value="{{ now()->format('Y-m-d') }}" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
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
