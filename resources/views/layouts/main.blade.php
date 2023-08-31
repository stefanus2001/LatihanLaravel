<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>

</head>
<body>

    <div class="student-page">
        <div class="overlap-wrapper">
          <div class="overlap">
            <img class="background-blur" alt="Background blur" src="image/student/bg3.jpg" />
            @yield('content')
            <div class="kotak-menu">
                <nav>
                    <ul>
                        <li><a class="user" href="user" style="text-decoration:none">User</a></li>

                        <li><a class="student" href="student" style="text-decoration:none">Student</a></li>

                        <li><a class="subject" href="subject" style="text-decoration:none">Subject</a></li>

                        <li><a class="enrollment" href="enrollment" style="text-decoration:none">Enrollment</a></li>

                        <li><a class="report" href="report" style="text-decoration:none">Report</a></li>

                        @auth
                            <li><a href="profile"><img class="logo-profile" alt="Logo profile" src="image/student/logoprofilee.png" /></a></li>
                        @else
                            <li><a href="login"><img class="logo-profile" alt="Logo profile" src="image/student/login.png" /></li>
                        @endauth
                    </ul>

                </nav>
                <img class="logo-yogya-akademik" alt="Logo yogya akademik" src="image/student/yogyaakademik.png" />
                <div class="yogya-akademik">YOGYA AKADEMIK</div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>
