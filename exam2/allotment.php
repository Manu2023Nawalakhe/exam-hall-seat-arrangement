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
    include "./navbar.php";
    include "connection.php";
    ?>
    <div class="container">
        <h5>
            <center>Seat Allocation</center>
        </h5>
        <form action="./view_allotment.php" action="import.php" method="post" name="upload_excel" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputAddress2">Exam Title</label>
                    <input type="text" class="form-control" id="name" placeholder="exam title" name="exam_title" />
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

                <div class="form-group col-md-4">
                    <label for="exampleFormControlSelect1">Select Semester</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="semester">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                    </select>
                </div>
            </div>
            </br>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputAddress2">Subject</label>
                    <input type="text" class="form-control" id="name" placeholder="subject" name="subject" />
                </div>
                <div class="form-group col-md-3">
                    <label for="inputAddress2">Date</label>
                    <input type="date" class="form-control" id="name" placeholder="subject" name="date" />
                </div>
                <div class="form-group col-md-3">
                    <label for="inputAddress2">Start Time</label>
                    <input type="time" class="form-control" id="name" placeholder="subject" name="start_time" />
                </div>
                <div class="form-group col-md-3">
                    <label for="inputAddress2">End Time</label>
                    <input type="time" class="form-control" id="name" placeholder="subject" name="end_time" />
                </div>
            </div>
            <?php $sql = "SELECT * FROM teacher ";
            $result = $conn->query($sql);
            if (mysqli_num_rows($result) > 0) {
                $teacher_count=0;
                $teacher_name = array();
                while ($row = $result->fetch_assoc()) {
                    $teacher_count++; 
                    $teacher_name[$teacher_count] = $row["full_name"];
                   
                }
            }

            $sql = "SELECT * FROM rooms ";
            $result = $conn->query($sql);
            if (mysqli_num_rows($result) > 0) {
                $count = 0;
            ?>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <table class="table table-bordered">
                            <thead style="background-color: #e3f2fd;">
                                <tr>
                                    <th scope="col" style="text-align:center">Sr.No</th>
                                    <th scope="col" style="text-align:center">Title</th>
                                    <th scope="col" style="text-align:center">Capacity</th>
                                    <th scope="col" style="text-align:center">Floor</th>
                                    <th scope="col" style="text-align:center">Select</th>
                                    <th scope="col" style="text-align:center">Supervisor</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $temp_count=$teacher_count;
                                while ($row = $result->fetch_assoc()) {
                                    $count++;
                                    $temp_count=$teacher_count;
                                ?>
                                    <tr>
                                        <td style="text-align:center"><?php echo $count ?></td>
                                        <td style="text-align:center"> <?php echo $row["title"] ?></td>
                                        <td style="text-align:center"><?php echo $row["capacity"] ?></td>
                                        <td style="text-align:center"> <?php echo $row["floor"] ?></td>
                                        <td style="text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="room[]" id="exampleRadios2" value="<?php echo $row["title"]; ?>">
                                            </div>
                                        </td>
                                        <td>
                                            <select class="form-control" id="exampleFormControlSelect1" name="supervisor[]">
                                            <option>Select Supervisor</option>
                                              <?php while($temp_count)
                                              {
                                               echo'<option>';
                                               echo $teacher_name[$temp_count];
                                               echo '</option>';
                                               $temp_count--;
                                              }
                                              ?> 
                                            </select>
                                        </td>
                                    </tr>

                            <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>

                    </div>
                </div>

                <fieldset>
                    <h5>Import CSV/Excel Roll List</h5>
                    <div class="control-group">
                        <div class="controls">
                            <input type="file" name="file" id="file" class="input-large" require>
                        </div>
                    </div>

                </fieldset>
                </br>
                <button type="submit" name="Import" data-loading-text="Loading..." class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>