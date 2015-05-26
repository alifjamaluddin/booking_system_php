<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Student Activity Center Reservation System</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">  
  <link href="css/design-without-login.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="container-fluid">
  <div class="welcome-user">
    <p><a href="index.html"> Login Here </a></p>
</div>
<div class="jumbotron">
    <!-- <p>Book now!</p>   -->
</div>
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div data-toggle="collapse" data-parent="#accordion" href="">
          <ul id="tabs" class="nav nav-pills nav-justified" data-tabs="tabs">
            <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
            <li><a href="#about" data-toggle="tab">About</a></li>
            <li><a href="#facilities" onclick="needLogin()" data-toggle="tab">Facilities</a></li>
            <li><a href="#contact" data-toggle="tab">Contact</a></li>
        </ul>
    </div>
</div>
<div id="collapseOne" class="panel-collapse collapse in">
    <div class="panel-body">
      <div id="my-tab-content" class="tab-content">

        <div class="tab-pane active" id="home">
<?php include('templates/news.php'); ?>
</div>

<div class="tab-pane" id="about">
  <div class="container">
    <div class="news">
      <h1>STUDENT ACTIVITY CENTER UITM JASIN</h1>                
      <img class="thumbnail" src="http://placehold.it/600x200">
      <p>Student Activity Center located in UiTM Jasin is provided for student to do activities. Student Activity Center has 2<br> unit department which are Sport Unit and Co-curiculum Unit. It consists of 6 Bilik Persatuan, 1 Majlis Perwakilan Pelajar (MPP) Conference Room, 1 pingpong court
      </p>
  </div>
</div>
</div>

<div class="tab-pane" id="faciities">
  <div class="container">
    <div class="news">
      <h1>FACILITIES</h1>
  </div>
</div>
</div>

<div class="tab-pane" id="contact">
  <div class="container">
    <div class="col-md-8" id="leftCol">
      <ul id="sidebar" class="nav nav-stacked">
        <li id="sec0"><h3>Sport Unit</h3></li>
        <li id="sec1"><p>Puan Sarimah binti Hj. Mohamed</p></li>
        <li id="sec2"><p>Encik Mohd Shah Reza Mohd Shah </p></li>
        <li id="sec3"><h3>Co-Curriculum</h3></li>
        <li id="sec4"><p>Mej (K). Ahmad Zuhaili bin Abdullah</p></li>
        <li id="sec5"><p>Lt. (K). Noor Masfazura binti Mamat</p></li>
        <li id="sec6"><p>Lt. (K). Mohd Reza bin Munajat</p></li>
        <li id="sec7"><p>Lt. (K). Mohd Helmy bin Hj. Manaf</p></li>
        <li id="sec0"><p>&nbsp</p></li>
        <li id="sec8"><p>Pusat Persatuan Pelajar,</p></li>
        <li id="sec9"><p>Universiti Teknologi Mara (Melaka),</p></li>
    </ul>
</div>
<div class="col-md-2" id="rightCol">
  <ul id="sidebar" class="nav nav-stacked">
    <li id="sec0"><h3>&nbsp</h3></li>
    <li id="sec1"><p>06-xxxxxxxx</p></li>
    <li id="sec2"><p>06-xxxxxxxx </p></li>
    <li id="sec3"><h3>&nbsp</h3></li>
    <li id="sec4"><p>06-xxxxxxxx</p></li>
    <li id="sec5"><p>06-xxxxxxxx</p></li>
    <li id="sec6"><p>06-xxxxxxxx</p></li>
    <li id="sec7"><p>06-xxxxxxxx</p></li>
</ul>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>




<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed --> <!-- pegawai kanan sukan -->
<script src="js/bootstrap.js"></script>
<script src="js/dashboard.js"></script>

<script>
    function needLogin()
    {
        alert("You need to login to view the facilities !");
    }
</script>
</body>
</html>
