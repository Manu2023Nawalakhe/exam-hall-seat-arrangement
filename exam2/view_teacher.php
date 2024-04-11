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
    if (isset($_POST['name'])) {
        $name =  $_POST['name'];
        $department = $_REQUEST['department'];
        $mobile =  $_REQUEST['mobile'];
        $email = $_REQUEST['email'];

        $sql = "INSERT INTO teacher (department,full_name,mobile,email) 
        VALUES ('$department','$name','$mobile','$email')";
        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Added Successfully")</script>';
        } else {
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
    }
    $sql = "SELECT * FROM teacher ";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) > 0) {
        $count = 0;
        ?>
            <table class="demo-table">
		<caption class="title"> <center>Table: List of Exam Supervisor</center></caption>
		<thead>
			<tr>
				<th>Sr. No</th>
				<th>Full Name</th>
			    <th>Mobile Number</th>
				 <th>E-mail</th>
				<th>Department</th>
                <th>Action</th>
			</tr>
		</thead>
		<tbody>
            <?php
        while ($row = $result->fetch_assoc()) {
            $count++;
            ?>
			<tr> 
				<td  style="text-align:center"><?php echo $count ?></td> 
				<td style="text-align:center"> <?php echo $row["full_name"] ?></td>
				<td style="text-align:center"><?php echo $row["mobile"] ?></td>
				<td style="text-align:center"> <?php echo $row["email"] ?></td>
				<td style="text-align:center"><?php echo $row["department"] ?></td>
                <td style="text-align:center"><?php echo '<a href="./delete_teacher.php?full_name=';
                    echo $row["full_name"];
                    echo '&mobile=';
                    echo $row["mobile"];
                    echo  '">Delete</a>' ?></td>
			</tr>
		
		<?php 
        }
    }
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>