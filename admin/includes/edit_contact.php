<?php
if(isset($_GET['id'])){
    $get_contact_id = $_GET['id'];
    $query_pricing = "SELECT * FROM contacts WHERE contact_id = $get_contact_id";
    $run_query_pricing = mysqli_query($conn, $query_pricing);
    while($row = mysqli_fetch_assoc($run_query_pricing)){
        $contact_id = $row['contact_id'];
        $contact_firstname = $row['contact_firstname'];
        $contact_lastname = $row['contact_lastname'];
        $contact_email = $row['contact_email'];
        $contact_phone = $row['contact_phone'];
        $contact_city = $row['contact_city'];
        $contact_pricing = $row['contact_pricing'];
        $contact_image = $row['contact_image'];
        $contact_details = $row['contact_details'];
        $contact_category = $row['contact_category'];

?>

<div class="dashboard__item dashboard__item--full">
    <form action="" class="form" method="post" enctype="multipart/form-data">
        <div class="row gap-1">
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Ime</label>
                <input name="contact_firstname" class="form__input" type="text" value="<?php echo $contact_firstname; ?>">
            </div>
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Prezime</label>
                <input name="contact_lastname" class="form__input" type="text" value="<?php echo $contact_lastname; ?>">
            </div>
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Broj telefona</label>
                <input name="contact_phone" class="form__input" type="text" value="<?php echo $contact_phone; ?>">
            </div>
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Email</label>
                <input name="contact_email" class="form__input" type="text" value="<?php echo $contact_email; ?>">
            </div>
        </div>
        <div class="row gap-1">
            <div class="form__group col-3-md col-6-xs">
                <img width="100px" src="../uploads/blog-images/<?php echo $contact_image; ?>" alt="" class="form__img">
                <lable class="form__label">Fotografija</lable>
                <input name="contact_image" type="file" class="form__input" placeholder="Foto...">
            </div>
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Cijena</label>
                <input name="contact_pricing" class="form__input" type="text" value="<?php echo $contact_pricing; ?>">
            </div>
            <div class="form__group col-3-md col-6-xs">
                <label for="" class="form__label">Kategorija</label>
                <select name="contact_category" id="" class="form__select">
                    <option value="1" class="form__option">Foto</option>
                    <option value="2" class="form__option">Video</option>
                    <option value="3" class="form__option">Foto + Video</option>
                </select>
            </div>
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Grad</label>
                <input name="contact_city" class="form__input" type="text" value="<?php echo $contact_city; ?>">
            </div>
        </div>
        <div class="row gap-1 ">
            <div class="form__group col-12-xs">
            <label for="" class="form__label">Detalji</label>
            <textarea name="contact_details" id="" cols="30" rows="10" class="form__textarea" placeholder="Sadržaj"><?php echo $contact_details; ?></textarea>
            </div>
        </div>
        <div class="row gap-1 ">
            <div class="form__group">
                <button class="btn btn-success" type="submit" name="update_customer">Dodaj</button>
            </div>
        </div>
    </form>
    <?php } }?>
</div>

<?php 
    if(isset($_POST['update_customer'])) {

    $contact_firstname = $_POST['contact_firstname'];
    $contact_lastname = $_POST['contact_lastname'];
    $contact_email = $_POST['contact_email'];
    $contact_phone = $_POST['contact_phone'];
    $contact_city = $_POST['contact_city'];
    $contact_pricing = $_POST['contact_pricing'];
    $contact_details = $_POST['contact_details'];
    $contact_category = $_POST['contact_category'];

    $file_name = $_FILES['contact_image']['name'];
    $file_tmp_name = $_FILES['contact_image']['tmp_name'];
    $file_size = $_FILES['contact_image']['size'];
    $file_error = $_FILES['contact_image']['error'];
    $file_type = $_FILES['contact_image']['type'];

    $file_ext = explode('.', $file_name);
    $file_actual_ext = strtolower(end($file_ext));

    $allowed = array('jpg', 'jpeg', 'gif', 'png', 'pdf');

    $file_name_new = uniqid('',true).".".$file_actual_ext;
    $file_destination = '../uploads/blog-images/'.$file_name_new;
    move_uploaded_file($file_tmp_name, $file_destination);

    if(empty($file_name)) {
        $query_select_contact_image = "SELECT * FROM contacts WHERE contact_id = {$get_contact_id}";
        $run_query_select_contact_image = mysqli_query($conn, $query_select_contact_image);
        while($row = mysqli_fetch_array($run_query_select_contact_image)){
            $file_name_new = $row['contact_image'];
        }
    }

    $query_update_contact = "UPDATE contacts SET ";
    $query_update_contact .="contact_firstname = '{$contact_firstname}', ";
    $query_update_contact .="contact_lastname = '{$contact_lastname}', ";
    $query_update_contact .="contact_phone = '{$contact_phone}', ";
    $query_update_contact .="contact_email = '{$contact_email}', ";
    $query_update_contact .="contact_city = '{$contact_city}', ";
    $query_update_contact .="contact_category = '{$contact_category}', ";
    $query_update_contact .="contact_pricing = '{$contact_pricing}', ";
    $query_update_contact .="contact_image = '{$file_name_new}', ";
    $query_update_contact .="contact_details = '{$contact_details}' ";
    $query_update_contact .="WHERE contact_id = $get_contact_id";
    
    
    $run_query_update_contact = mysqli_query($conn, $query_update_contact);

    if(!$run_query_update_contact) {
        die('Error adding updating contact' . mysqli_error($conn));
    }else {
        header("Location: contacts.php?contactUpdatedSuccessfully");
    }
}
?>