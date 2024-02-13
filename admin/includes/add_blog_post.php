<h3 class="mb-2">Dodaj novi blog post</h3>
<form action="" method="post" enctype="multipart/form-data" class="form">
    <div class="row gap-1">
        <div class="form__group col-4-md col-12-xs">
            <label class="form__label">Naslov</label>
            <input name="post_title" class="form__input" type="text" placeholder="Naslov">
        </div>
        
        <div class="form__group col-4-md col-12-xs">
            <label class="form__label">Podnaslov</label>
            <input name="post_caption" class="form__input" type="text" placeholder="Podnaslov">
        </div>
        <div class="form__group col-4-md col-12-xs">
            <label class="form__label">Tags</label>
            <input name="post_tags" class="form__input" type="text" placeholder="Tags">
        </div>
    </div>
    <div class="form__group">
        <lable class="form__label">Naslovna Fotografija</lable>
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
                <option value="draft">Izaberi status</option>
                <option value="approved">Odobren</option>
                <option value="draft">Nacrt</option>
            </select>
        </div>
    </div>
    <div class="row gap-1 ">
        <div class="form__group col-12-xs">
        <label for="" class="form__label">Sadržaj</label>
        <textarea name="post_content" id="" cols="30" rows="10" class="form__textarea" placeholder="Sadržaj"></textarea>
        </div>
    </div>
    <div class="row gap-1 ">
        <div class="form__group">
            <button class="btn btn-success" type="submit" name="add_blog_post">Dodaj</button>
        </div>
    </div>
</form>

<?php 
if(isset($_POST['add_blog_post'])) {
    $post_category_id = $_POST['post_category_id'];
    $post_title = $_POST['post_title'];
    $post_caption = $_POST['post_caption'];
    $post_content = $_POST['post_content'];
    $post_tags = $_POST['post_tags'];
    $post_status = $_POST['post_status'];
    $post_views_count = 0;
    $post_comments_count = 0;
    $post_slug = '0';
    $post_author = $_SESSION['user_id'];

    $file_name = $_FILES['post_image']['name'];
    $file_tmp_name = $_FILES['post_image']['tmp_name'];
    $file_size = $_FILES['post_image']['size'];
    $file_error = $_FILES['post_image']['error'];
    $file_type = $_FILES['post_image']['type'];

    $file_ext = explode('.', $file_name);
    $file_actual_ext = strtolower(end($file_ext));

    $allowed = array('jpg', 'jpeg', 'gif', 'png', 'pdf');

    // if(in_array($file_actual_ext, $allowed)) {
        // if($file_error === 0) {
            // if($file_size < 100000) {
                $file_name_new = uniqid('',true).".".$file_actual_ext;
                $file_destination = '../uploads/blog-images/'.$file_name_new;
                move_uploaded_file($file_tmp_name, $file_destination);
            // }else { 
            //     header("Location:posts.php?fileSizeOverLimit");
            // }
        // }else {
        //     header("Location:blog_posts.php?errorUploadingImage");
        // }
    // }else {
    //     header("Location:blog_posts.php?fileTypeNotAllowed");
    // }

    $add_post_query = "INSERT INTO blog_posts (post_category_id, post_author_id, post_title, post_caption, post_image, post_date, post_content, post_status, post_views_count, post_comments_count, post_slug, post_tags) VALUES ('{$post_category_id}', '{$post_author}', '{$post_title}', '{$post_caption}', '{$file_name_new}', now(), '{$post_content}', '{$post_status}', '{$post_views_count}', '{$post_comments_count}', '{$post_slug}', '{$post_tags}')";
    $run_add_post_query = mysqli_query($conn, $add_post_query);

    if(!$run_add_post_query) {
        die('Error adding new blog post' . mysqli_error($conn));
    }else {
        header("Location: blog.php?postAddedSuccessfully");
    }

}
?>