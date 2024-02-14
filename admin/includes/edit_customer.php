<?php 
if(isset($_GET['id'])){
    $get_customer_id = $_GET['id'];
    $query_pricing = "SELECT * FROM customers WHERE customer_id = $get_customer_id";
            $run_query_pricing = mysqli_query($conn, $query_pricing);
            while($row = mysqli_fetch_assoc($run_query_pricing)){
                $customer_firstname = $row['customer_firstname'];
                $customer_lastname = $row['customer_lastname'];
                $customer_email = $row['customer_email'];
                $customer_phone = $row['customer_phone'];
                $customer_city = $row['customer_city'];
                $customer_zip = $row['customer_zip'];
                $customer_street = $row['customer_street'];
                $customer_category_id = $row['customer_category_id'];
                $customer_package_id = $row['customer_package_id'];
                $customer_details = $row['customer_details'];
                $customer_image = $row['customer_image'];

?>

<div class="dashboard__item dashboard__item--full">
    <div class="">
    <form action="" class="form" method="post" enctype="multipart/form-data">
        <div class="row gap-1">
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Ime</label>
                <input class="form__input" type="text" name="customer_firstname" value="<?php echo $customer_firstname; ?>">
            </div>
            
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Prezime</label>
                <input class="form__input" type="text" name="customer_lastname" value="<?php echo $customer_lastname; ?>">
            </div>
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Broj telefona</label>
                <input class="form__input" type="text" name="customer_phone" value="<?php echo $customer_phone; ?>">
            </div>
            <div class="form__group col-3-md col-6-xs">
                <label class="form__label">Email</label>
                <input class="form__input" type="text" name="customer_email" value="<?php echo $customer_email; ?>">
            </div>
        </div>
        <div class="form__group">
            
        </div>
        <div class="row gap-1">
            <div class="form__group col-4-md col-12-xs">
                <label class="form__label">Grad</label>
                <input class="form__input" type="text" name="customer_city" class="form__input" value="<?php echo $customer_city; ?>">
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
        <div class="row gap-1 ">
            <div class="form__group col-3-md col-12-xs">
                <img width="100px" src="../uploads/blog-images/<?php echo $customer_image; ?>" alt="" class="form__img">
                <lable class="form__label">Fotografija</lable>
                <input name="customer_image" type="file" class="form__input" placeholder="Foto...">
            </div>
            <div class="form__group col-12-md col-12-xs">
                <label for="" class="form__label">Detalji</label>
                <textarea name="customer_details" id="" cols="30" rows="10" class="form__textarea" placeholder="Detalji"><?php echo $customer_details; ?></textarea>
            </div>
    </div>
        <div class="row gap-1 ">
            <div class="form__group">
                <button class="btn btn-success" type="submit" name="update_customer">Ažuriraj</button>
            </div>
        </div>
    </form>
    </div>
</div>
<?php } } ?>
<?php 
if(isset($_POST['update_customer'])){
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

    if(empty($file_name)) {
        $query_select_customer_image = "SELECT * FROM customers WHERE customer_id = {$get_customer_id}";
        $run_query_select_customer_image = mysqli_query($conn, $query_select_customer_image);
        while($row = mysqli_fetch_array($run_query_select_customer_image)){
            $file_name_new = $row['customer_image'];
        }
    }

    $query_update_customer = "UPDATE customers SET ";
    $query_update_customer .="customer_firstname = '{$customer_firstname}', ";
    $query_update_customer .="customer_lastname = '{$customer_lastname}', ";
    $query_update_customer .="customer_phone = '{$customer_phone}', ";
    $query_update_customer .="customer_email = '{$customer_email}', ";
    $query_update_customer .="customer_city = '{$customer_city}', ";
    $query_update_customer .="customer_category_id = '{$customer_category_id}', ";
    $query_update_customer .="customer_package_id = '{$customer_package_id}', ";
    $query_update_customer .="customer_details = '{$customer_details}', ";
    $query_update_customer .="customer_image = '{$file_name_new}' ";
    $query_update_customer .="WHERE customer_id = $get_customer_id";
    
    
    $run_query_update_customer = mysqli_query($conn, $query_update_customer);

    if(!$run_query_update_customer) {
        die('Error adding updating customer' . mysqli_error($conn));
    }else {
        header("Location: customers.php?customerUpdatedSuccessfully");
    }
}

?>