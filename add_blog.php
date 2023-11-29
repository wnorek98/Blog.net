<?php
    include_once('connect.php');
    session_start();
    error_reporting(false);

    if (empty($_SESSION['id_users'])) 
    {
        header('Location: index.php');
        exit;
    }

    $title = "BLOG.NET | Stwórz bloga";
    include_once('include/header.php');
    include_once('include/content_blog.php');
?>

<?php

    if(isset($_POST['submit']))
    {
        $id_users = $_SESSION['id_users'];
        $author = $_SESSION['username'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        
        if((empty($title)) || (empty($content)))
        {
            echo '<div class="add_blog-alert-danger">
                    <div class="add_blog-alert-content">
                      <i class="fa-solid fa-circle-exclamation"></i>
                      <span class="add_blog-alert-text">Wszystkie pola muszą być uzupełnione!</span>
                    </div>
                  </div>';
        }
        elseif(strlen($content) < 2000)
        {
            echo '<div class="add_blog-alert-danger">
                    <div class="add_blog-alert-content">
                      <i class="fa-solid fa-circle-exclamation"></i>
                      <span class="add_blog-alert-text">Treść musi mieć co najmniej 2000 znaków!</span>
                    </div>
                  </div>';
        }
        else
        {
            if(strlen($title) < 5 || strlen($title) > 60)
            {
                echo '<div class="add_blog-alert-danger">
                        <div class="add_blog-alert-content">
                          <i class="fa-solid fa-circle-exclamation"></i>
                          <span class="add_blog-alert-text">Tytuł musi mieć od 5 do 60 znaków!</span>
                        </div>
                      </div>';
            }
            else
            {
                $query = "INSERT INTO blogs (id_users, author, title, content)
                VALUES ('$id_users', '$author', '$title', '$content')";

                $result = mysqli_query($connect, $query);
                
                echo '<div class="add_blog-alert-success">
                        <div class="add_blog-alert-content">
                          <i class="fa-solid fa-circle-check"></i>
                          <span class="add_blog-alert-text">Blog utworzono pomyślnie!</span>
                        </div>
                      </div>';
                
                header("refresh: 2; index.php");
            }
        }
    }

?>

<?php
    if(empty($_SESSION['id_users']))
    {
        header('location: index.php');
    }
    else
    {
?>

<div class="container-add-blog">
    
    <form method="post">
        <label for="author">Autor:</label>
        <input type="text" name="author" placeholder="<?= $_SESSION['username']; ?>" disabled>

        <label for="title">Tytuł:</label>
        <input type="text" name="title" placeholder="Wpisz tytuł">

        <label for="content">Treść:</label>
        <textarea name="content" placeholder="Wpisz treść"><?php echo $content_blog; ?></textarea>

        <button class="add_blog" type="submit" name="submit" value="submit">Dodaj bloga</button>
    </form>
</div>
    
<?php
    }

    include_once('include/footer.php');
?>