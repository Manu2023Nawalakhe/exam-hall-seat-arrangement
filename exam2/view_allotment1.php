<?php
if (isset($_POST["Import"])) {
	$rooms = count($_POST["room"]);
	include "connection.php";
	$CapacityArray = array();
	$totalCapacity=0;
	for ($i = 0; $i < $rooms; $i++) {
		$sql = "SELECT * FROM rooms  WHERE title='" . $_POST["room"][$i] . "'";
		$result = $conn->query($sql);
		if (mysqli_num_rows($result) > 0) {
			$count = 0;
			while ($row = $result->fetch_assoc()) {
				$CapacityArray[$count]= $row["capacity"];
				$count++;
			$totalCapacity+=$row["capacity"];
			}
		}
	}
	echo $totalCapacity;
	echo $filename = $_FILES["file"]["tmp_name"];
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
		echo "Total: ";
		echo $numberofstudents;
		fclose($file);
		//throws a message if data successfully imported to mysql database from excel file
		echo '<div class="alert alert-success">
		<strong>Success!</strong> File Impored successfully.
	  </div>';
		if($numberofstudents>$totalCapacity)
		{
			echo '<div class="alert alert-danges">
			<strong>Success!</strong> Selected HAL capacity is less that number of students.
		  </div>';
		}
		
	} else {
		echo '<script>alert("Please Select Roll list..!")</script>';
		header("Location:./allotment.php");
	}

}
