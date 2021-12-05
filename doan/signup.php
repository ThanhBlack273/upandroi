<?php
include "connect.php";
//$email = $_POST['email'];
//$fullname = $_POST['fullname'];
//$phone = $_POST['phone'];
//$username = $_POST['username'];
//$password = $_POST['password'];

/*$email = isset($_POST['email']) ? $_POST['email'] : '0';
$fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '00';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '0';
$username = isset($_POST['username']) ? $_POST['username'] : '0';
$password = isset($_POST['password']) ? $_POST['password'] : '0';*/

$email = validate($_POST['email']);
$fullname = validate($_POST['fullname']);
$phone = validate($_POST['phone']);
$username = validate($_POST['username']);
$password = validate($_POST['password']);

//check data
$query = 'SELECT * FROM `users` WHERE `username` = "'.$username.'"';
$data = mysqli_query($conn, $query);
$numrow = mysqli_num_rows($data);
echo $numrow;

if ($numrow > 0) {
    $arr = [
        'success' => false,
        'message' => "Username da ton tai"
    ];
} else {
    //insert
    $query = 'INSERT INTO `users`(`email`, `fullname`, `phone`, `username`, `password`) VALUES ("'.$email.'","'.$fullname.'","'.$phone.'","'.$username.'","'.$password.'")';
    $data = mysqli_query($conn, $query);

    if ($data == true ) {
        $arr = [
            'success' => true,
            'message' => "thanh cong"
        ];
    } else {
        $arr = [
            'success' => false,
            'message' => "khong thanh cong"
        ];
    }
}

print_r(json_encode($arr));

?>
