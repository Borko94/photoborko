<?php include('includes/header.php'); ?>
<?php include('includes/navigation.php'); ?>
            
    <div class="post">
        <div class="post__main">
            <div class="post__wrapper">
            <?php 
            if(isset($_GET['id'])) {
                $get_post_id = $_GET['id']; 
                $view_query = "UPDATE blog_posts SET post_views_count = post_views_count + 1 WHERE post_id = '{$get_post_id}'";
                $run_view_query = mysqli_query($conn, $view_query);
            }
            $select_posts_query = "SELECT * FROM blog_posts WHERE post_id = {$get_post_id}";
            $run_select_posts_query = mysqli_query($conn, $select_posts_query);
            if(!$run_select_posts_query) {
                die("Error selecting posts " . mysqli_error($conn));
            }
            while($row = mysqli_fetch_assoc($run_select_posts_query)) {
                $post_id = $row['post_id'];
                $post_category_id = $row['post_category_id'];
                $post_title = $row['post_title'];
                $post_caption = $row['post_caption'];
                $post_author_id = $row['post_author_id'];
                $post_image = $row['post_image'];
                $post_date = $row['post_date'];
                $post_content = $row['post_content'];
                $post_tags = $row['post_tags'];
                $post_edit_date = strtotime($row['post_edit_date']);
                $post_edit_author = $row['post_edit_author'];
                $post_status = $row['post_status'];
                $post_views_count = $row['post_views_count'];
                $post_comments_count = $row['post_comments_count'];
            
            ?>
                <h1 class="post__title"><?php echo $post_title; ?></h1>
                <p class="post__date"><?php echo  $post_date; ?></p>
                <img src="uploads/blog-images/<?php echo  $post_image; ?>" alt="" class="post__image">
                <div class="post__content">
                <?php echo $post_content; ?>
                </div>

            <?php } ?>
            </div>
            <?php include("includes/comments.php"); ?>
        </div>
        
        <div class="post__aside">
            <?php include("includes/widgets.php"); ?>
        </div>
    </div>


<?php include('includes/info_details.php'); ?>
<?php include('includes/footer.php'); ?>