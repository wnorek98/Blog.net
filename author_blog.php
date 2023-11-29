<?php
    include_once('connect.php');
    $title = "BLOG.NET | Blog";
    include_once('include/header.php');
    session_start();
?>

<?php

    if(isset($_POST['submit']))
    {
        $id_users = $_SESSION['id_users'];
        $id_blogs = $_GET['id_blogs'];
        $comment = $_POST['comment'];
        
        if(empty($comment))
        {
            echo "";
        }
        else
        {
            $query = "INSERT INTO comments (id_users, id_blogs, comment)
                      VALUES ('$id_users', '$id_blogs', '$comment')";

            $result = mysqli_query($connect, $query);
        }
    }

?>

<?php

    $query =  "SELECT users.*, blogs.* 
               FROM users 
               INNER JOIN blogs 
               ON users.id_users = blogs.id_users 
               WHERE id_blogs='$_GET[id_blogs]'";

    $result = mysqli_query($connect, $query);
    
    while($row = mysqli_fetch_assoc($result))
    {
?>
    <div class="grid-container-author-blog">
            
        <div class="grid-item" id="title"><?= $row['title'] ?></div>
        <div class="grid-item" id="content"><?= $row['content']. '<br><br>' ?></div>
        <div class="grid-item" id="comments_section">
            <div class="readers-entries">Komentarze czytelników:</div>

            <?php
                if(isset($_SESSION['id_users']))
                {
             ?>         
                <form method="post">
                    <label>
                        <textarea class="comment-content" placeholder="Treść komentarza" type="text" name="comment" cols=102 rows=15 required style="max-width: 980px;"></textarea>
                    </label>
                    <button class="add_comment" type="submit" name="submit" value="submit">Dodaj komentarz</button>
                </form>

             <?php
                }
                else
                {
             ?>
                <div>Musisz się <a class="login" onclick="openModal()">zalogować</a>, aby skomentować.</div>
            
            <?php
                }
            ?>
            
        </div>
        <div class="grid-item" id="comment">

            <?php

                $comments = "SELECT users.*, comments.* 
                             FROM users
                             INNER JOIN comments 
                             ON users.id_users = comments.id_users
                             WHERE id_blogs='$_GET[id_blogs]'";

                $result = mysqli_query($connect, $comments);

                if (mysqli_num_rows($result) > 0) 
                {
                    while ($row_comments = mysqli_fetch_assoc($result)) 
                    {

            ?>

            <img class="profile-picture-comment" src="image/<?= $row_comments['image']; ?>">
            
            <div class="comment">
                <div class="username-comment"><?= $row_comments['username']; ?></div>
                <?= $row_comments['comment']; ?>
            </div>

            <?php

                    }
                }
            ?>
            
        </div>
        <div class="grid-item" id="username"><?= $row['username']; ?></div>
        <div class="grid-item" id="image">
            <img class="profile-picture" src="image/<?= $row['image'] ?>"><?= '<br>' ?>
        </div>
        <div class="grid-item" id="button">
            <button class="user_profile">O mnie</button>
        </div>
    </div>
                
<?php
    }

    include_once('include/footer.php');
?>