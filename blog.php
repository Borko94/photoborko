<?php include('includes/header.php'); ?>
<?php include('includes/navigation.php'); ?>
<!-- <?php include('includes/slideshow.php'); ?> -->

<main class="main">
    <div class="heading-div text-center mt-1 mb-2">
        <h1 class="heading-primary">Blog</h1>
    </div>

    <section class="blog">
        <?php 
            $select_posts_query = "SELECT * FROM blog_posts WHERE post_status = 'approved'";
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
                $post_edit_date = $row['post_edit_date'];
                $post_edit_author = $row['post_edit_author'];
                $post_status = $row['post_status'];
                $post_views_count = $row['post_views_count'];
                $post_comments_count = $row['post_comments_count'];
            ?>
            <div class="blog__card">
                <a href="post.php?id=<?php echo  $post_id; ?>"><img src="uploads/blog-images/<?php echo  $post_image; ?>" alt="" class="blog__image"></a>
                <div class="blog__details">
                    <h3 class="blog__titleX"><a href="post.php?id=<?php echo  $post_id; ?>"><?php echo  $post_title; ?></a></h3>
                    <p class="blog__text"><?php echo  $post_caption; ?></p>
                    <a href="post.php?id=<?php echo  $post_id; ?>" class="blog__button">Vise</a>
                </div>
            </div>
            <?php } ?>
            
        </section> 
    
</main>

    
        

<?php include('includes/info_details.php'); ?>
<?php include('includes/footer.php'); ?>