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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Student Activity Center Reservation System</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/datepicker.css" rel="stylesheet">
    <link href="css/calendar.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">


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
                        <li><a href="#dashboard" data-toggle="tab">Dashboard</a></li>
                    </ul>
                </div>
            </div>

            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    <div id="my-tab-content" class="tab-content">
                        <div class="tab-pane active" id="home">
                            <?php include('templates/news.php'); ?>
                        </div>
                        <div class="tab-pane" id="dashboard" style="overflow-y: scroll;">

                            <div class="col-md-3" id="leftCol">
                                <ul id="sidebar" class="nav nav-stacked">
                                    <li id="sec0"><a href="#sec0">Reservation Calendar</a></li>
                                    <li id="sec1"><a href="#sec1">New Reservation</a></li>
                                    <li id="sec2"><a href="#sec2">Reservation Approval Message</a></li>
                                    <li id="sec3"><a href="#sec3">Create New User</a></li>
                                    <li id="sec4"><a href="#sec4">Change Password</a></li>
                                    <li id="sec5"><a href="#sec5">Generate Report</a></li>
                                </ul>
                            </div>

                            <div class="col-md-9">
                                <!-- Start of section 1 -->
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


                                <!-- End of section 1 -->

                                <!-- Start of section 2 -->
                                <div id="sec1r">
                                    <h2>New Reservation</h2>
                                    <?php
                                    include 'php/getReservation.php';
                                    echo showReservation();
                                    ?>
                                </div> 
                                <!--End of section 2-->

                                <!--Start of section 3-->
                                <div id="sec2r">
                                    <h2>Reservation message of approval</h2>
                                    <form>
                                        <div class="form-group">
                                            <label for="RefID">Reference ID</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="contactNo">Contact</label>
                                            <input type="tel" class="form-control" id="contactNo" placeholder="Contact No." />
                                        </div>
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <input type="text" class="form-control"  id="message" placeholder="Enter your message"/>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-default">Reset</button>
                                        <button type="submit" name="submit" class="btn btn-default">Send</button>
                                    </form>
                                </div> 
                                <!--End of section 3-->

                                <!-- Start of section 6 -->
                                <div id="sec3r">
                                    <h2>Create new user</h2>
                                    <form action="php/user_registration.php" method="POST">
                                        <div class="form-group">
                                            <label for="fname">Full Name</label>
                                            <input type="text" class="form-control" id="fname" name="fullname" placeholder="Contact No." />
                                        </div>
                                        <div class="form-group">
                                            <label for="contactNo">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Contact No." />
                                        </div>
                                        <div class="form-group">
                                            <label for="message">Instructor/Student User ID</label>
                                            <input type="text" class="form-control"  id="user_id" name="user_id" placeholder="Please enter the user's ID here"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="message">No KP</label>
                                            <input type="text" class="form-control"  id="no_kp" name="no_kp" placeholder="Please enter the user's IC no here"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="contactNo">Contact</label>
                                            <input type="tel" class="form-control" id="contact_no" name="no_telefon" placeholder="Contact No." />
                                        </div>
                                        <button type="submit" name="submit" value="submit" class="btn btn-default">Add User</button>
                                    </form>
                                </div>
                                <!-- End of section 6 -->

                                <!-- Start of section 4-->
                                <div id="sec4r">
                                    <h2>Admin's Personal Information</h2>
                                    <?php
                                    include 'php/adminChangePassword.php';
                                    $admin = $_SESSION['id'];
                                    echo showInfo($admin);
                                    ?>
                                </div>
                                <!-- End of section 4 -->

                                <!-- Start of section 5 -->
                                <div id="sec5r">
                                    <h2>Record the Usage of Student Activity Center UiTM Jasin per semester</h2>
                                    <div class="form-group">
                                        <form role="form" action="" method="get">
                                            <label>Sort by : </label>
                                            <select class="form-control" name="tahun">
                                                <option value="2015">2015</option>
                                                <option value="2016">2016</option>
                                                <option value="2017">2017</option>
                                            </select>
                                            <button type="submit" name="bitches" class="btn btn-default">Send</button>
                                        </form>
                                    </div>
                                    <table class="table table-hover">
                                        <tr>
                                            <th>Reference ID</th>
                                            <th>User ID</th>
                                            <th>Venue</th>
                                            <th>Date of Event</th>
                                            <th>Time</th>
                                        </tr>
                                        <?php
                                        include 'php/generateReport.php';
                                         include 'php/chart.php';

                                        if( isset($_GET['bitches']))
                                        {                    
                                            $tahun = htmlentities($_GET['tahun']);
                                            echo generateReport($tahun);
                                            $xdata = getChartData($tahun); 
                                        }
                                        else
                                        {
                                            $tahun = 2015;
                                            echo generateReport($tahun);
                                            $xdata = getChartData($tahun); 
                                        }

                                        ?>
                                    </table>

                                    <script type="text/javascript">var xdata = "<?= $xdata ?>";</script>
                                    <div id="chartContainer" style="height: 500px; width: 50%;"></div>
                                    <input class="btn btn-default" type="button" onclick="printContents('sec5r');" value="Print" />

                                </div>
                                <!-- End of section 5 -->
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
    <script src="js/canvasjs.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
// When the document is ready
$(document).ready(function () {

    $('.input-daterange').datepicker({
        todayBtn: "linked"
    });

});
</script>
</body>
</html>
