<?php
include "config.php";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$house = $_POST['house'];
$address = $_POST['address'];
$city = $_POST['city'];
$pin = $_POST['pin'];

$sql = "INSERT INTO `address`(`fname`, `lname`, `phone`, `house`, `address`, `city`, `pin`) VALUES ('$fname', '$lname', '$phone', '$house', '$address', '$city', '$pin')";


if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Submitted successfully'); window.location.href='index.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
