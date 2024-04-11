<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>EXAM</title>
</head>

<body>
    <?php
    include "./navbar.php"
    ?>
    <div class="container">
        <h3>
            <center>Add Exam Supervisor</center>
        </h3>
        <form action="./view_teacher.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="inputAddress2">Full Name</label>
                    <input type="text" class="form-control" id="name" placeholder="First, middle, last" name="name" />
                </div>
                <div class="form-group col-md-4">
                    <label for="exampleFormControlSelect1">Select Department</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="department">
                        <option>Mechanical Engineering</option>
                        <option>Electrical Engineering</option>
                        <option>Civil Engineering</option>
                        <option>Computer Engineering</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Mobile Number</label>
                    <input type="text" class="form-control" id="mobile" placeholder="10 digit Mobile Number" name="mobile" />
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">E-mail</label>
                    <input type="email" class="form-control" id="email" placeholder="email-id" name="email" />
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>