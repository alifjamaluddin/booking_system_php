<?php

require("php/config.php");

if (!isset($_SESSION))
{
    session_start();
}
else
{
    header("Location: " ."../".index_view);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Student Activity Center Reservation System</title>

    <!-- Bootstrap -->
    <link href="css/datepicker.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/calendar.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">  
    <link href="css/design-instructor.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body class="container-fluid">

    <div class="welcome-user">
        <p> Welcome, <span><?php echo $_SESSION['name']; ?></span> <a href="php/logout.php"> Logout </a></p>
    </div>

    <div class="jumbotron">
        <p>Book now!</p>  
    </div>

    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div data-toggle="collapse" data-parent="#accordion" href="">
                    <ul id="tabs" class="nav nav-pills nav-justified" data-tabs="tabs">
                        <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
                        <li><a href="#about" data-toggle="tab">About</a></li>
                        <li><a href="#facilities" data-toggle="tab">Facilities</a></li>
                        <li><a href="#contact" data-toggle="tab">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    <div id="my-tab-content" class="tab-content">
                        <div class="tab-pane active" id="home">
                            <div class="container">
                                <div class="news">
                                    <h1>LATEST NEWS & ANNOUNCEMENT </h1>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img class="thumbnail" src="http://placehold.it/200x200">
                                        </div>
                                        <div class="col-md-4">
                                            <img class="thumbnail" src="http://placehold.it/200x200">
                                        </div>
                                        <div class="col-md-4">
                                            <img class="thumbnail" src="http://placehold.it/200x200">
                                        </div>
                                    </div>
                                </div>
                            </div>
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

                        <div class="tab-pane" id="facilities" style="overflow-y: scroll;">
                            <div class="col-md-3" id="leftCol">
                                <ul id="sidebar" class="nav nav-stacked">
                                    <li id="sec0"><a href="#sec0">Reservation Calendar</a></li>
                                    <li id="sec1"><a href="#sec0">Reservation Form</a></li>
                                    <li id="sec2"><a href="#sec1">Reservation Status</a></li>
                                    <li id="sec3"><a href="#sec2">Update Personal Information</a></li>
                                    <li id="sec4"><a href="#sec3">Terms and Conditions</a></li>   
                                </ul>
                            </div>            
                            <div class="col-md-9">

                                <!--Start of section 0-->
                                <div id="sec0r">
                                    <?php include 'php/calendar.php';
                                    $timezone = date_default_timezone_set('Asia/Kuala_Lumpur');

                                    $month = date('m');
                                    $year = date('Y');
                                    echo $timezone." ";
                                    echo $val1;
                                    echo $val2;
                                    if( isset($_GET['submit']) )
                                    {                    
                                        $month = htmlentities($_GET['month']);
                                        $year = htmlentities($_GET['year']);
                                        echo $month;
                                        echo $year;
                                        echo draw_calendar($month, $year);
                                    }
                                    else{
                                        echo $month;
                                        echo $year;
                                        echo draw_calendar($month, $year);
                                    }
                                    ?>

                                    <form role="form" action="" method="get" id="dropdown">
                                        <div class="form-group">
                                            <label for="month">Month</label>
                                            <select class="form-control" name="month">
                                                <option value="01">January</option>
                                                <option value="02">February</option>
                                                <option value="03">March</option>
                                                <option value="04">April</option>
                                                <option value="05">May</option>
                                                <option value="06">June</option>
                                                <option value="07">July</option>
                                                <option value="08">August</option>
                                                <option value="09">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="year">Year :</label>
                                            <div class="form-group">
                                                <select class="form-control" name="year">
                                                    <option value="2015">2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017">2017</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" name="submit" value="submit" class="btn btn-default">Submit</button>
                                    </form>
                                </div>
                                <!--End of section 0-->

                                <!--Start of section 1-->
                                <div id="sec1r">
                                    <legend>
                                        <h2>Reservation Form</h2>
                                    </legend>
                                    <div class="contain">
                                        <div class="hero-unit">
                                            <form role="form" action="php/reservation.php" method="POST">
                                             <div class="input-daterange" id="datepicker" data-date-format="yyyy-m-d">
                                                <label>Date of reservation :</label>
                                                <input type="text" class="input-small" name="date_from">
                                                <span class="add-on" style="vertical-align: top;height:25px">to</span>
                                                <input type="text" class="input-small" name="date_to" />
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                           <div class="col-md-1">
                                             <label>Time :</label>
                                         </div>
                                         <div class="col-md-1">
                                          <label>From</label>
                                      </div>
                                      <div class="col-md-3">
                                       <div class="form-group">
                                         <select class="form-control" name="time_from">
                                            <option value="08:00">08:00</option>
                                            <option value="09:00">09:00</option>
                                            <option value="10:00">10:00</option>
                                            <option value="11:00">11:00</option>
                                            <option value="12:00">12:00</option>
                                            <option value="13:00">13:00</option>
                                            <option value="14:00">14:00</option>
                                            <option value="15:00">15:00</option>
                                            <option value="16:00">16:00</option>
                                            <option value="17:00">17:00</option>
                                            <option value="18:00">18:00</option>
                                            <option value="19:00">19:00</option>
                                            <option value="20:00">20:00</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-1">
                                 <label>To</label>
                             </div>
                             <div class="col-md-3">
                              <form role="form">
                                 <div class="form-group">
                                   <select class="form-control" name="time_to">
                                      <option value="08:00">08:00</option>
                                      <option value="09:00">09:00</option>
                                      <option value="10:00">10:00</option>
                                      <option value="11:00">11:00</option>
                                      <option value="12:00">12:00</option>
                                      <option value="13:00">13:00</option>
                                      <option value="14:00">14:00</option>
                                      <option value="15:00">15:00</option>
                                      <option value="16:00">16:00</option>
                                      <option value="17:00">17:00</option>
                                      <option value="18:00">18:00</option>
                                      <option value="19:00">19:00</option>
                                      <option value="20:00">20:00</option>
                                  </select>
                              </div>

                          </div>
                      </div>

                      <div class="row">                      
                        <div class="col-md-2">
                          <label>Facilities :</label>
                      </div>
                      <div class="col-md-3">
                          <form role="form">
                             <div class="form-group">
                               <select class="form-control" name="fac_id">
                                  <option value="Bilik Persatuan 1">Bilik Persatuan 1</option>
                                  <option value="Bilik Persatuan 2">Bilik Persatuan 2</option>
                                  <option value="Bilik Persatuan 3">Bilik Persatuan 3</option>
                                  <option value="Bilik Persatuan 4">Bilik Persatuan 4</option>
                                  <option value="Bilik Persatuan 5">Bilik Persatuan 5</option>
                              </select>
                          </div>

                      </div>                     
                  </div>

                  <div class="row">                      
                    <div class="col-md-2">
                      <label>Types Of Events :</label>
                  </div>
                  <div class="col-md-3">
                      <form role="form">
                        <div class="radio">
                          <label><input type="radio" name="event" value="Conference">Conference</label>
                      </div>
                      <div class="radio">
                          <label><input type="radio" name="event" value="Conference">Seminar</label>
                      </div>
                      <div class="radio">
                          <label><input type="radio" name="event" value="Exhibition">Exhibition</label>
                      </div>
                      <div class="radio">
                          <label><input type="radio" name="event" value="Dinner/Reception">Dinner/Reception</label>
                      </div>
                      <div class="radio">
                          <label><input type="radio" name="event" value="Team Building/Recreation">Team Building/Recreation</label>
                      </div>
                      <div class="radio">
                          <label><input type="radio" name="event" value="Accomodation">Accomodation</label>
                      </div>
                      <div class="radio">
                          <label><input type="radio" name="event" value="Anual Meeting">Anual Meeting</label>
                      </div>

                  </div>                     
              </div>

              <div class="row">
                  <div class="col-md-2">
                    <label>Poster Of Events :</label>
                </div>                      
                <div class="col-md-2">
                  <input type="file" name="poster" accept="image/*">
              </div>                     
          </div>

          <div class="row">
            <div class="col-md-2">
              <label>Reference ID :</label>
          </div>                      
          <div class="col-md-3">
              <p>*system generated id</p>
          </div>                     
      </div>

      <div class="col-xs-3">
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>"/>
    </div>

    <button type="submit" name="submit" class="btn btn-default">Submit</button>


</form>

</div>  
</div>
<!--End of section 1-->

<!--Start of section 2-->
<div id="sec2r">
    <legend>
        <h2>Reservation Status</h2>
    </legend>
    <?php
    include 'php/reservationStatus.php';
    echo reservationStatus($_SESSION['id']);
    ?>
</div> 
<!--End of section 2-->

<!-- Start of section 3 -->
<div id="sec3r">
    <form role="form" action="php/userUpdateProfile.php" method="POST">
        <div class="row">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>"/>
            <div class="col-md-2">
                <label for="pass">Password :</label>
            </div>
            <div class="col-xs-3">
                <input type="pwd" class="form-control" name="new_password" required>
            </div>
        </div>
        <br />
        <div class="row">
        <div class="col-md-2">
        <label for="pass">Password Confirmation :</label>
        </div>
        <div class="col-xs-3">
            <input type="pwd" class="form-control" name="con_password" required>
        </div>
        </div>
    <br />
    <div class="row">
        <div class="col-md-2">
            <label for="email">Email :</label>
        </div>
        <div class="col-xs-3">
            <input type="email" class="form-control" name="email" required>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-2">
            <label for="contact no">Contact No :</label>
        </div>
        <div class="col-xs-3">
            <input class="form-control" name="contact_no" required>
        </div>
    </div>
    <br>

    <button type="submit" name="submit">Update</button>                     

</form>
</div>
<!-- End of section 3 -->

<!-- Start of section 4 -->
<!-- End of section 4 -->


<!-- Start of section 5 -->
<!-- End of section 5 -->
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
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/dashboard.js"></script>


<!-- Load jQuery and bootstrap datepicker scripts -->
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
<script>
// When the document is ready
$(document).ready(function () {

    $('.input-daterange').datepicker({
        todayBtn: "linked"
    });

});
</script>
</body>
</html>