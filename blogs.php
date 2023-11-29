<?php
    include_once('connect.php');
    $title = "BLOG.NET | Wasze Blogi";
    include_once('include/header.php');
    session_start();
?>

<form class="sort" method="get" action="">
    <label for="sort">Sortowanie:</label>
    <select id="sort" name="sort">
        <option value="najnowsze" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'najnowsze')
        echo 'selected'; ?>>Najnowsze</option>
        <option value="najstarsze" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'najstarsze')
        echo 'selected'; ?>>Najstarsze</option>
    </select>
    <input type="submit" class="sort-input" value="akceptuj">
</form>

<?php

    $results_per_page = 5;

    if(isset($_GET['sort']) && $_GET['sort'] == 'najnowsze') 
    {
        $sort = 'ORDER BY blogs.publication_date DESC';
    } 
    else 
    {
        $sort = 'ORDER BY blogs.publication_date ASC';
    }

    $query = "SELECT users.*, blogs.* FROM users INNER JOIN blogs ON users.id_users = blogs.id_users";

    $result = mysqli_query($connect, $query);

    $total_results = mysqli_num_rows($result);

    $total_pages = ceil($total_results / $results_per_page);

    if(!isset($_GET["page"]))
    {   
        $current_page = 1;
    }
    else
    {   
        $current_page = $_GET["page"];
    }

    $first_result = ($current_page - 1) * $results_per_page;

    $query = "SELECT users.*, blogs.* 
              FROM users 
              INNER JOIN blogs 
              ON users.id_users = blogs.id_users $sort
              LIMIT $first_result, $results_per_page";

    $result = mysqli_query($connect, $query);

    while($row = mysqli_fetch_assoc($result))
    {
?>

    <div class="grid-container-blogs">

        <div class="grid-item-blogs" id="username-blogs">
            <?= $row['username'] ?>
        </div>

        <div class="grid-item-blogs" id="image-blogs">
            <img class="profile" src="image/<?= $row['image']; ?>">
        </div>

        <div class="grid-item-blogs" id="button-blogs">
            <a href="author_blog.php?id_blogs=<?= $row['id_blogs']; ?>">
                <button class="all_read">Przeczytaj całość</button> 
            </a> 
        </div>
        <div class="grid-item-blogs" id="title-blogs">
            <?= $row['title']; ?>
        </div>

        <div class="grid-item-blogs" id="content-blogs"> 
            <?php 
                if(strlen($row['content']) <= 700) 
                {
                echo $row['content'];
                }
                else
                {
                    echo substr($row['content'], 0, 700). '...';
                }
            ?>
        </div>
    </div>

<?php
    }
    for($page = 1; $page <= $total_pages; $page++)
    {
        echo "<a href='blogs.php?page=" . $page . "&sort=" . $_GET['sort'] . "'>" . $page . "</a> ";
    }
?>

<div class="pagination">
  <ul>
    <?php if ($current_page > 1) : ?>
      <li><a href="?page=1&sort=<?php echo $_GET['sort']; ?>">Pierwsza</a></li>
      <li><a href="?page=<?php echo $current_page - 1; ?>&sort=<?php echo $_GET['sort']; ?>">&lt;</a></li>
    <?php endif; ?>

    <?php
        $displayed_pages = array(1);

        if ($total_pages < 5)
        {
            $displayed_pages = range(1, $total_pages);
        } 
        else
        {
            if ($current_page <= 3) 
            {
                $displayed_pages = range(1, 4);
                
                if ($total_pages > 5) 
                {
                    $displayed_pages[] = '...';
                }
                
                $displayed_pages[] = $total_pages;
            } 
            elseif ($current_page >= $total_pages - 2) 
            {
                $displayed_pages[] = 1;
                
                if ($total_pages > 5) 
                {
                    $displayed_pages[] = '...';
                }
                
                $displayed_pages = array_merge($displayed_pages, range($total_pages - 3, $total_pages));
            } 
            else 
            {
                $displayed_pages[] = 1;
                
                if ($current_page > 4) 
                {
                    $displayed_pages[] = '...';
                }
                
                $displayed_pages = array_merge($displayed_pages, range($current_page - 1, $current_page + 1));
                
                if ($current_page < $total_pages - 3) 
                {
                    $displayed_pages[] = '...';
                }
                
                $displayed_pages[] = $total_pages;
            }
        }

        for($page = 1; $page <= $total_pages; $page++)
        {
            if ($page == $current_page) 
            {
                echo "<li class='pagination-active'>" . $page . "</li>";
            } 
            elseif (in_array($page, $displayed_pages)) 
            {
                if ($page == '...') 
                {
                    echo "<li class='dots'>" . $page . "</li>";
                } 
                else 
                {
                    echo "<li><a href='?page=" . $page . "&sort=" . $_GET['sort'] . "'>" . $page . "</a></li>";
                }
            }
        }
    ?>

    <?php if ($current_page < $total_pages) : ?>
      <li><a href="?page=<?php echo $current_page + 1; ?>&sort=<?php echo $_GET['sort']; ?>">&gt;</a></li>
      <li><a href="?page=<?php echo $total_pages; ?>&sort=<?php echo $_GET['sort']; ?>">Ostatnia</a></li>
    <?php endif; ?>
  </ul>
</div>

<div class="pagination-form">
  <form action="blogs.php" method="get" class="page-input-form">
    <input type="hidden" name="sort" value="<?php echo $_GET['sort']; ?>">
    <?php
        echo "<input type='number' name='page' class='page-input' placeholder='$current_page z $total_pages' required min='1' max='$total_pages'>";
    ?>
    <button type="submit" class="page-input-button">Przejdź</button>
  </form>
</div>

<?php
    include_once('include/footer.php');
?>
