<?php
    session_start();
    $connection = mysqli_connect("localhost", "root", "", "miniproject");
    $firstname = "";
    $useremail = "";
    $mobile = "";
    $address = "";

    $email = $_SESSION['email'];
    $query = "select * from users where email = '$email'";
    $query_run = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($query_run))
    {
        $firstname = $row['firstname'];
        $useremail = $row['email'];
        $mobile = $row['mobile'];
        $address = $row['address'];
    }
?>    


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="user_dashboard.php">HOME</a>
            </div>
            <span>
                <strong>Welcome <?php echo $_SESSION['firstname'];?></strong>
            </span>
            <span>
                <strong>Email: <?php echo $_SESSION['email'];?></strong>
            </span>

            <ul class="nav navbar-nav navbar-right">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="view_profile.php">View Profile</a>
						<a class="dropdown-item" href="edit_profile.php"> Edit Profile</a>
						<a class="dropdown-item" href="change_password.php">Change Password</a>
					</div>
				</li>
				<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
			</ul>
        </div>
    </nav><br><br>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <form>
                <div class="form-group">
                    <label>Name: </label>
                    <input type="text" class="form-control" value="<?php echo $firstname; ?>" disabled>
                </div> 
                <div class="form-group">
                    <label>Email: </label>
                    <input type="text" class="form-control" value="<?php echo $useremail; ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Mobile: </label>
                    <input type="text" class="form-control" value="<?php echo $mobile; ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Address: </label>
                    <textarea rows="3" cols="40" disable=""><?php echo $address; ?> </textarea>
                </div>
            </form>
            </div>
        </div>
    </div>
    

</body>
</html>