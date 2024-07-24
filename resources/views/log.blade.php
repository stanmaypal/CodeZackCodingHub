<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login - eLEARNING</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Login Form Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="bg-light rounded p-5">
                        <h3 class="text-center mb-4">Login</h3>
                        <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="role">Role</label>
                                <select class="form-control" id="role" name="role">
                                    <option value="admin">Admin</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="student">Student</option>
                                </select>
                            </div>

                            <div class="form-group mb-3" id="admin-login">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter admin email" required>
                                <label for="password" class="mt-3">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                            </div>

                            <div class="form-group mb-3 d-none" id="teacher-login">
                                <label for="teacher-email">Email Address</label>
                                <input type="email" class="form-control" id="teacher-email" name="teacher_email" placeholder="Enter teacher email" required>
                                <label for="teacher-dob" class="mt-3">Date of Birth</label>
                                <input type="date" class="form-control" id="teacher-dob" name="teacher_dob" required>
                            </div>

                            <div class="form-group mb-3 d-none" id="student-login">
                                <label for="enrollment">Enrollment Number</label>
                                <input type="text" class="form-control" id="enrollment" name="enrollment" placeholder="Enter enrollment number" required>
                                <label for="student-dob" class="mt-3">Date of Birth</label>
                                <input type="date" class="form-control" id="student-dob" name="student_dob" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                        <div class="text-center mt-4">
                            <a href="#">Forgot your password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Form End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
        document.getElementById('role').addEventListener('change', function () {
            var role = this.value;
            document.getElementById('admin-login').classList.add('d-none');
            document.getElementById('teacher-login').classList.add('d-none');
            document.getElementById('student-login').classList.add('d-none');

            if (role === 'admin') {
                document.getElementById('admin-login').classList.remove('d-none');
            } else if (role === 'teacher') {
                document.getElementById('teacher-login').classList.remove('d-none');
            } else if (role === 'student') {
                document.getElementById('student-login').classList.remove('d-none');
            }
        });
    </script>
</body>

</html>
