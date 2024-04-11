<?php
session_start();
  if($_SESSION['loggedin'] != true)
 header("location: login.html");
 ?>

<nav class="navbar navbar-light navbar-expand-lg"  style="background-color: #e3f2fd;">

  <a class="navbar-brand" href="#">Exam Controller</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Teacher
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="./add_teacher.php">Add new</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="./view_teacher.php">View All</a>
         
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Class Rooms
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="./add_room.php">Add New</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="./view_room.php">View All</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Exam Setting
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          
          <a class="dropdown-item" href="./allotment.php">New allotment</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="./view_allotment.php">View allotment</a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form action="seatdetails.php" method="POST" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" name="roll_number" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>