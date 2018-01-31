<?php
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
                    if (isset($_GET['pager'])) {
                        $pager = $_GET['pager'];
                    } else {
                        $pager = "";
                    }
                    if ($pager == "" || $pager == 1) {
                        $pager_1 = 0;
                    } else {
                        $pager_1 = ($pager * 10) - 10;
                    }
                    ?>
                    <?php
                        $query = "SELECT * FROM posts ORDER BY id DESC LIMIT $pager_1, 10";
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $title = $row['title'];
                            $author = $row['author'];
                            $image = $row['image'];
                            $query_1 = "SELECT LEFT(content, 380) FROM posts ORDER BY id DESC";
                            $result_1 = mysqli_query($conn, $query_1);
                            if($row_1 = mysqli_fetch_assoc($result_1)) {
                                $content = $row_1['LEFT(content, 380)'];
                            }
                            ?>
                            <div class="blog_box">
                                <div class="blog_image">
                                    <a href="post.php?page=blog&post=<?php echo $id; ?>" target="_blank"><img src="images/<?php echo $image; ?>"></a>
                                </div>
                                <div class="blog_content">
                                    <a href="post.php?page=blog&post=<?php echo $id; ?>" target="_blank"><h5>H<?php echo $title; ?></h5></a>
                                    <a href=""><h6>By @ <?php echo $author; ?></h6></a>
                                    <p><?php echo $content; ?></p>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                    <div class="pagination justify-content-center">
                    <nav aria-label="Page navigation example justify-content-center">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                            <a style="color: darksalmon;background:#e4e2d5;" class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                            </li>
                            <?php
                                $query_2 = "SELECT * FROM posts";
                                $result_2 = mysqli_query($conn, $query_2);
                                $count = mysqli_num_rows($result_2);

                                $count = ceil($count / 10);

                                for($i=1; $i<=$count; $i++) {
                                    if($i == $pager) {
                                        echo '<li class="page-item"><a id="on_1" style="color: darksalmon;background:#e4e2d5;" class="page-link" href="blog.php?page=blog&pager=' . $i . '">' . $i . '</a></li>';
                                    } else {
                                        echo '<li class="page-item"><a style="color: darksalmon;background:#e4e2d5;" class="page-link" href="blog.php?page=blog&pager=' . $i . '">' . $i . '</a></li>';
                                    }
                                }
                            ?>
                            <li class="page-item">
                            <a style="color: darksalmon;background:#e4e2d5;" class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                            </li>
                        </ul>
                        </nav>
                </div>
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
