<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de connexion</title>
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

<body>
    <div class="container">
        <div class="login-form">
            <h2>Login</h2>
            <form method="post" action="http://localhost:80/Tropical-Farm/login555.php">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" value="Login">
            </form>
            <center><p style="color: red; font-size: 12px;">Username or Password incorrect</p></center>
            <div class="message">
                Not yet registered ? <a href="http://localhost:80/Tropical-Farm/signup.html">Sign up</a>
            </div>
        </div>
    </div>
</body>
</html>