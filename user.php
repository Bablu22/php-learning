<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($name) || empty($email) || empty($password)) {
        die("Please fill out all fields.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }


    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $unique_file_name = uniqid() . '_' . date("Ymd_His") . '.' . $imageFileType;
    $target_file = $target_dir . $unique_file_name;

    if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {

        $csv_data = array($name, $email, $unique_file_name);
        $fp = fopen('users.csv', 'a');
        fputcsv($fp, $csv_data);
        fclose($fp);


        setcookie("user", $name, time() + (86400 * 30), "/");
    } else {
        die("Sorry, there was an error uploading your file.");
    }
}


header("Location: index.php");
exit();
?>