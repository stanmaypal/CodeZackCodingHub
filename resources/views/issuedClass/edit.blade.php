@extends('dashboard.layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Edit Class Issue</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('class_issues.update', $classIssue->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="inputStudent" class="form-label">Student</label>
                            <select class="form-select @error('student_id') is-invalid @enderror" id="inputStudent" name="student_id">
                                <option value="">Select Student</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}" {{ $classIssue->student_id == $student->id ? 'selected' : '' }}>
                                        {{ $student->student_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputTeacher" class="form-label">Teacher</label>
                            <select class="form-select @error('teacher_id') is-invalid @enderror" id="inputTeacher" name="teacher_id">
                                <option value="">Select Teacher</option>
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" {{ $classIssue->teacher_id == $teacher->id ? 'selected' : '' }}>
                                        {{ $teacher->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('teacher_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputClass" class="form-label">Class</label>
                            <select class="form-select @error('class_id') is-invalid @enderror" id="inputClass" name="class_id">
                                <option value="">Select Class</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}" {{ $classIssue->class_id == $class->id ? 'selected' : '' }}>
                                        {{ $class->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('class_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputSubject" class="form-label">Subject</label>
                            <select class="form-select @error('subject_id') is-invalid @enderror" id="inputSubject" name="subject_id">
                                <option value="">Select Subject</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ $classIssue->subject_id == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('subject_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control @error('issue_date') is-invalid @enderror" id="inputIssueDate" type="date" name="issue_date" value="{{ $classIssue->issue_date }}" placeholder="Select issue date" />
                            <label for="inputIssueDate">Issue Date</label>
                            @error('issue_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mt-4 mb-0">
                            <div class="d-grid">
                                <button class="btn btn-primary btn-block" type="submit">Update Class Issue</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('inputClass').addEventListener('change', function () {
        const classId = this.value;
        fetch(`/api/classes/${classId}/subjects`)
            .then(response => response.json())
            .then(data => {
                const subjectSelect = document.getElementById('inputSubject');
                subjectSelect.innerHTML = '<option value="">Select Subject</option>';
                data.forEach(subject => {
                    const option = document.createElement('option');
                    option.value = subject.id;
                    option.textContent = subject.name;
                    subjectSelect.appendChild(option);
                });
            });
    });
</script>

@endsection
