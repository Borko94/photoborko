<?php include('includes/admin_header.php'); ?>
<?php include('includes/admin_sidenav.php'); ?>

        

<!-- Main content -->
<main class="admin__main">
      <h3 class="mb-2">Blog komentari</h3>
      <table class="table table__wrapper">
          <thead>
            <tr class="table__row">
              <th class="table__head">ID</th>
              <th class="table__head">In reference to</th>
              <th class="table__head">Author</th>
              <th class="table__head">Email</th>
              <th class="table__head">Details</th>
              <th class="table__head">Status</th>
              <th class="table__head">Date</th>
              <th class="table__head">Approve</th>
              <th class="table__head">Draft</th>
              <th class="table__head">Ukloni</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $select_comments_query = "SELECT * FROM portfolio_comments";
            $run_select_comments_query = mysqli_query($conn, $select_comments_query);
            if(!$run_select_comments_query) {
                die("Error selecting comments " . mysqli_error($conn));
            }
            while($row = mysqli_fetch_assoc($run_select_comments_query)) {
                $comment_id = $row['comment_id'];
                $comment_post_id = $row['comment_post_id'];
                $comment_author = $row['comment_author'];
                $comment_email = $row['comment_email'];
                $comment_content = $row['comment_content'];
                $comment_date = $row['comment_date'];
                $comment_status = $row['comment_status'];
            
            ?>
            <tr class="table__row">
              <td data-label="ID" class="table__data"><?php echo $comment_id; ?></td>
              <td data-label="ID" class="table__data">
              <?php 
                $select_comment_post = "SELECT * FROM portfolio_posts WHERE post_id = '{$comment_post_id}'";
                $run_select_comment_post = mysqli_query($conn, $select_comment_post);
                while($row = mysqli_fetch_assoc($run_select_comment_post)){
                    $comment_post_title = $row['post_title'];
                
              ?>  
              <a href="../post.php?id=<?php echo $comment_post_id; ?>"><?php echo $comment_post_title; }?></a></td>
              <td data-label="Naslov" class="table__data"><?php echo $comment_author; ?></td>
              <td data-label="Date" class="table__data"><?php echo $comment_email; ?></td>
              <td data-label="Author" class="table__data"><?php echo $comment_content; ?></td>
              <td data-label="Author" class="table__data"><?php echo $comment_status; ?></td>
              <td data-label="Author" class="table__data"><?php echo $comment_date; ?></td>
              <td data-label="Author" class="table__data"><a href="portfolio_comments.php?approve=<?php echo $comment_id; ?>">Approve</a></td>
              <td data-label="Author" class="table__data"><a href="portfolio_comments.php?unapprove=<?php echo $comment_id; ?>">Unapprove</a></td>
              <!-- <td data-label="Edituj" class="table__data">
                <a href="#" class="table__link">
                  <svg class="table__icon table__icon-edit">
                    <use xlink:href="img/sprite.svg#icon-pencil"></use>
                  </svg>
                </a>
              </td> -->
              <td data-label="Obrisi" class="table__data">
                <a href="portfolio_comments.php?delete_comment=<?php echo $comment_id; ?>" class="table__link">
                  <svg class="table__icon table__icon-trash">
                    <use xlink:href="img/sprite.svg#icon-bin"></use>
                  </svg>
                </a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
</main>

<?php include('includes/admin_footer.php'); ?>

<?php
if(isset($_GET['delete_comment'])) {
    $delete_comment_id = $_GET['delete_comment'];

    $delete_comment_query = "DELETE FROM portfolio_comments WHERE comment_id = '{$delete_comment_id}'";
    $run_delete_comment_query = mysqli_query($conn, $delete_comment_query);

    if(!$run_delete_comment_query) {
        die("Error deleting comment" . mysqli_error($conn));
    }else {
        header("Location: portfolio_comments.php?commentDeletedSuccsfully");
    }
}

if(isset($_GET['approve'])) {
    $approve_id = $_GET['approve'];

    $query_approve_comment = "UPDATE portfolio_comments SET comment_status = 'approved' WHERE comment_id = {$approve_id}";
    $run_approve_comment = mysqli_query($conn, $query_approve_comment);

    if(!$run_approve_comment) {
        die("Error approving comment");
    }else {
        header("Location: portfolio_comments.php?commentApproved");
    }
}

if(isset($_GET['unapprove'])) {
    $unapprove_id = $_GET['unapprove'];

    $query_unapprove_comment = "UPDATE portfolio_comments SET comment_status = 'unapproved' WHERE comment_id = {$unapprove_id}";
    $run_query_unapprove_comment = mysqli_query($conn, $query_unapprove_comment);

    if(!$run_query_unapprove_comment) {
        die("Error unapproving comment");
    }else {
        header("Location: portfolio_comments.php?commentUnapproved");
    }
}

?>
        