<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Login</title>
</head>

<body>
    <h3>
        <center>
            Login Your Account
        </center>
      
    </h3>
    
    <div class="container-sm mx-xl-5 bg-light" style="padding-left: 200px; padding-right: 200px;">
        <form method="post">
            <div class="form-group">
                <label for="loginInputEmail1">Employee ID</label>
                <input type="text" class="form-control" name="empID" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="loginInputPassword1">Password</label>
                <input type="password" class="form-control" name="passwd">
            </div>
            <button type="submit" name="sbt" class="btn btn-primary">Login</button>
        </form>
        <div>
            <p>Don't have account? <a class="link" href="signup.php">Signup</a></p>
        </div>

    </div>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>

</html>

<?php
      session_start();
      include 'connect.php';

      if(isset($_POST['sbt']))
      {
            $empID  = $_POST['empID'];
            $passwd = $_POST['passwd'];
            $query=mysqli_query($con,"SELECT * FROM employee WHERE empID = '$empID' AND passwd = '$passwd'");
            $row_count=mysqli_num_rows($query);
            $row=mysqli_fetch_array($query);
            if($row_count>0)
            {
                $_SESSION['id']=$row['empID'];
                ?>
                     <script>
                        alert('You have Successfully Logged In');
                        document.location='profile.php'
                    </script>
                <?php
            }
            else
            {
                ?>
                <script>
                        alert('Invalid Username or Password');
                </script>
                <?php
            }
      }
?>

