@extends('welcome')
@section('title')
    Team
@endsection
@section('content')

<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Instructors</h6>
            <h1 class="mb-5">Expert Instructors</h1>
        </div>
        <div class="row">
            @foreach($teachers as $teacher)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{ asset('storage/' . $teacher->photo) }}" alt="">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href="{{ $teacher->facebook_link }}"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href="{{ $teacher->twitter_link }}"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href="{{ $teacher->instagram_link }}"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">{{ $teacher->name }}</h5>
                        <small>{{ $teacher->designation }}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Team End -->

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
