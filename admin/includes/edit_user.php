<div class="dashboard__item dashboard__item--full">
    <div class="">
    <?php
    if(isset($_GET['u_id'])) {
        $edit_user_id = $_GET['u_id'];
        
        $select_user = "SELECT * FROM users WHERE user_id = '{$edit_user_id}'";
        $run_select_user = mysqli_query($conn, $select_user);
        if(!$run_select_user) {
            die("Error selecting user" . mysqli_error($conn));
        }

        while($row = mysqli_fetch_assoc($run_select_user)){
            $user_id = $row['user_id'];
            $user_username = $row['user_username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_post_count = $row['user_post_count'];
            $user_status = $row['user_status'];
            $user_role = $row['user_role'];  
    ?>
    <form action="" method="post" enctype="multipart/form-data" class="form">
        <div class="row gap-1">
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Ime</label>
                <input name="user_firstname" class="form__input" type="text" value="<?php echo $user_firstname; ?>">
            </div>
            
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Prezime</label>
                <input name="user_lastname" class="form__input" type="text" value="<?php echo $user_lastname; ?>">
            </div>
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Korisnicko ime</label>
                <input name="user_username" class="form__input" type="text" value="<?php echo $user_username; ?>">
            </div>
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Email</label>
                <input name="user_email" class="form__input" type="email" value="<?php echo $user_email; ?>">
            </div>
        </div>
        <div class="form__group">
            <lable class="form__label">Fotografija</lable>
            <input name="user_image" type="file" class="form__input" placeholder="Foto...">
        </div>
        <div class="row gap-1">
            <div class="form__group col-6-md col-6-xs">
                <label for="" name="user_role" class="form__label">Role</label>
                <select name="user_role" id="" class="form__select">
                    <option value="<?php echo $user_role; ?>" class="form__option"><?php echo ucfirst($user_role); ?></option>
                    <option value="admin" class="form__option">Admin</option>
                    <option value="moderator" class="form__option">Moderator</option>
                    <option value="user" class="form__option">User</option>
                </select>
            </div>
            <div class="form__group col-6-md col-6-xs">
                <label for="" namespace name="user_status" class="form__label">Status</label>
                <select name="user_status" id="" class="form__select">
                    <option value="active" class="form__option">Aktivan</option>
                    <option value="inactive" class="form__option">Inactive</option>
                    <option value="disabled" class="form__option">Disabled</option>
                </select>
            </div>
        </div>
        <div class="row gap-1 ">
            <div class="form__group col-6-md col-6-xs">
            <label for="" class="form__label">Lozinka</label>
            <input name="user_password" type="password" class="form__input">
            </div>
        </div>
        <div class="row gap-1 ">
            <div class="form__group">
                <button class="btn btn-success" type="submit" name="update_user">Potvrdi</button>
            </div>
        </div>
    </form>
    <?php } }?>
    </div>
</div>

<?php
if(isset($_POST['update_user'])) {
    $user_username = $_POST['user_username'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_status = $_POST['user_status'];
    $user_role = $_POST['user_role'];

    $file_name = $_FILES['user_image']['name'];
    $file_tmp_name = $_FILES['user_image']['tmp_name'];
    $file_size = $_FILES['user_image']['size'];
    $file_error = $_FILES['user_image']['error'];
    $file_type = $_FILES['user_image']['type'];

    $file_ext = explode('.', $file_name);
    $file_actual_ext = strtolower(end($file_ext));

    $allowed = array('jpg', 'jpeg', 'gif', 'png', 'pdf');

    $file_name_new = uniqid('',true).".".$file_actual_ext;
    $file_destination = 'uploads/profile-images/'.$file_name_new;
    move_uploaded_file($file_tmp_name, $file_destination);

    if(empty($file_name)) {
        $query_select_post_image = "SELECT * FROM users WHERE user_id = {$edit_user_id}";
        $run_query_select_user_image = mysqli_query($conn, $query_select_post_image);
        while($row = mysqli_fetch_array($run_query_select_user_image)){
            $file_name_new = $row['user_image'];
        }
    }

    $update_user_query = "UPDATE users SET ";
    $update_user_query .="user_username = '{$user_username}', ";
    $update_user_query .="user_firstname = '{$user_firstname}', ";
    $update_user_query .="user_lastname = '{$user_lastname}', ";
    $update_user_query .="user_email = '{$user_email}', ";
    $update_user_query .="user_status = '{$user_status}', ";
    $update_user_query .="user_role = '{$user_role}', ";
    $update_user_query .="user_image = '{$file_name_new}' ";
    $update_user_query .="WHERE user_id = {$edit_user_id}";
    
    $run_update_user_query = mysqli_query($conn, $update_user_query);

    if(!$run_update_user_query) {
        die("Error updating user" . mysqli_error($conn));
    }else{ 
        header("Location: users.php?userUpdatedSuccessfully");
    }
}
?>