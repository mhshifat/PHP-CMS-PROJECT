<?php
    $section = "blog";
    $title = "CodersBD - Welcome to our blog Feed!";
    if(isset($_GET['cat_id'])) {
        require("db/db.php");
        $post = $_GET['cat_id'];
        $query_1 = "SELECT * FROM posts WHERE id='$post'";
        $result_1 = mysqli_query($conn, $query_1);
        $row = mysqli_fetch_assoc($result_1);
        $id = $row['id'];
        $title_1 = $row['title'];
        $content = $row['content'];
        $author = $row['author'];
        $date = $row['date'];
        $image = $row['image'];
    }
    require("includes/header.inc.php");
?>
<?php
    require("includes/navbar.inc.php");
?>
<div class="single_post">
    <div class="single_post_box">
        <div class="single_post_box_img">
            <img src="images/<?php echo $image; ?>">
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="main_post">
                    <h2><?php echo $title_1; ?></h2>
                    <h5>Published Date : <?php echo $date; ?></h5>
                    <h5>By @ <?php echo $author; ?></h5>
                    <div class="adds_728_90">
                        <img src="images/Conti-728x90-banner-ad-REV.gif">
                    </div>
                    <p><?php echo $content; ?></p>
                    <div class="adds_728_90">
                        <img src="images/ShakeOut_BannerAds_GetReady_728x90_v3.gif">
                    </div>
                    <div class="comment_section">
                        <form action="script/comment.script.php?blogId=<?php echo $id; ?>" method="POST">
                            <?php
                                if(isset($_SESSION['id'])) {
                                    include("includes/comment.form.inc.php");
                                } else {
                                    echo "<p style='color:red;'>You need to login first in order to comment on this post!</p>";
                                }
                            ?>
                        </form>
                        <hr>
                        <?php
                            if(isset($_GET['post'])) {
                                $post_id = $_GET['post'];
                                $query_2 = "SELECT * FROM comments WHERE blog_id='$post_id'";
                                $result_2 = mysqli_query($conn, $query_2);
                                $row_1 = mysqli_fetch_assoc($result_2);
                                $name = $row_1['username'];
                                $date = $row_1['date'];
                                $comment = $row_1['comment'];
                                if($row_1 == true) {
                                    echo '<div class="comment">
                                    <div class="comment_pro_img">
                                        <img src="images/bg.png">
                                    </div>
                                    <div class="comment_icon">
                                        <i class="fas fa-caret-left fa-2x"></i>
                                    </div>
                                    <div class="comment_comment">
                                        <h6>@ ' . $name . ' - (' . $date . ')</h6>
                                        <h6>' . $comment . '</h6>
                                    </div>
                                    </div>';
                                } else {
                                     echo "null";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="sidebar">
                    <div class="newsletter">
                        <form action="script/newsletter.script.php" method="POST">
                            <h3><i class="fas fa-envelope fa-sm"> &nbsp;Join our newsletter</i></h3>
                            <input type="email" name="newsletter" placeholder="Your email" required>
                            <button type="submit" name="news_submit">SUBSCRIBE</button>
                        </form>
                    </div>
                    <div class="category">
                        <h3><i class="fas fa-list-ol fa-sm"></i> &nbsp;Blog catagories</h3>
                        <ul>
                            <?php
                                $query_3 = "SELECT * FROM catagories";
                                $result_3 = mysqli_query($conn, $query_3);
                                while($row_3 = mysqli_fetch_assoc($result_3)) {
                                    $cat = $row_3['category'];
                                    echo '<li><a href="blog.category.php?cat='.$cat.'">'.$cat.'</a></li>';
                                }
                            ?>
                        </ul>
                    </div>
                    <div class="ads">
                        <img src="images/seagramsgtbumain.png">
                    </div>
                    <div class="recent_posts">
                        <h3><i class="fab fa-tripadvisor fa-sm"></i> &nbsp;Recent posts</h3>
                        <?php
                            $query_4 = "SELECT * FROM posts ORDER BY id DESC LIMIT 5";
                            $result_4 = mysqli_query($conn, $query_4);
                            while($row_4 = mysqli_fetch_assoc($result_4)) {
                                $title = $row_4['title'];
                                $id = $row_4['id'];
                                ?>
                                    <h5><a href="recent.post.php?page=blog&recent=<?php echo $id; ?>"><?php echo $title; ?></a></h5>
                                <?php
                            }
                        ?>
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
