<section class="heading text-center">
    <h2 class="heading-primary"><a href="blog.php">Pogledajte naš blog</a></h2>
</section>

<section class="blog-cards">
<?php 
            $select_posts_query = "SELECT * FROM blog_posts WHERE post_category_id = '1' AND post_status = 'approved' ORDER BY post_id DESC LIMIT 4";
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
            ?>
            <article class="blog-cards__article">
                <a href="post.php?id=<?php echo $post_id; ?>"><img src="uploads/blog-images/<?php echo  $post_image; ?>" alt="" class="blog-cards__image"></a>
                <a href="post.php?id=<?php echo $post_id; ?>"><h1 class="blog-cards__title"><?php echo  $post_title; ?></h1></a>
                <a href="post.php?id=<?php echo $post_id; ?>"><p class="blog-cards__text"><?php echo  $post_caption; ?></p></a>
            </article>

            <?php } ?>
</section>