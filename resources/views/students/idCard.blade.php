<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student ID Card</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f2f5;
            font-family: Arial, sans-serif;
        }
        .id-card {
            width: 300px; /* Width of the ID card */
            height: 500px; /* Height of the ID card */
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .id-card header {
            background: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            display: flex;
            align-items: center; /* Center align items vertically */
        }
        .id-card header .logo {
            margin-right: 10px; /* Margin between logo and text */
        }
        .id-card header h1 {
            margin: 0;
            font-size: 1.5em;
        }
        .id-card .details {
            padding: 20px;
            text-align: center;
        }
        .id-card .details img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .id-card .details h2 {
            margin: 10px 0;
            font-size: 1.2em;
            color: #333;
        }
        .id-card .details p {
            margin: 5px 0;
            color: #555;
        }
        .id-card .details .info {
            text-align: left;
            margin-top: 20px;
        }
        .id-card .details .info p {
            margin: 8px 0;
            font-size: 0.9em;
            text-align: center;
        }
        .id-card .details .info .label {
            font-weight: bold;
            color: #007bff;
        }
        .id-card .details .barcode {
            text-align: center;
            margin-top: 20px;
        }
        .id-card .details .barcode img {
            width: 150px;
        }
        .id-card .address {
            background-color: #f1f1f1;
            padding: 10px;
            text-align: center;
            font-size: 0.9em;
            color: #333;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        .download-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class="id-card" id="idCard">
        <header>
            <div class="logo">
                <img src="{{asset('img/logo.jpg')}}" alt="School Logo" style="width: 40px; height: 40px; border-radius: 50%;">
            </div>
            <h1>CodeZack Coding Hub</h1>
        </header>
       
        <div class="details">
            <img src="{{ Storage::url($student->photo) }}" alt="Profile Photo" class="img-fluid rounded">
            <h2>{{ $student->student_name }}</h2>
            {{-- <p>Parents:{{ $student->parents_names }}</p>
            <p>Class: {{$student->class->class_name}}</p>
            <p>DOB: {{$student->dob}}</p> --}}
            <div class="info">
                <p><span class="label">Parents:</span>{{ $student->father_name }}</p>
                <p><span class="label">Class: </span>{{ $student->classModel->name ?? 'N/A' }}</p>
                <p><span class="label">DOB: </span>{{$student->dob}}</p>
                <p><span class="label">Reg. No:</span> {{ $student->registration_number }}</p>
                <p><span class="label">Enroll. No:</span> {{ $student->enrollment_number }}</p>
            </div>
            {{-- <div class="barcode">
                <img src="barcode.png" alt="Barcode">
            </div> --}}
        </div>
        <div class="address">
          Civil Lines Park Road Golghar Gorakhpur UP,India 273003
    </div>
    <div class="button-container">
        <button class="download-button" onclick="downloadIDCard('png')">Download PNG</button>
        <button class="download-button" onclick="downloadIDCard('pdf')">Download PDF</button>
    </div>

    <!-- Include html2canvas library -->
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.3.2/dist/html2canvas.min.js"></script>
    <!-- Include jsPDF library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script>
        function downloadIDCard(format) {
            const idCard = document.getElementById('idCard');
            html2canvas(idCard).then(canvas => {
                if (format === 'png') {
                    const link = document.createElement('a');
                    link.href = canvas.toDataURL('image/png');
                    link.download = '{{ $student->student_name }}_id_card.png';
                    link.click();
                } else if (format === 'pdf') {
                    const { jsPDF } = window.jspdf;
                    const pdf = new jsPDF('p', 'pt', [canvas.width, canvas.height]);
                    const imgData = canvas.toDataURL('image/png');
                    pdf.addImage(imgData, 'PNG', 0, 0, canvas.width, canvas.height);
                    pdf.save('{{ $student->student_name }}_id_card.pdf');
                }
            });
        }
    </script>
</body>
</html>
