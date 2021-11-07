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

    <title>Profile</title>
</head>

<body>
<?php 
    session_start();
    $loginID=$_SESSION['id'];
    include 'connect.php';

    $query="SELECT  empName, DoJ, salary, department, mobileNo, email, passwd FROM employee WHERE empID ='".$loginID."' ";
    $empID      = $loginID;
    $empName    = "";
    $DoJ        = "";
    $salary     = 0;
    $dept       = "";
    $mob        = 0;
    $email      = "";
    $passwd     = "";

if($result = $con->query($query)) 
  {
    while ($row = $result->fetch_assoc())
      {
        $empName    = $row["empName"];
        $DoJ        = $row["DoJ"];
        $salary     = $row["salary"];
		$dept       = $row["department"];
		$mob        = $row["mobileNo"];
		$email      = $row["email"];
        $passwd     = $row["passwd"];
      }
    $result->free();
  } 

  if (isset($_POST['update']))
  { 
        $newemail = $_POST['nemail']; 
        $newmob   = $_POST['nmob'];
        $sql = "UPDATE employee SET email = '".$newemail."', mobileNo = '".$newmob."' WHERE empID='".$loginID."'";

        if($con->query($sql) === TRUE)
        {
            ?>
                <script>
                    alert('Your Profile Updated Sucessfully');
                    document.location='profile.php'
                </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert('Something went wrong. Please try again');
                document.location='profile.php'
            </script>
            <?php
        }


   }

    $con->close();
?> 
    <div clas="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Welcome <?php echo $empName; ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
            <form method="post">
            <button type="submit" class="btn btn-outline-info" name="lgt">Logout</button>
            </form>
        </div>
    </div>
</nav>
<?php
    if(isset($_POST['lgt'])) 
    {
         session_destroy();
         unset($_SESSION['empID']);
         ?>
             <script>
                 alert('Logged Out Successfully!');
                 document.location='login.php';
             </script>
         <?php
 
    }

?>
		
<div class="container-fluid my-2">
    <table class="table table-sm table-dark">
        <thead>
            <tr>
                <th scope="row">S.No</th>
                <td colspan="2">Fields</td>
                <td>Values</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td colspan="2">Employee Name</td>
                <td><?php echo $empName; ?></td>
            <tr>
                <th scope="row">2</th>
                <td colspan="2">Employee ID</td>
                <td><?php echo $empID; ?></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Password</td>
                <td><?php echo $passwd; ?></td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td colspan="2">Date of Joining</td>
                <td><?php echo $DoJ; ?></td>
            </tr>
            <tr>
                <th scope="row">5</th>
                <td colspan="2">Salary</td>
                <td><?php echo $salary; ?></td>
            </tr>
            <tr>
                <th scope="row">6</th>
                <td colspan="2">Email</td>
                <td><?php echo $email; ?></td>
            </tr>
            <tr>
                <th scope="row">7</th>
                <td colspan="2">Mobile No.</td>
                <td><?php echo $mob; ?></td>
            </tr>
            <tr>
                <th scope="row">6</th>
                <td colspan="2">Department</td>
                <td><?php echo $dept; ?></td>
            </tr>
            
        </tbody>
    </table>
</div>
<center>
<button type="button" class="btn btn-primary btn-lg btn-block" data-bs-toggle="modal" data-bs-target="#loginModal">
  Update Your Profile
</button>
</center>

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Update Your Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form  method="post" action="profile.php">
                        <div class="form-group">
                            <label for="loginInputEmail1">New Email address</label>
                            <input type="email" class="form-control" name="nemail" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="loginInputPassword1">New Mobile No.</label>
                            <input type="text" class="form-control" name="nmob">
                        </div>
                        <button type="submit" class="btn btn-primary mx-2" name="update">Update</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>




    
    
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</div>

</body>

</html>



