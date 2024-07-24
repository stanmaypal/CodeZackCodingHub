@extends('dashboard.layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Attendance Management</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('attendance.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="inputClass" class="form-label">Class</label>
                                <select class="form-select @error('class_id') is-invalid @enderror" id="inputClass" name="class_id">
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

                            <div class="col-md-4">
                                <label for="inputSubject" class="form-label">Subject</label>
                                <select class="form-select @error('subject_id') is-invalid @enderror" id="inputSubject" name="subject_id" disabled>
                                    <option value="">Select Subject</option>
                                </select>
                                @error('subject_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="inputMonth" class="form-label">Month</label>
                                <input class="form-control @error('month') is-invalid @enderror" id="inputMonth" type="month" name="month" value="{{ old('month') }}" />
                                @error('month')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered" id="attendanceTable">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <!-- Days of the month will be populated here via JavaScript -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Student rows will be populated here via JavaScript -->
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4 mb-0">
                            <div class="d-grid">
                                <button class="btn btn-primary btn-block" type="submit">Save Attendance</button>
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
        const subjectSelect = document.getElementById('inputSubject');

        if (classId) {
            fetch(`/api/classes/${classId}/subjects`)
                .then(response => response.json())
                .then(data => {
                    subjectSelect.innerHTML = '<option value="">Select Subject</option>';
                    data.forEach(subject => {
                        const option = document.createElement('option');
                        option.value = subject.id;
                        option.textContent = subject.name;
                        subjectSelect.appendChild(option);
                    });
                    subjectSelect.disabled = false;
                });
               // alert(`/api/classes/${classId}/students`);

            fetch(`/api/classes/${classId}/students`)
                .then(response => response.json())
                
                .then(data => {
                    const tbody = document.querySelector('#attendanceTable tbody');
                    tbody.innerHTML = '';
                    data.forEach(student => {
                      
                        const tr = document.createElement('tr');
                        tr.dataset.studentId = student.id;
                        tr.innerHTML = `<td>${student.student_name}</td>`;
                        tbody.appendChild(tr);
                       
                    });
                });
        } else {
            subjectSelect.innerHTML = '<option value="">Select Subject</option>';
            subjectSelect.disabled = true;
        }
    });

    document.getElementById('inputMonth').addEventListener('change', function () {
        const month = new Date(this.value);
        const daysInMonth = new Date(month.getFullYear(), month.getMonth() + 1, 0).getDate();
        const thead = document.querySelector('#attendanceTable thead tr');
        const tbody = document.querySelector('#attendanceTable tbody');

        // Clear previous headers and columns
        thead.innerHTML = '<th>Student Name</th>';
        tbody.querySelectorAll('tr').forEach(tr => {
            while (tr.cells.length > 1) {
                tr.deleteCell(1);
            }
        });

        // Add day columns
        for (let day = 1; day <= daysInMonth; day++) {
            const th = document.createElement('th');
            th.textContent = day;
            thead.appendChild(th);
            tbody.querySelectorAll('tr').forEach(tr => {
                const td = document.createElement('td');
                const select = document.createElement('select');
                select.name = `attendance[${tr.dataset.studentId}][${day}]`;
                select.innerHTML = `
                    <option value="P">P</option>
                    <option value="L">L</option>
                    <option value="A">A</option>
                    <option value="H">H</option>
                `;
                td.appendChild(select);
                tr.appendChild(td);
            });
        }
    });
</script>

@endsection
