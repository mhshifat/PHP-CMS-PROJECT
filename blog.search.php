<?php
    $section = "blog";
    $title = "CodersBD - Welcome to our blog Feed!";
    require("includes/header.inc.php");
?>
<?php
    require("includes/navbar.inc.php");
?>
<div class="blog_main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 blog_main_box">
                <div class="blog_secondary_box">
                    <h3>Welcome To Our Blog Feed!</h3>
                    <div class="search">
                        <form action="blog.search.php?page=blog" method="GET">
                            <input type="text" name="search" placeholder="Search by category, title or author name............" required>
                            <button type="submit" name="search_submit"><i class="fas fa-search fa-lg"></i></i></button>
                        </form>
                    </div>
                    <?php
                        if (isset($_GET['search_submit'])) {

                            $search = $_GET['search'];

                            $query = "SELECT * FROM posts WHERE category LIKE '$search' OR title LIKE '$search' OR author LIKE '$search'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $title = $row['title'];
                                $author = $row['author'];
                                $image = $row['image'];
                                $query_1 = "SELECT LEFT(content, 380) FROM posts WHERE category LIKE '$search' OR title LIKE '$search' OR author LIKE '$search'";
                                $result_1 = mysqli_query($conn, $query_1);
                                if ($row_1 = mysqli_fetch_assoc($result_1)) {
                                    $content = $row_1['LEFT(content, 380)'];
                                }
                                ?>
                                <div class="blog_box">
                                    <div class="blog_image">
                                        <a href="post.search.php?page=blog&search_post=<?php echo $id; ?>" target="_blank"><img src="images/<?php echo $image; ?>"></a>
                                    </div>
                                    <div class="blog_content">
                                        <a href="post.search.php?page=blog&search_post=<?php echo $id; ?>" target="_blank"><h5>H<?php echo $title; ?></h5></a>
                                        <a href="" target="_blank"><h6>By @ <?php echo $author; ?></h6></a>
                                        <p><?php echo $content; ?></p>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    require("includes/copy.inc.php");
?>
<?php
    require("includes/footer.inc.php");
?>
