<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAK AUTH - Password Reset</title>
    <link rel="stylesheet" href="styles1.css">

    
</head>
<body>
    <div class="container">
        <img src="MakUniversity-Logo.png" alt="Logo"> 
        <h1>MAK AUTH</h1>
        <p>Webmail Self Help Portal</p>
        <div class="info">
            <p><strong>Info:</strong> Enter your <strong>University webmail address</strong> or <strong>Student number</strong> or <strong>Registration Number</strong>. A One Time Passcode (OTP) will be sent to your <strong>alternative e-mail address</strong> that you provided during migration/creation of your webmail address.</p>
        </div>
        <form id="resetForm" action="reset_password.php" method="post">
            <input type="email" name="email" placeholder="yourname@students.mak.ac.ug, Student Number, or Registration Number" required>
           <!-- <input type="text" name="student_number" placeholder="Student Number or Registration number" required> -->
            <button type="submit">Send me a recovery token</button>
        </form>
        <div class="loading" id="loading">Sending...</div>
        <!--<div class="footer">
            <a href="#">Homepage</a> | 
            <a href="#">Help me</a> | 
            <a href="#">Facebook</a> | 
            <a href="#">Twitter</a>
        </div> -->
    </div>
    <script src="scripts.js"></script>
</body>
</html>
