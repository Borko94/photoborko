<h3 class="mb-2">Uredi blog post</h3>
<?php 
if(isset($_GET['p_id'])) {
    $edit_post_id = $_GET['p_id'];

    $edit_posts_query = "SELECT * FROM blog_posts WHERE post_id = '{$edit_post_id}'";
    $run_edit_posts_query = mysqli_query($conn, $edit_posts_query);

    while($row = mysqli_fetch_assoc($run_edit_posts_query)):
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
        $post_comment_counts = $row['post_comments_count'];
?>
<form action="" method="post" enctype="multipart/form-data" class="form">
    <div class="row gap-1">
        <div class="form__group col-4-md col-12-xs">
            <label class="form__label">Naslov</label>
            <input name="post_title" class="form__input" type="text" value="<?php echo $post_title; ?>">
        </div>
        
        <div class="form__group col-4-md col-12-xs">
            <label class="form__label">Podnaslov</label>
            <input name="post_caption" class="form__input" type="text" value="<?php echo $post_caption; ?>">
        </div>
        <div class="form__group col-4-md col-12-xs">
            <label class="form__label">Tags</label>
            <input name="post_tags" class="form__input" type="text" value="<?php echo $post_tags; ?>">
        </div>
    </div>
    <div class="form__group">
        <img width="100px" src="../uploads/blog-images/<?php echo $post_image; ?>" alt="" class="form__img">
        <label class="form__label">Naslovna Fotografija</label>
        <input name="post_image" class="form__input" type="file" placeholder="Foto...">
    </div>
    <div class="row gap-1">
        <div class="form__group col-6-md col-12-xs">
            <label for="" class="form__label">Kategorija</label>
            <select name="post_category_id" id="" class="form__select">
                <?php 
                $select_cat = "SELECT * FROM blog_categories";
                $run_select_cat = mysqli_query($conn,$select_cat);
                while($row = mysqli_fetch_assoc($run_select_cat)) {
                    $cat_id = $row['blog_category_id'];
                    $cat_title = $row['blog_category_name'];
                ?>
                <option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form__group col-6-md col-12-xs">
            <label for="" class="form__label">Status</label>
            <select name="post_status" id="" class="form__select">
                <option value="<?php echo $post_status; ?>">Izaberi status(<?php echo $post_status; ?>)</option>
                <option value="approved">Odobren</option>
                <option value="draft">Nacrt</option>
            </select>
        </div>
    </div>
    <div class="row gap-1 ">
        <div class="form__group col-12-xs">
        <label for="" class="form__label">Sadržaj</label>
        <textarea name="post_content" id="" cols="30" rows="10" class="form__textarea"><?php echo $post_content; ?></textarea>
        </div>
    </div>
    <div class="row gap-1 ">
        <div class="form__group">
            <button class="btn btn-success" type="submit" name="update_blog_post">Ažuriraj</button>
        </div>
    </div>
</form>

<?php endwhile; } ?>
<?php 

if(isset($_POST['update_blog_post'])){
    $post_category_id = $_POST['post_category_id'];
    $post_title = $_POST['post_title'];
    $post_caption = $_POST['post_caption'];
    $post_content = $_POST['post_content'];
    $post_tags = $_POST['post_tags'];
    $post_status = $_POST['post_status'];

    $file_name = $_FILES['post_image']['name'];
    $file_tmp_name = $_FILES['post_image']['tmp_name'];
    $file_size = $_FILES['post_image']['size'];
    $file_error = $_FILES['post_image']['error'];
    $file_type = $_FILES['post_image']['type'];

    $file_ext = explode('.', $file_name);
    $file_actual_ext = strtolower(end($file_ext));

    $allowed = array('jpg', 'jpeg', 'gif', 'png', 'pdf');

    // if(in_array($file_actual_ext, $allowed)) {
    //     if($file_error === 0) {
            // if($file_size < 100000) {
                $file_name_new = uniqid('',true).".".$file_actual_ext;
                $file_destination = '../uploads/blog-images/'.$file_name_new;
                move_uploaded_file($file_tmp_name, $file_destination);
            // }else { 
            //     header("Location:posts.php?fileSizeOverLimit");
            // }
    //     }else {
    //         header("Location:blog_posts.php?errorUploadingImage");
    //     }
    // }else {
    //     header("Location:blog_posts.php?fileTypeNotAllowed");
    // }

    if(empty($file_name)) {
        $query_select_post_image = "SELECT * FROM blog_posts WHERE post_id = {$edit_post_id}";
        $run_query_select_post_image = mysqli_query($conn, $query_select_post_image);
        while($row = mysqli_fetch_array($run_query_select_post_image)){
            $file_name_new = $row['post_image'];
        }
    }

    $update_post_query = "UPDATE blog_posts SET ";
    $update_post_query .="post_category_id = {$post_category_id}, ";
    $update_post_query .="post_title = '{$post_title}', ";
    $update_post_query .="post_caption = '{$post_caption}', ";
    $update_post_query .="post_image = '{$file_name_new}', ";
    $update_post_query .="post_edit_date = now(), ";
    $update_post_query .="post_content = '{$post_content}', ";
    $update_post_query .="post_status = '{$post_status}', ";
    $update_post_query .="post_tags = '{$post_tags}' ";
    $update_post_query .="WHERE post_id = {$edit_post_id}";

    $run_update_post_query = mysqli_query($conn, $update_post_query);

    if(!$run_update_post_query) {
        die("Error updating blog post" . mysqli_error($conn));
    }else{ 
        header("Location: blog.php?postUpdatedSuccessfully");
    }
}

?>