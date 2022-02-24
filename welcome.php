<?php

//Initialize the session

session_start();

//Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "config.php";

//For checking slot dates on login

$user_id = $_SESSION["user_id"];
$slot_arr = [];
// echo $user_id;
$slot_query = "SELECT slot_id FROM ticket WHERE user_id = $user_id;";

if($result = mysqli_query($mysqli, $slot_query)){

	while($rowData = mysqli_fetch_array($result)){
        // echo $rowData["slot_id"];
        array_push($slot_arr,  $rowData["slot_id"]);
    } 
}    

$slot_arr = array_unique($slot_arr);
// print_r($slot_arr);

$slot_day_query = "SELECT day FROM slots WHERE slot_id = $slot_arr[0];";

$slot_num = (int)$slot_arr[0];
// echo $slot_num;

if($result = mysqli_query($mysqli, $slot_day_query)){

	while($rowData = mysqli_fetch_array($result)){
       $slot_day = $rowData["day"];
    } 
}  

// echo $slot_day, date("Ymd");
$slot_date = substr($slot_day, -2);
$slot_month_num = substr($slot_day, -4, -2);
// echo $slot_date, $slot_month;

// if($slot_num%2==0){
//     $slot_time = "16:00 PM";
// }else{
//     $slot_time = "18:00 PM";
// }


$slot_monthName = date('F', mktime(0, 0, 0, $slot_month_num, 10)); 



if(date("Ymd") == $slot_day){
    $showtxt = "Your slot is today at ";
}
else{
    //$slot_date = substr($slot_day, 2);
    $showtxt = "Your slot is on ".$slot_date." ".$slot_monthName;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <h3 class="my-5"><b><?php echo $showtxt; ?></b>.</h3>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>
</body>
</html>