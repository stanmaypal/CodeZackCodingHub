@extends('dashboard.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">New Registration</h3></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="studentName" class="col-sm-2 col-form-label">Student Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('student_name') is-invalid @enderror" id="studentName" name="student_name" placeholder="Student Full Name" value="{{ old('student_name') }}">
                                @error('student_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dob" class="col-sm-2 col-form-label">Date of Birth</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ old('dob') }}">
                                @error('dob')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-10">
                                <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                                    <option value="">--Select Gender--</option>
                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="course" class="col-sm-2 col-form-label">Course</label>
                            <div class="col-sm-4">
                                <select class="form-control @error('course') is-invalid @enderror" id="course" name="course">
                                    <option value="">--Select Course--</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id}}" {{ old('course') == $class->name ? 'selected' : '' }}>{{ $class->name }}</option>
                                    @endforeach
                                </select>
                                @error('course')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                          
                        </div>
                        <div class="form-group row">
                            <label for="fatherName" class="col-sm-2 col-form-label">Father Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('father_name') is-invalid @enderror" id="fatherName" name="father_name" placeholder="Father Name" value="{{ old('father_name') }}">
                                @error('father_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <label for="motherName" class="col-sm-2 col-form-label">Mother Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('mother_name') is-invalid @enderror" id="motherName" name="mother_name" placeholder="Mother Name" value="{{ old('mother_name') }}">
                                @error('mother_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="caste" class="col-sm-2 col-form-label">Caste</label>
                            <div class="col-sm-4">
                                <select class="form-control @error('caste') is-invalid @enderror" id="caste" name="caste">
                                    <option value="General" {{ old('caste') == 'General' ? 'selected' : '' }}>General</option>
                                    <option value="OBC" {{ old('caste') == 'OBC' ? 'selected' : '' }}>OBC</option>
                                    <option value="SC/ST" {{ old('caste') == 'SC/ST' ? 'selected' : '' }}>SC/ST</option>
                                    <option value="Other" {{ old('caste') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('caste')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <label for="registrationDate" class="col-sm-2 col-form-label">Registration Date</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control @error('registration_date') is-invalid @enderror" id="registrationDate" name="registration_date" value="{{ now()->format('Y-m-d') }}" readonly>
                                @error('registration_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="aadhar" class="col-sm-2 col-form-label">Aadhar No</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('aadhar') is-invalid @enderror" id="aadhar" name="aadhar" placeholder="Aadhar No" value="{{ old('aadhar') }}">
                                @error('aadhar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <label for="mobile" class="col-sm-2 col-form-label">Mobile No (SMS)</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" placeholder="Mobile No (SMS Send This No)" value="{{ old('mobile') }}">
                                @error('mobile')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email ID</label>
                            <div class="col-sm-4">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Email ID" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <label for="whatsapp" class="col-sm-2 col-form-label">Whatsapp No</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" id="whatsapp" name="whatsapp" placeholder="Whatsapp No" value="{{ old('whatsapp') }}">
                                @error('whatsapp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="currentAddress" class="col-sm-2 col-form-label">Current Address</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('current_address') is-invalid @enderror" id="currentAddress" name="current_address" placeholder="Enter Current Address">{{ old('current_address') }}</textarea>
                                @error('current_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="permanentAddress" class="col-sm-2 col-form-label">Permanent Address</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('permanent_address') is-invalid @enderror" id="permanentAddress" name="permanent_address" placeholder="Enter Permanent Address">{{ old('permanent_address') }}</textarea>
                                @error('permanent_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file @error('photo') is-invalid @enderror" id="photo" name="photo">
                                <small class="form-text text-muted">(Image Size Max 100KB)</small>
                                @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="{{ route('students.index') }}">View All Registrations</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
