<?php
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"miniproject");
    $query = "insert into admins values('$_POST[firstname]','$_POST[lastname]','$_POST[email]','$_POST[password]',$_POST[mobilenumber],'$_POST[address]')";
    $query_run = mysqli_query($connection, $query);
?>

<script type="text/javascript">
    alert("Registration Successful")
    window.location.href = "Admin/index.php";
</script>