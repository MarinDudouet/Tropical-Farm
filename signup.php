<!DOCTYPE html>
<html>
<head>
    <title>Sign up</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .login-form {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f2f2f2;
        }
        
        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 93%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        
        .login-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        
        .login-form input[type="submit"]:hover {
            background-color: #45a049;
        }
        
        .login-form .message {
            margin-top: 20px;
            text-align: center;
        }
        
        .login-form .message a {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>

  
<body>
    <div class="container">
        <div class="login-form">
            <h2>Sign up</h2>
            <form method="post" action="http://localhost:80/Tropical-Farm/signup555.php">
                <p>Choose the type of account :</p>
                <center><input type="radio" name="account" value="user" required>User
                <input type="radio" name="account" value="seller">Seller</center><br>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <p>Choose a profil pictures : </p>
                <input type="file" name="photo" value="Select an Image" onchange="showImage(this)" required><br><br>
                <p>Choose the color of your background :</p>
                <center><input type="radio" name="color" value="black" required>Black
                <input type="radio" name="color" value="darkslategray">darkslategray
                <input type="radio" name="color" value="grey">Grey</center><br>
                <input type="submit" value="Sign up">
            </form>
            <div class="message">
            </div>
        </div>
    </div>
</body>
</html>