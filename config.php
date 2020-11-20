<?php
$user = "root";
$password = "";
$server = "localhost";
$db = "signup";

$con = mysqli_connect($server, $user, $password ,$db);

if(!$con){
    ?>
    <script>
    alert('Connection failed.');
    </script>
    <?php
}
else{
    ?>
    <script>
    alert('Connection successfully.');
    </script>
    <?php
}
?>