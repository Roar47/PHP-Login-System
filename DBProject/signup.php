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

    <title>Signup</title>
</head>

<body>
    <h3>
        <center>
            Create Your Account
        </center>

    </h3>

    <!-- <div class="alert alert-success alert-dismissible fade show" role="alert" id="mydiv" style="visibility=hidden;">
        <strong>Well Done!</strong> You shave registered successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> -->

    <div class="container-sm mx-xl-5 bg-light" style="padding-left: 200px; padding-right: 200px;">
        <form method="post" action="#">
            <div class="form-group">
                <label for="signupInputEmail1">Employee ID</label>
                <input type="text" class="form-control" name="empID" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="signupInputPassword1">Password</label>
                <input type="password" class="form-control" name="passwd">
            </div>
            <div class="form-group">
                <label for="signupInputName">Employee Name</label>
                <input type="text" class="form-control" name="empName" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="signupInputDate">Date of Joining (yyyy-mm-dd)</label>
                <input type="text" class="form-control" name="DoJ" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="signupInputsal">Salary</label>
                <input type="text" class="form-control" name="salary" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="signupInputdept">Department</label>
                <input type="text" class="form-control" name="dept" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="signupInputmob">Mobile No.</label>
                <input type="text" class="form-control" name="mob" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="signupInputemail">Email</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
            </div>
            <br/>
            <button type="submit" class="btn btn-primary" name="RBTN" onclick="fun()">Creat Account</button>
        </form>
        <div>
            <p>Already have account? <a class="link" href="login.php">Login</a></p>
        </div>
        
    </div>


    <script>
        // function fun()
        // {
        //     var x = document.getElementById("mydiv");
        //         if (x.style.display === "none")
        //         {
        //             x.style.display = "block";
        //         } 
        //         else 
        //         {
        //             x.style.display = "none";
        //         }
        // }
    </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>

</html>

<?php
     require('connect.php');
     if ($con->connect_error) 
       die("Connection failed: " . $conn->connect_error);

       if (isset($_POST['RBTN']))
       { 
        // get all of the form data 
            $empName  =  $_POST['empName']; 
            $empID    =  $_POST['empID']; 
            $email    =  $_POST['email']; 
            $mob      =  $_POST['mob']; 
            $dept     =  $_POST['dept'];
            $DoJ      =  $_POST['DoJ']; 
            $salary   =  $_POST['salary']; 
            $passwd   =  $_POST['passwd'];  
    
    // insert the user's details into the database
    
            $sql = "INSERT INTO employee (empID, passwd, empName, DoJ, salary, department, mobileNo, email) VALUES 
            (
                '$empID','$passwd', '$empName', '$DoJ' ,'$salary','$dept','$mob','$email'
            )";
        
    
            if ($con->query($sql) === FALSE) 
            {
                echo "Error: " . $sql . "<br>" . $con->error;
                ?>
                 <script >
                     alert("Somethong Went Wrong");
                 </script>
                <?php
                
            }
            else
            {
                ?>
                <script >
                    alert("You have registered successfully! Now You can login");
                </script>
               <?php
            
            }
            $con->close();
    
    }

?>