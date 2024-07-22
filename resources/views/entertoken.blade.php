<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAK AUTH - Enter OTP</title>
    <link rel="stylesheet" href="styles2.css">
</head>
<body>
    <div class="container">
        <img src="MakUniversity-Logo.png" alt="Mak-Logo"> 
        <h1>MAK AUTH</h1>
        <p>Webmail Self Help Portal</p>
        <div class="info">
            <p><strong>Info:</strong> Enter the <strong>One Time Passcode (OTP)</strong> you received in your email to reset your password.</p>
        </div>
            <form id="otpForm" action="{{ route('reset-password'}}" method="post">
            @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="text" name="otp" placeholder="Enter OTP" required>
                <button type="submit">Verify OTP</button>
            </form>
        <div class="loading" id="loading">Verifying...</div>
    <div>
    <script src="script.js"></script>
</body>
</html>