<h2 class="mb-2">Portfolio</h2>

<table class="table table__wrapper">
    <thead>
        <tr class="table__row">
        <th class="table__head">Kategorija</th>
        <th class="table__head">Naslov</th>
        <th class="table__head">Author</th>
        <th class="table__head">Date</th>
        <th class="table__head">Status</th>
        <th class="table__head">Views</th>
        <th class="table__head">Comments</th>
        </tr>
    </thead>
    <tbody>
    <?php 
        $portfolio_post_category_id = $_GET['post_id'];
        $query_select_portfolio_posts = "SELECT * FROM portfolio_posts WHERE post_category_id = $portfolio_post_category_id ORDER BY post_id DESC";
        $run_query_select_portfolio_posts = mysqli_query($conn, $query_select_portfolio_posts);
        if(!$run_query_select_portfolio_posts) {
            die("Error selecting posts " . mysqli_error($conn));
        }
        while($row = mysqli_fetch_assoc($run_query_select_portfolio_posts)) {
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

            
            $count_comments_query = "SELECT * FROM portfolio_comments WHERE comment_post_id = '$post_id'";
            $run_count_comments_query = mysqli_query($conn, $count_comments_query);
            $comments_count = mysqli_num_rows($run_count_comments_query);
        
        ?>
        <tr class="table__row">
            <td data-label="Kategorija" class="table__data">
            <?php
            $select_categories = "SELECT * FROM portfolio_categories WHERE portfolio_category_id = $post_category_id";
            $run_select_categories = mysqli_query($conn, $select_categories);
            while($row = mysqli_fetch_assoc($run_select_categories )){
                $cat_id = $row['portfolio_category_id'];
                $cat_title = $row['portfolio_category_name']; }
            ?><a href="portfolio.php?source=portfolio_posts_by_category&post_id=<?php echo $post_category_id;?>"><?php echo $cat_title;?></a></td>
            <td data-label="Naslov" class="table__data"><a href="../post.php?id=<?php echo $post_id; ?>"><strong><?php echo $post_title; ?></strong></a></td>
            <td data-label="Author" class="table__data">
            <?php
            $select_users_query = "SELECT * FROM users WHERE user_id = '{$post_author_id}'";
            $run_select_users_query = mysqli_query($conn, $select_users_query);
            if(!$run_select_users_query) {
                die("Error selecting user " . mysqli_error($conn));
            }
            while($row = mysqli_fetch_assoc($run_select_users_query)){
                $post_author_name = $row['user_firstname'];
            } ?><a href="portfolio.php?source=portfolio_posts_by_author&id=<?php echo $post_author_id; ?>"><?php echo $post_author_name; ?></a>
            </td>
            <td data-label="Date" class="table__data"><?php echo $post_date; ?></td>
            <td data-label="Status" class="table__data"><?php echo $post_status; ?></td>
            <td data-label="Views" class="table__data"><?php echo $post_views_count; ?></td>
            <td data-label="Comments" class="table__data"><a href="portfolio_comments_by_post.php?id=<?php echo $post_id; ?>"><?php echo $comments_count; ?></a></td>
        </tr>
        <?php } ?> 
    </tbody>
</table>


<?php
if(isset($_GET['delete_portfolio_post'])) {
    $delete_post_id = $_GET['delete_portfolio_post'];

    $delete_post_query = "DELETE FROM portfolio_posts WHERE post_id = '{$delete_post_id}'";
    $run_delete_post_query = mysqli_query($conn, $delete_post_query);

    if(!$run_delete_post_query) {
        die("Error deleting post" . mysqli_error($conn));
    }else {
        header("Location: portfolio.php?postDeletedSuccsfully");
    }
}

if(isset($_GET['approve'])) {
    $approve_id = $_GET['approve'];

    $query_approve_post = "UPDATE portfolio_posts SET post_status = 'approved' WHERE post_id = {$approve_id}";
    $run_approve_post = mysqli_query($conn, $query_approve_post);

    if(!$run_approve_post) {
        die("Error approving post");
    }else {
        header("Location: portfolio.php?postApproved");
    }
}

if(isset($_GET['unapprove'])) {
    $unapprove_id = $_GET['unapprove'];

    $query_unapprove_post = "UPDATE portfolio_posts SET post_status = 'draft' WHERE post_id = {$unapprove_id}";
    $run_query_unapprove_post = mysqli_query($conn, $query_unapprove_post);

    if(!$run_query_unapprove_post) {
        die("Error unapproving post");
    }else {
        header("Location: portfolio.php?postUnapproved");
    }
}
?>

