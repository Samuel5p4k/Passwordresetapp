<?php
// reset_password.php

// Get the submitted email/student number/registration number
$email = $_POST['email'];

// Validate the input
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Check if it's a valid student number or registration number
    if (!preg_match('/^[0-9]{9}$/', $email)) {
        // Invalid input, redirect back to the form with an error message
        header('Location: index.php?error=invalid_input');
        exit;
    }
}

// Connect to the database
$conn = mysqli_connect("localhost", "username", "password", "database");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to retrieve student details
$query = "SELECT * FROM students WHERE email = '$email' OR student_number = '$email' OR registration_number = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    // Student not found, redirect back to the form with an error message
    header('Location: index.php?error=student_not_found');
    exit;
}

// Retrieve the student's alternative email address
$student_data = mysqli_fetch_assoc($result);
$alternative_email = $student_data['alternative_email'];

// Generate a one-time passcode (OTP)
$otp = generate_otp();

// Send the OTP to the student's alternative email address
send_otp_to_alternative_email($alternative_email, $otp);

// Redirect the user to a page where they can enter the OTP
header('Location: enter_otp.php');
exit;

// Function to generate a one-time passcode (OTP)
function generate_otp() {
    // Generate a random OTP (e.g., using a cryptographically secure pseudo-random number generator)
    $otp = bin2hex(random_bytes(16));
    return $otp;
}

// Function to send the OTP to the student's alternative email address
function send_otp_to_alternative_email($email, $otp) {
    // Send the OTP to the alternative email address using a mail function (e.g., PHPMailer)
    $mail = new PHPMailer();
    $mail->addAddress($email);
    $mail->Subject = 'MAK AUTH - Password Reset OTP';
    $mail->Body = "Your OTP is: $otp";
    $mail->send();
}

mysqli_close($conn);
?>

<?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'password_reset_db';

// Connect to the database
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: ". $conn->connect_error);
}

// Get the posted data
$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password
$password_hash = password_hash($password, PASSWORD_BCRYPT);

// Update the password in the database
$query = "UPDATE users SET password = '$password_hash' WHERE email = '$email'";
$result = $conn->query($query);

// Check if the update was successful
if ($result) {
  $response = array('success' => true, 'essage' => 'Password reset successfully!');
} else {
  $response = array('success' => false, 'error' => 'Failed to reset password. Please try again later.');
}

// Close the database connection
$conn->close();

// Return the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
