<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Activity Center Reservation System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/login.css" rel="stylesheet">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
  
</head>

<body class="container-fluid">

  <div class="jumbotron">
    <!-- <p>Book now!</p>   -->
  </div>


  <div class="container"> 
    <div class="well">
      <legend>Login Page</legend>

      <form role="form" action="php/login.php" method="POST">
        <div class="form-group">
          <label for="role">Admin</label>
          <input type="radio" name="checkRole" value="admin">
          &nbsp;&nbsp;
          <label for="role">Student/Staff</label>
          <input type="radio" name="checkRole" value="user" checked>
        </div>

        <div class="form-group">
          <label for="ID">Student/Staff ID :</label>
          <input type="text" class="form-control" name ="id" id="ID" placeholder="Enter ID" required>
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password" required>
        </div>
        <div class="checkbox">
          <label><input type="checkbox"> Remember me</label>
        </div>
        <button type="submit" name="user" value="user" class="btn btn-default">Submit</button>
      </form>
      <br />
      <form role="form" action="php/login.php" method="POST">
        <button type="guest" name="guest" value="guest" class="btn btn-primary">Continue as Guest</button>
      </form> 

    </div>
  </div>

</body>
</html>
