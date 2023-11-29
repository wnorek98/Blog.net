<?php
    include_once('connect.php');
    $title = "BLOG.NET | Rejestracja";
    include_once('include/head.php');
    session_start();
?>

<?php

$username_error = $email_error = $password_error = $repeat_password_error = "";
$username = $email = $password = $repeat_password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_POST["username"])) 
    {
        $username_error = "Login jest wymagany!";
    } 
    else 
    {
        $username = test_input($_POST["username"]);
        
        if(strlen($username) < 3 || strlen($username) > 15) 
        {
            $username_error = "Login musi mieć od 3 do 15 znaków!";
        } 
        else 
        {
            $query = "SELECT * FROM users WHERE username='$username'";
            
            $result = mysqli_query($connect, $query);
            
            if(mysqli_num_rows($result) > 0)
            {
                $username_error = "Login jest już zajęty!"; 
            }
        }
    }

    if(empty($_POST["email"]))
    {
        $email_error = "Adres email jest wymagany!";
    } 
    else
    {
        $email = test_input($_POST["email"]);
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $email_error = "Nieprawidłowy format adresu email!";
        }
        else 
        {
            $query = "SELECT * FROM users WHERE email='$email'";
            
            $result = mysqli_query($connect, $query);
            
            if(mysqli_num_rows($result) > 0)
            {
                $email_error = "Podany adres email już istnieje!"; 
            }
        }
    }

    if(empty($_POST["password"])) 
    {
        $password_error = "Hasło jest wymagane!";
    } 
    else 
    {
        $password = test_input($_POST["password"]);
        
        if(strlen($password) < 5 || strlen($password) > 32)
        {
            $password_error = "Hasło musi mieć od 5 do 32 znaków!";
        }
    }

    if(empty($_POST["repeat_password"]))
    {
        $repeat_password_error = "Powtórz hasło!";
    } 
    else 
    {
        $repeat_password = test_input($_POST["repeat_password"]);
        
        if($password != $repeat_password) 
        {
            $repeat_password_error = "Hasła nie są takie same!";
        }
    }


    if(empty($username_error) && empty($email_error) && empty($password_error) && empty($repeat_password_error)) 
    {
        $query = "INSERT INTO users (username, email, password)
                  VALUES ('$username', '$email', '".md5($password)."')";
        
        $result = mysqli_query($connect, $query);

        $image = "user.jpg";
        
        $query_update = "UPDATE users SET image = '$image' WHERE username = '$username'";
        
        $result2 = mysqli_query($connect, $query_update);
        
        header("refresh: 1; index.php?modal=1");
    }
}

function test_input($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<div class="navbar">
    <a href="index.php" class="logotyp">BLOG<span>.NET</span></a>
</div>
  <div class="background-image"></div>
	<div class="form-container">
      <form method="post">
        <label for="username">Login:</label>
        <input type="text" id="login" name="username" placeholder="Login">
        <p class="error" style="color: red;"><?php echo isset($username_error) ? $username_error : ""; ?></p>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Email">
        <p class="error" style="color: red;"><?php echo isset($email_error) ? $email_error : ""; ?></p>

        <label for="password">Hasło:</label>
        <input type="password" id="password" name="password" placeholder="Hasło">
        <p class="error" style="color: red;"><?php echo isset($password_error) ? $password_error : ""; ?></p>

        <label for="repeat-password">Powtórz hasło:</label>
        <input type="password" id="repeat_password" name="repeat_password" placeholder="Powtórz hasło" >
        <p class="error" style="color: red;"><?php echo isset($repeat_password_error) ? $repeat_password_error : ""; ?></p>
          
        <input type="submit" name="submit" value="Zarejestruj się">
        <p>Masz już konto? <a href="index.php?modal=0">Zaloguj się!</a></p>
      </form>
    </div>