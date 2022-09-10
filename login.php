<?php include 'header.php';?>
<?php include 'Backend/login.php';?>
<!DOCTYPE html>
<html lang="en">
<head><?php include "head.php";?>
<link rel="stylesheet" href="static/CSS/login.css">
</head>
<body>
<div class="containerlogin title">
        <br><h1>Login</h1>
    </div>
    <br>
    <div class="error"><h2 style="color: red; margin-left:38%"><?php echo $error;?></h2></div>
    <div class="containerlogin form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <label for="email">Email: </label>
            <input type="email" name="email" placeholder="Email" required /><br><br>
            <label for="password">Password: </label>
            <input type="password" name="password" placeholder="Password" required /><br><br>
            <label for="roles">Roles: </label>
            <select name="roles">
            <option value="">Roles</option>
            <option value="customer">Customer</option>
            <option value="trader">Trader</option>
            <option value="admin">Admin</option>
            </select><br><br><br>

            <input type="checkbox" name="remember" value="remember">&nbsp; &nbsp;Remember Me<br>
            <button type="submit" name="loginSubmit">Login</button><br><br>
            <div class="createAcc">Don't have an account? <a href="register.php">Create an Account</a> <br><br>
            </div>
            <div class="forgpwd">Forgot Password?<a href="#"> Click here!</a></div>
        </form>
    </div><?php include "footer.php";?>
</body>
</html>