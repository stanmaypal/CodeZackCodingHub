@extends('dashboard.layout')

@section('content')

<div class="container">
    <form method="POST" action="{{ route('attendance.store') }}">
        @csrf
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="classSelect" class="form-label">Class</label>
                <select class="form-select" id="classSelect" name="class_id">
                    @foreach($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="subjectSelect" class="form-label">Subject</label>
                <select class="form-select" id="subjectSelect" name="subject_id">
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="monthSelect" class="form-label">Month</label>
                <input type="month" class="form-control" id="monthSelect" name="month" value="{{ date('Y-m') }}">
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Student Name</th>
                    @for($i = 1; $i <= 31; $i++)
                        <th>{{ $i }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->student_name }}</td>
                        @for($i = 1; $i <= 31; $i++)
                            <td>
                                <input type="checkbox" name="attendance[{{ $student->id }}][{{ $i }}]">
                            </td>
                        @endfor
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Save Attendance</button>
        </div>
    </form>
</div>

@endsection
