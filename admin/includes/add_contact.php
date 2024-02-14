<div class="dashboard__item dashboard__item--full">
    <form action="" class="form" method="post" enctype="multipart/form-data">
        <div class="row gap-1">
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Ime</label>
                <input name="contact_firstname" class="form__input" type="text" placeholder="Ime">
            </div>
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Prezime</label>
                <input name="contact_lastname" class="form__input" type="text" placeholder="Prezime">
            </div>
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Broj telefona</label>
                <input name="contact_phone" class="form__input" type="text" placeholder="Telefon">
            </div>
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Email</label>
                <input name="contact_email" class="form__input" type="text" placeholder="Email">
            </div>
        </div>
        <div class="row gap-1">
            <div class="form__group col-3-md col-6-xs">
                <lable class="form__label">Fotografija</lable>
                <input name="contact_image" type="file" class="form__input" placeholder="Foto...">
            </div>
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Cijena</label>
                <input name="contact_pricing" class="form__input" type="text" placeholder="Raspon cijene">
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
                <input name="contact_city" class="form__input" type="text" placeholder="Raspon cijene">
            </div>
        </div>
        <div class="row gap-1 ">
            <div class="form__group col-12-xs">
            <label for="" class="form__label">Detalji</label>
            <textarea name="contact_details" id="" cols="30" rows="10" class="form__textarea" placeholder="Sadržaj"></textarea>
            </div>
        </div>
        <div class="row gap-1 ">
            <div class="form__group">
                <button class="btn btn-success" type="submit" name="add_customer">Dodaj</button>
            </div>
        </div>
    </form>
</div>

<?php 
    if(isset($_POST['add_customer'])) {

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

    $query_add_contact = "INSERT INTO contacts (contact_firstname, contact_lastname, contact_email, contact_phone, contact_image, contact_city, contact_pricing, contact_details, contact_category)
     values ('{$contact_firstname}', '{$contact_lastname}', '{$contact_email}', '{$contact_phone}', '{$file_name_new}', '{$contact_city}', '{$contact_pricing}', '{$contact_details}','{$contact_category}')";

    $run_query_add_contact = mysqli_query($conn, $query_add_contact);

    if(!$run_query_add_contact) {
        die('Error adding new blog post' . mysqli_error($conn));
        }else {
    header("Location: contacts.php?contactAddedSuccessfully");
    }
}
?>