<div class="comments">
    <form action="" class="comment__form" method="post">
        <input name="comment_email" type="email" class="comment__input" placeholder="Email adresa">
        <textarea name="comment_content" class="comment__textarea" placeholder="Ostavi svoj komentar"></textarea>
        <button class="comment__button" type="submit" name="add_comment">Posalji</button>
    </form>
    <?php
    $select_comments_query = "SELECT * FROM blog_comments WHERE comment_post_id = '{$get_post_id}' AND comment_status = 'approved'";
    $run_select_comments_query = mysqli_query($conn, $select_comments_query);
    if(!$run_select_comments_query) {
        die("Error selecting comments " . mysqli_error($conn));
    }
    while($row = mysqli_fetch_assoc($run_select_comments_query)) {
        $comment_id = $row['comment_id'];
        $comment_post_id = $row['comment_post_id'];
        $comment_email = $row['comment_email'];
        $comment_date = $row['comment_date'];
        $comment_content = $row['comment_content'];
        $comment_status = $row['comment_status'];
    ?>
    <div class="comment">
    
        <img src="img/eugenivy_now-1Bs2sZ9fD2Q-unsplash.jpg" alt="" class="comment__image">
        <div class="comment__details">
            <h2 class="comment__name"><?php echo $comment_email; ?></h2>
            <p class="comment__date"><?php echo $comment_date; ?></p>
            <div class="comment__content"><?php echo $comment_content; ?></div>
        </div>
    </div>
    
    <?php } ?>
</div>

<?php
if(isset($_POST['add_comment'])){
    $comment_email = $_POST['comment_email'];
    $comment_content = $_POST['comment_content'];
    $comment_date = date("Y/m/d");
    $comment_status = 'unapproved';
    
    $add_comment_query = "INSERT INTO blog_comments (comment_email, comment_post_id, comment_content, comment_status, comment_date) VALUES ('{$comment_email}', '{$get_post_id}', '{$comment_content}', '{$comment_status}', '{$comment_date}')";
    $run_add_comment_query = mysqli_query($conn, $add_comment_query);

    if(!$run_add_comment_query){
        printf("Error message: %s\n", mysqli_error($conn));
    }else {
        header("Location: post.php?id=$get_post_id&CommentAdded");
    }
}
?>