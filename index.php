<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <!-- <link rel="stylesheet" href="./style.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">HOME</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Admin Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">User Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">User Register</a>
                </li>
            </ul>
        </div>
    </nav><br><br>
    <div class="row">
        <!-- <center> -->
            <div class="col-md-8" id="main-content">
            <center><h3>User Login Form </h3></center>
            <!-- <form action="Register.php" class="form-layout"method="post"> -->
            <form action="" class="form-layout"method="post">
                <div class="form-group">
                    <label for="emaillabel">E-Mail</label>
                    <input type="text" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="passwordlabel">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" name = "login" class="btn btn-primary">Login</button>
            </form>

            <?php
                session_start();
                if(isset($_POST['login']))
                {
                    $connection = mysqli_connect("localhost", "root", "", "miniproject");

                    
                    // $db = mysqli_select_db($connection);
                    $email = $_POST['email'];
                    $query = "select * from users where  email = '$email'";
                    $query_run = mysqli_query($connection,$query);

                    
                    while($row = mysqli_fetch_assoc($query_run))
                    {
                        
                        if ($row['email'] == $_POST['email'])
                        {
                            if ($row['password'] == $_POST['password'])
                            {
                                $_SESSION['name'] = $row['name'];
                                $_SESSION['email'] = $row['email'];
                                header("Location:user_dashboard.php");
                            }
                            else
                            {
                                ?>
                                  <br><br>
                                <center> <span class="alert-danger">Wrong Password</span></center>
                                 <?php
                            }
                        }
                    }
                }
            ?>
        </div>
        <!-- </center> -->
    </div>

</body>
</html>