<!DOCTYPE html>
<html>
<head>
    <title>Class Issues</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1 style="text-align:center;font-size:45px;color:blueviolet">Code Zack Coding Hub</h1>
    <h1>Class Issues</h1>
    @if(request('issue_date'))
        <p>Issue Date: {{ request('issue_date') }}</p>
    @endif
    <table>
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Phone</th>
                <th>Class Name</th>
                <th>Subject Name</th>
                <th>Issue Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classIssues as $issue)
                <tr>
                    <td>{{ $issue->student->student_name }}</td>
                    <td>{{ $issue->student->mobile}}</td>
                    <td>{{ $issue->class->name }}</td>
                    <td>{{ $issue->subject->name }}</td>
                    <td>{{ $issue->issue_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
