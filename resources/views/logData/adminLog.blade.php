@extends('welcome')
@section('content')
    

<div class="container-xxl py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="bg-light rounded p-5">
                    <h3 class="text-center mb-4">Admin Login</h3>
                    <form method="POST" action="{{ route('admin.login.submit') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter admin email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                    {{-- <div class="text-center mt-4">
                        <a href="#">Forgot your password?</a>
                    </div> --}}
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