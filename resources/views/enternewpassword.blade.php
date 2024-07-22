<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAK AUTH - Account Update</title>
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body and container styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #FFFAB0;
            background-image: url('wallhaven-yx3ewk.jpg'); /* Background image */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 700px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Logo and title styles */
        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #4CAF50
        }

        p {
            font-size: 12px;
            margin-bottom: 20px;
        }

        /* Form styles */
        form {
            display: flex;
            flex-direction: column;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Loading message */
        .loading {
            display: none;
            text-align: center;
            font-size: 14px;
            margin-top: 10px;
        }

        /* Footer links */
        .footer {
            margin-top: 20px;
            text-align: center;
        }

        .footer a {
            text-decoration: none;
            color: #555;
            margin: 0 5px;
        }

        .footer a:hover {
            color: #333;
        }

      
    </style>
</head>
<body>
    <div class="container">
        <img src="MakUniversity-Logo.png" width=50px height=50px alt="Logo"> 
        <h1>MAK AUTH</h1>
        <p>Account Update Form</p>
        <form id="updateForm" action="update_account.php" method="post">
            <input type="password" name="newPassword" placeholder="New Password" required>
            <input type="password" name="confirmPassword" placeholder="Confirm New Password" required>
            <input type="email" name="recoveryEmail" placeholder="Recovery Email" required>
            <button type="submit">Update webmail account</button>
        </form>
        <div class="loading" id="loading">Updating...</div>
        <div class="footer">
            <a href="#">Homepage</a> | 
            <a href="#">Help me</a> | 
            <a href="#">Facebook</a> | 
            <a href="#">Twitter</a> 
        </div>
    </div>
</body>
</html>
