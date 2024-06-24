<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $student_name = htmlspecialchars($_POST['student-name']);
    $date_of_birth = htmlspecialchars($_POST['date']);
    $class = htmlspecialchars($_POST['class']);
    $courses = htmlspecialchars($_POST['courses']);
    $gender = htmlspecialchars($_POST['gender']);
    $parents_name = htmlspecialchars($_POST['parents-name']);
    $phone1 = htmlspecialchars($_POST['phone1']);
    $phone2 = htmlspecialchars($_POST['phone2']);
    $cnic = htmlspecialchars($_POST['cnic']);
    $address = htmlspecialchars($_POST['address']);

    // Email details
    $to = "waleedbarry7@gmail.com";  // Replace with your email address
    $subject = "New Student Registration";
    $message_body = "
    <html>
    <head>
        <title>New Student Registration</title>
    </head>
    <body>
        <h2>New Student Registration Details</h2>
        <p><strong>Student Name:</strong> $student_name</p>
        <p><strong>Date Of Birth:</strong> $date_of_birth</p>
        <p><strong>Class:</strong> $class</p>
        <p><strong>Courses:</strong> $courses</p>
        <p><strong>Gender:</strong> $gender</p>
        <p><strong>Father/Mother Name:</strong> $parents_name</p>
        <p><strong>Phone Number 1:</strong> $phone1</p>
        <p><strong>Phone Number 2:</strong> $phone2</p>
        <p><strong>Father/Mother CNICs:</strong> $cnic</p>
        <p><strong>Address:</strong> $address</p>
    </body>
    </html>
    ";

    // To send HTML mail, the Content-type header must be set
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // Additional headers
    $headers .= 'From: <waleedbarry7@gmail.com>' . "\r\n";  // Replace with your email address

    // Send email
    if (mail($to, $subject, $message_body, $headers)) {
        $message = "Registration successful! An email has been sent.";
    } else {
        $message = "Registration failed! Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration Form</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Student Registration Form</h2>
        <?php
        if ($message) {
            echo "<div class='alert alert-info'>$message</div>";
        }
        ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="student-name">Student Name*</label>
                <input type="text" class="form-control" id="student-name" name="student-name" required>
            </div>
            <div class="form-group">
                <label for="date">Date Of Birth*</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="class">Class*</label><br>
                <select class="form-control" id="class" name="class" required>
                    <option>5th</option>
                    <option>6th</option>
                    <option>7th</option>
                    <option>8th</option>
                    <option>9th</option>
                    <option>10th</option>
                    <option>11th</option>
                    <option>12th</option>
                </select>
            </div>
            <div class="form-group">
                <label for="courses">Courses</label><br>
                <select class="form-control" id="courses" name="courses">                    
                    <option>Spoken English</option>
                    <option>C++ Language</option>
                    <option>Microsoft Office</option>
                    <option>Graphic Designing</option>
                </select>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label><br>
                <select class="form-control" id="gender" name="gender">
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="parents-name">Father/Mother Name*</label>
                <input type="text" class="form-control" id="parents-name" name="parents-name" required>
            </div>
            <div class="form-group">
                <label for="phone1">Phone Number 1*</label>
                <input type="tel" class="form-control" id="phone1" name="phone1" required>
            </div>
            <div class="form-group">
                <label for="phone2">Phone Number 2 (Optional)</label>
                <input type="tel" class="form-control" id="phone2" name="phone2">
            </div>
            <div class="form-group">
                <label for="cnic">Father/Mother CNICs (Bring a photocopy while visiting)*</label>
                <input type="text" class="form-control" id="cnic" name="cnic" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
