@extends('dashboard.layout')

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <h3 class="text-center mb-4">Edit Contact Information</h3>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form method="POST" action="{{ route('contact_info.update', $contactInfo->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="logo" class="form-label">Logo</label>
                    <input type="file" class="form-control" id="logo" name="logo">
                    @if ($contactInfo->logo)
                        <img src="{{ asset($contactInfo->logo) }}" alt="Logo" class="img-fluid mt-2" style="max-width: 300px;">
                    @else
                        <p>No logo uploaded</p>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $contactInfo->name }}" placeholder="Name" required>
                </div>
                <div class="col-12">
                    <label for="about" class="form-label">About</label>
                    <textarea class="form-control" id="about" name="about" rows="4" placeholder="About">{{ $contactInfo->about }}</textarea>
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $contactInfo->phone }}" placeholder="Phone" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $contactInfo->email }}" placeholder="Email" required>
                </div>
                <div class="col-md-6">
                    <label for="twitter_link" class="form-label">Twitter Link</label>
                    <input type="url" class="form-control" id="twitter_link" name="twitter_link" value="{{ $contactInfo->twitter_link }}" placeholder="Twitter Link">
                </div>
                <div class="col-md-6">
                    <label for="facebook_link" class="form-label">Facebook Link</label>
                    <input type="url" class="form-control" id="facebook_link" name="facebook_link" value="{{ $contactInfo->facebook_link }}" placeholder="Facebook Link">
                </div>
                <div class="col-md-6">
                    <label for="youtube_link" class="form-label">YouTube Link</label>
                    <input type="url" class="form-control" id="youtube_link" name="youtube_link" value="{{ $contactInfo->youtube_link }}" placeholder="YouTube Link">
                </div>
                <div class="col-md-6">
                    <label for="linkedin_link" class="form-label">LinkedIn Link</label>
                    <input type="url" class="form-control" id="linkedin_link" name="linkedin_link" value="{{ $contactInfo->linkedin_link }}" placeholder="LinkedIn Link">
                </div>
                <div class="col-md-6">
                    <label for="instagram_link" class="form-label">Instagram Link</label>
                    <input type="url" class="form-control" id="instagram_link" name="instagram_link" value="{{ $contactInfo->instagram_link }}" placeholder="Instagram Link">
                </div>
                <div class="col-md-6">
                    <label for="map_link" class="form-label">Map Link</label>
                    <input type="url" class="form-control" id="map_link" name="map_link" value="{{ $contactInfo->map_link }}" placeholder="Map Link">
                </div>
                <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="4" placeholder="Address">{{ $contactInfo->address }}</textarea>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
