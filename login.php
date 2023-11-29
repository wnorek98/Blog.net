<?php
    include_once('connect.php');
    $title = "BLOG.NET | Logowanie";
    include_once('include/header.php');
    session_start();
?>

<div class="container-form-login">

	<div class="left">
		<img class="bg-login" src="image/banner-1.jpg">
	</div>
	
	<div class="right">
		<div class="top-right">
            
            <?php
            
                if(isset($_POST['submit']))
                {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    if((empty($username)) or (empty($password)))
                    {
                        echo '<div class="message"> Pola nie mogą być puste! </div>';
                    }
                    else
                    {
                        $query = "SELECT * FROM users WHERE username='$username' and password='".md5($password)."'";

                        $result = mysqli_query($connect, $query);

                        $row = mysqli_fetch_array($result);

                        if(mysqli_num_rows($result) > 0)
                        {
                            $_SESSION['id_users'] = $row['id_users'];

                            $_SESSION['username'] = $row['username'];
                            
                            echo '<div class="success"> Zalogowano się pomyślnie! </div>';
  
                            header("refresh: 1; index.php");   
                        }
                        else
                        {
                            echo '<div class="message"> Nieprawidłowe dane logowania! </div>';
                        }
                    }
                }
            ?> 
            
		</div>
		<div class="bottom-right">
			<form method="post">
				<label> Nazwa użytkownika: <br>
					<input class="login-form" placeholder="Login" type="text" name="username">
				</label><br>
				<label> Hasło: <br>
					<input class="login-form" placeholder="Hasło" type="password" name="password">
				</label><br>
				<button class="login" type="submit" name="submit" value="submit">Zaloguj się</button><br>
				<b class="account-registration">Nie masz konta? <a class="registration" href="registration.php">Zarejestruj się!</a></b>
			</form>
		</div>
		
	</div>
</div>
