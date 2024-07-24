@extends('dashboard.layout')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Create Subject</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('subjects.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-floating mb-3">
                                <input class="form-control @error('name') is-invalid @enderror" id="inputSubjectName" type="text" name="name" value="{{ old('name') }}" placeholder="Enter subject name" />
                                <label for="inputSubjectName">Subject Name</label>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control @error('code') is-invalid @enderror" id="inputSubjectCode" type="text" name="code" value="{{ old('code') }}" placeholder="Enter subject code" />
                                <label for="inputSubjectCode">Subject Code</label>
                                @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="inputSubjectClass" class="form-label">Class</label>
                                <select class="form-select @error('class_id') is-invalid @enderror" id="inputSubjectClass" name="class_id">
                                    <option value="">Select Class</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>
                                            {{ $class->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('class_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="inputSubjectTeacher" class="form-label">Assigned Teacher</label>
                                <select class="form-select @error('teacher_id') is-invalid @enderror" id="inputSubjectTeacher" name="teacher_id">
                                    <option value="">Select Teacher</option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                            {{ $teacher->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('teacher_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control @error('description') is-invalid @enderror" id="inputSubjectDescription" name="description" placeholder="Enter subject description" style="height: 100px;">{{ old('description') }}</textarea>
                                <label for="inputSubjectDescription">Subject Description</label>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-block" type="submit">Create Subject</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
