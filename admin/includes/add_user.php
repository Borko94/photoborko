<div class="dashboard__item dashboard__item--full">
    <div class="">
    <form action="" method="post" enctype="multipart/form-data" class="form">
        <div class="row gap-1">
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Ime</label>
                <input name="user_firstname" class="form__input" type="text" placeholder="Ime">
            </div>
            
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Prezime</label>
                <input name="user_lastname" class="form__input" type="text" placeholder="Prezime">
            </div>
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Korisnicko ime</label>
                <input name="user_username" class="form__input" type="text" placeholder="Korisnicko ime">
            </div>
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Email</label>
                <input name="user_email" class="form__input" type="email" placeholder="Email">
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
                    <option value="admin" class="form__option">Admin</option>
                    <option value="moderator" class="form__option">Moderator</option>
                    <option value="User" class="form__option">User</option>
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
                <button class="btn btn-success" type="submit" name="add_user">Dodaj</button>
            </div>
        </div>
    </form>
    </div>
</div>

<?php
if(isset($_POST['add_user'])){
    $user_id = $_POST['user_id'];
    $user_username = $_POST['user_username'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_status = $_POST['user_status'];
    $user_role = $_POST['user_role'];
    $user_password = $_POST['user_password'];

    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

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

    $add_user_query = "INSERT INTO users (user_username, user_firstname, user_lastname, user_email, user_image, user_status, user_role, user_password) VALUES ('{$user_username}', '{$user_firstname}', '{$user_lastname}', '{$user_email}','{$file_name_new}', '{$user_status}', '{$user_role}', '{$user_password}')";
    $run_add_user_query = mysqli_query($conn, $add_user_query);
    if(!$run_add_user_query) {
        die('Error adding new user' . mysqli_error($conn));
    }else {
        header('Location: users.php?userAddedSuccessfully');
    }
}
?>