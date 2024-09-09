<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-container {
    background-color: white;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}

.login-form h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

.input-group {
    margin-bottom: 20px;
}

.input-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #333;
}

.input-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

.input-group input:focus {
    border-color: #333;
    outline: none;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #333;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #555;
}

.error-message {
    color: white;
    margin-top: 10px;
    margin-bottom: 10px;
    text-align: center;
    background: red;
}

    </style>
</head>
<?php 
include "controller/allfunction.php";
$obj = new allfunction();
$error_message="";
if($_SERVER['REQUEST_METHOD'] == "POST"){
   $admin_success = $obj->loginAdmin($_POST);
   if(!$admin_success){
      $error_message = "Admin Not Found!*";
   }
}
?>
<body>
    <div class="login-container">
        <form method="POST" id="loginForm" class="login-form">
            <h2>Admin Login</h2>
            <?php if(!empty($error_message)){ ?>
                <div id="errorMessage" class="error-message"><?php echo $error_message; ?></div>
          <?php  }  ?>
            <div class="input-group">
                <label for="name">Username</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>

    <script src="scripts.js"></script>
</body>
</html>
