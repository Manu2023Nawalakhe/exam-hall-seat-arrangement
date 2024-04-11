<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>EXAM</title>
    <style type="text/css">
        .list-type1 {
            width: 400px;
            margin: 0 auto;
        }

        .list-type1 ol {
            counter-reset: li;
            list-style: none;
            *list-style: decimal;
            font-size: 15px;
            font-family: 'Raleway', sans-serif;
            padding: 0;
            margin-bottom: 4em;
        }

        .list-type1 ol ol {
            margin: 0 0 0 2em;
        }

        .list-type1 a {
            position: relative;
            display: block;
            padding: .4em .4em .4em 2em;
            *padding: .4em;
            margin: .5em 0;
            background: #93C775;
            color: #000;
            text-decoration: none;
            -moz-border-radius: .3em;
            -webkit-border-radius: .3em;
            border-radius: 10em;
            transition: all .2s ease-in-out;
        }

        .list-type1 a:hover {
            background: #d6d4d4;
            text-decoration: none;
            transform: scale(1.1);
        }

        .list-type1 a:before {
            content: counter(li);
            counter-increment: li;
            position: absolute;
            left: -1.3em;
            top: 50%;
            margin-top: -1.3em;
            background: #93C775;
            height: 2em;
            width: 2em;
            line-height: 2em;
            border: .3em solid #fff;
            text-align: center;
            font-weight: bold;
            -moz-border-radius: 2em;
            -webkit-border-radius: 2em;
            border-radius: 2em;
            color: #FFF;
        }

        body {
            font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
        }

        /* Table */
        .demo-table {
            border-collapse: collapse;
            font-size: 13px;
            width: 100%;
        }

        .demo-table th,
        .demo-table td {
            border: 1px solid #e1edff;
            padding: 7px 17px;
        }

        .demo-table .title {
            caption-side: bottom;
            margin-top: 12px;
        }

        /* Table Header */
        .demo-table thead th {
            background-color: #508abb;
            color: #FFFFFF;
            border-color: #6ea1cc !important;
            text-transform: uppercase;
        }

        /* Table Body */
        .demo-table tbody td {
            color: #353535;
        }

        .demo-table tbody td:first-child,
        .demo-table tbody td:last-child,
        .demo-table tbody td:nth-child(4) {
            text-align: right;
        }

        .demo-table tbody tr:nth-child(odd) td {
            background-color: #f4fbff;
        }

        .demo-table tbody tr:hover td {
            background-color: #ffffa2;
            border-color: #ffff0f;
            transition: all .2s;
        }

        /* Table Footer */
        .demo-table tfoot th {
            background-color: #e5f5ff;
        }

        .demo-table tfoot th:first-child {
            text-align: left;
        }

        .demo-table tbody td:empty {
            background-color: #ffcccc;
        }
    </style>
</head>

<body>
<?php
 include "./navbar.php";
 include "connection.php";
if (isset($_POST["Import"])) {
	$rooms = count($_POST["room"]);
	$department =  $_POST['department'];
    $supervisor =  $_POST['supervisor'];

    $start_time = $_REQUEST['start_time'];
	$end_time =  $_REQUEST['end_time'];
	$date 	=  $_REQUEST['date'];
	$exam_title =  $_REQUEST['exam_title'];
	$semester	=  $_REQUEST['semester'];
    $subject	=  $_REQUEST['subject'];
	
	$CapacityArray = array();
	$floorArray = array();
	$roomNameArray = array();
	$totalCapacity=0;
	$count = 0;
	for ($i = 0; $i < $rooms; $i++) {
		$sql = "SELECT * FROM rooms  WHERE title='" . $_POST["room"][$i] . "'";
		$result = $conn->query($sql);
		if (mysqli_num_rows($result) > 0) {
			while ($row = $result->fetch_assoc()) {
				$CapacityArray[$count]= $row["capacity"];
				$floorArray[$count]= $row["floor"];
				$roomNameArray[$count]= $row["title"];
				$count++;
			$totalCapacity+=$row["capacity"];
			}
		}
	}
	$filename = $_FILES["file"]["tmp_name"];
	if ($_FILES["file"]["size"] > 0) {
		$file = fopen($filename, "r");
		$numberofstudents = 0;
		while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
			//echo $emapData[0];
			//echo $emapData[1];
			//echo $emapData[2];
			if ($emapData[0] > 0)
				$numberofstudents++;
			//echo "</br>";
		}
		
		
		//throws a message if data successfully imported to mysql database from excel file
		echo '<div class="alert alert-success">
		<strong>Success!</strong> File Impored successfully.
	  </div>';
		if($numberofstudents>$totalCapacity)
		{
			echo '<div class="alert alert-danger">
			<strong>Fail!</strong> Selected HAL capacity(';
			echo $totalCapacity;
			echo') is less that number of students(';
			echo $numberofstudents;
		  echo')</div>';
		  
		}
		else{
			$insert_count=0;
            $desk_count=0;
			$roomIndex=0;
			$filename = $_FILES["file"]["tmp_name"];
			if ($_FILES["file"]["size"] > 0) {
				$file = fopen($filename, "r");
				while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
					//echo $emapData[0];
					//echo $emapData[1];
					//echo $emapData[2];
					if ($emapData[0] > 0)
                    {
						$numberofstudents++;
                        $desk_count++;
                    }
					echo "</br>";
					$sql = "INSERT INTO exams (title, department, semester, subject, date, start_time, end_time,roll_no,room,floor,desk_number, student_name,teacher) 
					VALUES ('$exam_title','$department','$semester','$subject','$date','$start_time','$end_time','$emapData[1]','$roomNameArray[$roomIndex]','$floorArray[$roomIndex]','$desk_count','$emapData[2]','$supervisor[$roomIndex]')";
					if (mysqli_query($conn, $sql)) {
						$insert_count++;
                        if($insert_count==$CapacityArray[$roomIndex])
                        {
                            $insert_count=0;
                            $roomIndex++;
                            $desk_count=0;
                        }
					} else {
						echo "ERROR: Hush! Sorry $sql. "
							. mysqli_error($conn);
					}
					
				}
			}
		}
	} else {
		echo '<script>alert("Please Select Roll list..!")</script>';
		header("Location:./allotment.php");
	}
	fclose($file);
}
$sql = "SELECT DISTINCT title,department,semester,subject,date,start_time,end_time,room,floor,teacher FROM exams ";
$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
   
    $count = 0;
?>
    <table class="demo-table">
        <caption class="title">
            <center>Table: List of Exam Halls</center>
        </caption>
        <thead>
            <tr>
                <th>Sr. No</th>
                <th>Exam</th>
                <th>Department</th>
                <th>Semester</th>
                <th>Subject</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Room</th>
                <th>Floor</th>
                <th>Supervisor</th>
                <th>Details</th>
                 <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                $count++;
            ?>
                <tr>
                    <td style="text-align:center"><?php echo $count ?></td>
                    <td style="text-align:center"> <?php echo $row["title"] ?></td>
                    <td style="text-align:center"> <?php echo $row["department"] ?></td>
                    <td style="text-align:center"> <?php echo $row["semester"] ?></td>
                    <td style="text-align:center"><?php echo $row["subject"] ?></td>
                    <td style="text-align:center"> <?php echo $row["date"] ?></td>
                    <td style="text-align:center"> <?php echo $row["start_time"] ?></td>
                    <td style="text-align:center"><?php echo $row["end_time"] ?></td>
                    <td style="text-align:center"> <?php echo $row["room"] ?></td>
                    <td style="text-align:center"><?php echo $row["floor"] ?></td>
                    <td style="text-align:center"><?php echo $row["teacher"] ?></td>
                    <td style="text-align:center"><?php echo '<a href="./detail_allotment.php?title=';
                    echo $row["title"];
                    echo '&subject=';
                    echo $row["subject"];
                    echo '&date=';
                    echo $row["date"];
                    echo '&room=';
                    echo $row["room"];
                    echo '&floor=';
                    echo $row["floor"];
                    echo  '">Details</a>' ?></td>
                    <td style="text-align:center"><?php echo '<a href="./delete_allotment.php?title=';
                    echo $row["title"];
                    echo '&subject=';
                    echo $row["subject"];
                    echo '&date=';
                    echo $row["date"];
                    echo '&room=';
                    echo $row["room"];
                    echo '&floor=';
                    echo $row["floor"];
                    echo  '">Delete</a>' ?></td>
                </tr>

        <?php
    }
}
    else
    {
        echo "0 Results Found..!";
    }
?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>