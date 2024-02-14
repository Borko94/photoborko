<div class="portfolio">
<?php
$query_select_weddings = "SELECT * FROM portfolio_posts WHERE post_category_id = '4' ORDER BY post_id Desc";
$run_query_select_weddings = mysqli_query($conn, $query_select_weddings);
while($row = mysqli_fetch_assoc($run_query_select_weddings)){
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

    <div class="portfolio__card">
        <a href="portfolio_item.php?id=<?php echo $post_id; ?>"><img src="uploads/portfolio-images/<?php echo $post_image; ?>" alt="" class="portfolio__image"></a>
        <h3 class="portfolio__title"><a href="portfolio_item.php?id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></h3>
    </div>


<?php } ?>
</div>