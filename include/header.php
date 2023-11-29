<?php
    include_once('connect.php');
    session_start();
    error_reporting(false);
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    
    <header>
        <nav> 
            <div class="left-site">
                <a href="index.php">
                    <div class="logo">BLOG<span>.NET</span></div>
                </a>
            </div>
             
            <ul class="menu">
                <a href="index.php"><li>Strona Główna</li></a>
                <a href="blogs.php"><li>Wasze Blogi</li></a>
                <a href="#"><li>O Autorze</li></a>
                <a href="#"><li>Kontakt</li></a>
            </ul>
             
            <div class="right-site">
                
             <?php
                if(isset($_SESSION['id_users']))
                {
                    $username = $_SESSION['username'];

                    $query = "SELECT username, image FROM users WHERE username = '$username'";

                    $result = mysqli_query($connect, $query);

                    $row = mysqli_fetch_assoc($result);
             ?>
             
                <div class="dropdown">
                        <img class="logged" src="image/<?php echo $row['image'] ?>">  
                    <div class="dropdown-content">
                        <a href=#>Mój profil</a>
                        <a href=#>Edytuj profil</a>
                        <a href="logout.php">Wyloguj</a>
                    </div>
                </div>
                 
             <?php
                }
                else
                {
             ?>
                
                <button class="account" onclick="openModal()">Konto</button>
                
                <div class="container-form-login" id="myModal">
                    <div class="modal-content">
                        <span class="close" onclick="closeModal()">&times;</span>

                        <div class="left">
                            <img class="bg-login" src="image/banner-login.jpg">
                        </div>
                        <div class="right">
                            <form method="post" name="loginForm">
                                <div class="all_elements">
                                    <?php
                                    if(isset($_POST['submit']))
                                    {
                                        $username = $_POST['username'];
                                        $password = $_POST['password'];

                                        if((empty($username)) or (empty($password)))
                                        {
                                            echo '<div class="login-alert-danger">
                                                    <div class="login-alert-content">
                                                      <i class="fa-solid fa-circle-exclamation"></i>
                                                      <span class="login-alert-text">Pola nie mogą być puste!</span>
                                                    </div>
                                                  </div>';

                                            echo '<script>document.getElementById("myModal").style.display = "block";</script>';
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

                                                echo '<div class="login-alert-success">
                                                        <div class="login-alert-content">
                                                          <i class="fa-solid fa-circle-check"></i>
                                                          <span class="login-alert-text">Zalogowano się pomyślnie!</span>
                                                        </div>
                                                      </div>';

                                                echo '<script>document.getElementById("myModal").style.display = "block";</script>';

                                                if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) 
                                                {
                                                    header("refresh: 3; url=" . $_SERVER['HTTP_REFERER']);
                                                }
                                                else
                                                {
                                                    header("refresh: 3; url=index.php");
                                                }
                                            }
                                            else
                                            {
                                                echo '<div class="login-alert-danger">
                                                    <div class="login-alert-content">
                                                      <i class="fa-solid fa-circle-exclamation"></i>
                                                      <span class="login-alert-text">Nieprawidłowe dane logowania!</span>
                                                    </div>
                                                  </div>';

                                                echo '<script>document.getElementById("myModal").style.display = "block";</script>';
                                            }
                                        }
                                    }
                                    ?>

                                    <div class="input-container">
                                        <input type="text" id="login" name="username" placeholder=" ">
                                        <label for="username">Login</label>
                                    </div>

                                    <div class="input-container">
                                        <input type="password" id="password" name="password" placeholder=" ">
                                        <label for="password">Hasło</label>
                                    </div>

                                    <div class="input-container">
                                        <input type="submit" name="submit" value="Zaloguj się">
                                        <p>Nie masz konta? <a href="registration.php">Zarejestruj się!</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <script>
                    var modal = document.getElementById("myModal");
                    var loginForm = document.querySelector("form[name='loginForm']");

                    function openModal(){
                        modal.style.display = "block";
                    }

                    function closeModal(){
                        modal.style.display = "none";
                        resetAlert();
                    }

                    function resetAlert(){
                        var alerts = document.querySelectorAll(".login-alert-danger, .login-alert-info, .login-alert-success");
                        alerts.forEach(function(alert){
                            alert.remove();
                        });
                    }

                    window.onclick = function(event){
                        if (event.target == modal){
                            closeModal();
                        }
                    }

                    loginForm.addEventListener("submit", function(event){
                        resetAlert();
                    });
                </script>

                <script>
                    const urlParams = new URLSearchParams(window.location.search);
                    
                    if (urlParams.has("modal") && urlParams.get("modal") === "0"){
                      const modal = document.getElementById("myModal");

                      modal.style.display = "block";

                      history.replaceState(null, null, window.location.pathname);
                    }

                    if (urlParams.has("modal") && urlParams.get("modal") === "1"){
                      const modal = document.getElementById("myModal");

                      modal.style.display = "block";
                      displayAlert("Konto zarejestrowano pomyślnie!<br> Zaloguj się, aby korzystać z serwisu.");

                      history.replaceState(null, null, window.location.pathname);
                    }

                    function displayAlert(message){
                      var alertDiv = document.createElement("div");
                      alertDiv.className = "login-alert-info";
                      alertDiv.setAttribute("data-alert-type", "info");
                      alertDiv.innerHTML = `
                        <div class="login-alert-content">
                          <i class="fa-sharp fa-solid fa-circle-info"></i>
                          <span class="login-alert-text">${message}</span>
                        </div>
                      `;

                      var formContainer = document.querySelector("#myModal .right");
                      formContainer.insertBefore(alertDiv, formContainer.firstChild);
                    }
                </script>
            </div>
             
         <?php
            }
          ?>
             
            <div class="hamburger">
                <a href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>
        </nav>
    </header>
    
    <script>

        const hamburger = document.querySelector('.hamburger');
        const menu = document.querySelector('.menu');
        const search_box = document.querySelector('.search-box');

        hamburger.addEventListener('click', () => {
          hamburger.classList.toggle('active');
          menu.classList.toggle('active');
          search_box.classList.toggle('active');
        });
	
    </script>
    