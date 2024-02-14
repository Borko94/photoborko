<div class="dashboard__item dashboard__item--full">
    <div class="">
    <form action="" class="form" method="post" enctype="multipart/form-data">
        <div class="row gap-1">
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Ime</label>
                <input class="form__input" type="text" name="customer_firstname" placeholder="Naslov">
            </div>
            
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Prezime</label>
                <input class="form__input" type="text" name="customer_lastname" placeholder="Podnaslov">
            </div>
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Broj telefona</label>
                <input class="form__input" type="text" name="customer_phone" placeholder="Tags">
            </div>
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Email</label>
                <input class="form__input" type="text" name="customer_email" placeholder="Tags">
            </div>
        </div>
        <div class="form__group">
            
        </div>
        <div class="row gap-1">
            <div class="form__group col-4-md col-12-xs">
                <label class="form__label">Grad</label>
                <input class="form__input" type="text" name="customer_city" class="form__input" placeholder="Tags">
            </div>
            <div class="form__group col-4-md col-12-xs">
                <label for="" class="form__label">Kategorija</label>
                <select name="customer_category_id" id="" class="form__select">
                    <?php
                    $query_cat = "SELECT * FROM portfolio_categories";
                    $run_query_cat = mysqli_query($conn, $query_cat);
                    while($row = mysqli_fetch_assoc($run_query_cat)){
                        $cat_id = $row['portfolio_category_id'];
                        $cat_name = $row['portfolio_category_name'];
                    ?>
                    <option value="<?php echo $cat_id; ?>" class="form__option"><?php echo $cat_name; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form__group col-4-md col-12-xs">
                <label for="" class="form__label">Paket</label>
                <select name="customer_package_id" id="" class="form__select">
                    <?php
                    $query_cat = "SELECT * FROM pricing";
                    $run_query_cat = mysqli_query($conn, $query_cat);
                    while($row = mysqli_fetch_assoc($run_query_cat)){
                        $pricing_id = $row['pricing_id'];
                        $pricing_title = $row['pricing_title'];
                    ?>
                    <option value="<?php echo $pricing_id; ?>" class="form__option"><?php echo $pricing_title; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row gap-1">
            <div class="form__group col-3-md col-6-xs">
                <lable class="form__label">Fotografija</lable>
                <input name="customer_image" type="file" class="form__input" placeholder="Foto...">
            </div>
        </div>
        <div class="row gap-1 ">
            <div class="form__group col-12-xs">
            <label for="" class="form__label">Detalji</label>
            <textarea name="customer_details" id="" cols="30" rows="10" class="form__textarea" placeholder="Detalji"></textarea>
        </div>
    </div>
        <div class="row gap-1 ">
            <div class="form__group">
                <button class="btn btn-success" type="submit" name="add_customer">Dodaj</button>
            </div>
        </div>
    </form>
    </div>
</div>

<?php 
if(isset($_POST['add_customer'])){
    $customer_firstname = $_POST['customer_firstname'];
    $customer_lastname = $_POST['customer_lastname'];
    $customer_phone = $_POST['customer_phone'];
    $customer_email = $_POST['customer_email'];
    $customer_city = $_POST['customer_city'];
    $customer_category_id = $_POST['customer_category_id'];
    $customer_package_id = $_POST['customer_package_id'];
    $customer_details = $_POST['customer_details'];

    $file_name = $_FILES['customer_image']['name'];
    $file_tmp_name = $_FILES['customer_image']['tmp_name'];
    $file_size = $_FILES['customer_image']['size'];
    $file_error = $_FILES['customer_image']['error'];
    $file_type = $_FILES['customer_image']['type'];

    $file_ext = explode('.', $file_name);
    $file_actual_ext = strtolower(end($file_ext));

    $allowed = array('jpg', 'jpeg', 'gif', 'png', 'pdf');

    $file_name_new = uniqid('',true).".".$file_actual_ext;
    $file_destination = '../uploads/blog-images/'.$file_name_new;
    move_uploaded_file($file_tmp_name, $file_destination);

    $query_insert_customer = "INSERT INTO customers (customer_firstname, customer_lastname, customer_phone, customer_email, customer_city, customer_category_id, customer_package_id, customer_details, customer_image) values ('{$customer_firstname}', '{$customer_lastname}', '{$customer_phone}', '{$customer_email}', '{$customer_city}', '{$customer_category_id}', '{$customer_package_id}', '{$customer_details}', '{$file_name_new}')";
    $run_query_insert_customer = mysqli_query($conn, $query_insert_customer);

    if(!$run_query_insert_customer) {
        die('Error adding new customer' . mysqli_error($conn));
    }else {
        header("Location: customers.php?customerAddedSuccessfully");
    }
}

?>