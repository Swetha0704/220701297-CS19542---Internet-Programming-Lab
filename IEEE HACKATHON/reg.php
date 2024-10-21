<?php
$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "college";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$age = $_POST['age'];
$gender = isset($_POST['gender']) ? $_POST['gender'] : 'Not specified';
$cutoff = $_POST['cutoff'];
$state = $_POST['state'];
$country = $_POST['country'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];

$sql = "INSERT INTO reg (name, age, gender, cutoff, state, country, city, pincode) VALUES ('$name', '$age', '$gender', '$cutoff', '$state', '$country', '$city', '$pincode')";

if ($conn->query($sql) === TRUE) {
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Application Success</title>
        <style>
            body {
                background-image: url("https://cdn.pixabay.com/photo/2021/10/11/04/08/university-6699377_1280.jpg"); 
                background-size: cover;
                color: #fff;
                font-family: Arial, sans-serif;
            }
            .container {
                background-color: rgba(0, 0, 0, 0.7); /* Dark overlay */
                margin: 100px auto;
                padding: 20px;
                max-width: 600px;
                border-radius: 10px;
                text-align: center;
            }
            h2 {
                color: #ffd700;
            }
            table {
                width: 100%;
                margin: 20px 0;
                border-collapse: collapse;
            }
            td {
                padding: 10px;
                border: 1px solid #fff;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>You have applied successfully!</h2>
            <p>Here are your application details:</p>
            <table>
                <tr><td><strong>Name:</strong></td><td>' . $name . '</td></tr>
                <tr><td><strong>Age:</strong></td><td>' . $age . '</td></tr>
                <tr><td><strong>Gender:</strong></td><td>' . $gender . '</td></tr>
                <tr><td><strong>Cutoff:</strong></td><td>' . $cutoff . '</td></tr>
                <tr><td><strong>State:</strong></td><td>' . $state . '</td></tr>
                <tr><td><strong>Country:</strong></td><td>' . $country . '</td></tr>
                <tr><td><strong>City:</strong></td><td>' . $city . '</td></tr>
                <tr><td><strong>Pincode:</strong></td><td>' . $pincode . '</td></tr>
            </table>
        </div>
    </body>
    </html>
    ';
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
