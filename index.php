<?php
$insert = false;
if (isset($_POST['name'])) {

    $server = 'localhost';
    $username = 'root';
    $password = '';

    $conn = mysqli_connect($server, $username, $password);

    if (!$conn) {
        die('Connection to this database failed due to ' . mysqli_connect_error());
    }
    // echo 'Success connecting to the db';

    $name =  $_POST['name'];
    $age =  $_POST['age'];
    $gender = $_POST['gender'];
    $email =  $_POST['e-mail'];
    $phone =  $_POST['phone'];
    $desc =  $_POST['desc'];

    $sql = "INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `e-mail`, `phone`, `other`, `date`) 
    VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    // echo $sql;

    if ($conn->query($sql) === TRUE) {
        // echo 'Successfully inserted';
        $insert = true;
    } else {
        // echo "Error : $sql <br> $conn->error";
    }
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="bg.jpg" alt="IIT Kharagpur">
    <div class="container">
        <h1>Plan your US Trip with us.</h3>
            <p>Enter your details and submit this form to confirm your participation in the trip </p>
            <?php
            if ($insert == true) {
                echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
            }
            ?>
            <form action="index.php" method="post">
                <input type="text" name="name" id="name" placeholder="Enter your name">
                <input type="text" name="age" id="age" placeholder="Enter your Age">
                <input type="text" name="gender" id="gender" placeholder="Enter your gender">
                <input type="email" name="e-mail" id="e-mail" placeholder="Enter your email">
                <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
                <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
                <button type="submit" class="btn">Submit</button>
            </form>
    </div>
    <script src="index.js"></script>
</body>

</html>