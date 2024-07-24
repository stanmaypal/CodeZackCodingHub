@php
$teacher = $teacher ?? new \App\Models\Teacher;
@endphp

<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $teacher->name) }}" required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="designation" class="col-sm-2 col-form-label">Designation</label>
    <div class="col-sm-10">
        <input type="text" class="form-control @error('designation') is-invalid @enderror" id="designation" name="designation" value="{{ old('designation', $teacher->designation) }}" required>
        @error('designation')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="subject_expertise" class="col-sm-2 col-form-label">Expert in Subject</label>
    <div class="col-sm-10">
        <input type="text" class="form-control @error('subject_expertise') is-invalid @enderror" id="subject_expertise" name="subject_expertise" value="{{ old('subject_expertise', $teacher->subject_expertise) }}" required>
        @error('subject_expertise')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="dob" class="col-sm-2 col-form-label">Date of Birth</label>
    <div class="col-sm-10">
        <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ old('dob', $teacher->dob) }}" required>
        @error('dob')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-10">
        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $teacher->phone) }}" required>
        @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $teacher->email) }}" required>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="address" class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-10">
        <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" required>{{ old('address', $teacher->address) }}</textarea>
        @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="gender" class="col-sm-2 col-form-label">Gender</label>
    <div class="col-sm-10">
        <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" required>
            <option value="Male" {{ old('gender', $teacher->gender) == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ old('gender', $teacher->gender) == 'Female' ? 'selected' : '' }}>Female</option>
            <option value="Other" {{ old('gender', $teacher->gender) == 'Other' ? 'selected' : '' }}>Other</option>
        </select>
        @error('gender')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="instagram_link" class="col-sm-2 col-form-label">Instagram Link</label>
    <div class="col-sm-10">
        <input type="url" class="form-control @error('instagram_link') is-invalid @enderror" id="instagram_link" name="instagram_link" value="{{ old('instagram_link', $teacher->instagram_link) }}">
        @error('instagram_link')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="twitter_link" class="col-sm-2 col-form-label">Twitter Link</label>
    <div class="col-sm-10">
        <input type="url" class="form-control @error('twitter_link') is-invalid @enderror" id="twitter_link" name="twitter_link" value="{{ old('twitter_link', $teacher->twitter_link) }}">
        @error('twitter_link')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="facebook_link" class="col-sm-2 col-form-label">Facebook Link</label>
    <div class="col-sm-10">
        <input type="url" class="form-control @error('facebook_link') is-invalid @enderror" id="facebook_link" name="facebook_link" value="{{ old('facebook_link', $teacher->facebook_link) }}">
        @error('facebook_link')
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
        @if(isset($teacher->photo))
            <img src="{{ asset('storage/' . $teacher->photo) }}" alt="Current Photo" class="img-thumbnail mt-2" style="max-width: 100px;">
        @endif
    </div>
</div>
