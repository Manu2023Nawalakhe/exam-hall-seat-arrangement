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
</br>
        <h3>
            <center>Add Exam Hall</center>
        </h3>
</br>
        <form action="./view_room.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress2">Title</label>
                    <input type="text" class="form-control" id="name" placeholder="name" name="title" />
                </div>
                <div class="form-group col-md-3">
                <label for="capacity">Capacity</label>
                    <input type="number" class="form-control" id="name" placeholder="capacity" name="capacity" /> 
                </div>
                <div class="form-group col-md-3">
                    <label for="exampleFormControlSelect1">Select Floor</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="floor">
                        <option>First</option>
                        <option>Second</option>
                        <option>Third</option>
                        <option>Fourth</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add Hall</button>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>