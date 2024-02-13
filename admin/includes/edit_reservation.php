<?php
$edit_reservation_id = $_GET['reservation_id'];
$select_reservations = "SELECT * FROM reservations WHERE reservation_id = '{$edit_reservation_id}'";
$run_select_reservations = mysqli_query($conn, $select_reservations);
while($row = mysqli_fetch_assoc($run_select_reservations)){
    $reservation_id = $row['reservation_id'];
    $reservation_category_id = $row['reservation_category_id'];
    $reservation_customer_id = $row['reservation_customer_id'];
    $reservation_package_id = $row['reservation_package_id'];
    $reservation_date = $row['reservation_date'];
    $reservation_details = $row['reservation_details'];
?>

<form action="" class="form" method="post">
    <div class="row gap-1">
        <div class="form__group col-6-md col-6-xs">
            <lable class="form__label">Datum</lable>
            <input name="reservation_date" type="date" class="form__input" value="<?php echo $reservation_date; ?>">
        </div>
        <div class="form__group col-6-md col-6-xs">
            <label for="" class="form__label">Paket</label>
            <select name="reservation_package_id" id="" class="form__select">
                <?php 
                $select_pricing = "SELECT * FROM pricing ORDER BY pricing_id DESC";
                $run_select_pricing = mysqli_query($conn, $select_pricing);
                while($row = mysqli_fetch_assoc($run_select_pricing )){
                    $pricing_id = $row['pricing_id'];
                    $pricing_title = $row['pricing_title'];
                
                ?>
                <option value="<?php echo $pricing_id; ?>" class="form__option"><?php echo $pricing_title; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row gap-1">
        <div class="form__group col-6-md col-12-xs">
            <label for="" class="form__label">Kategorija</label>
            <select name="reservation_category_id" id="" class="form__select">
                <?php 
                $select_categories = "SELECT * FROM portfolio_categories";
                $run_select_categories = mysqli_query($conn, $select_categories);
                while($row = mysqli_fetch_assoc($run_select_categories )){
                    $cat_id = $row['portfolio_category_id'];
                    $cat_title = $row['portfolio_category_name'];
                
                ?>
                <option value="<?php echo $cat_id; ?>" class="form__option"><?php echo $cat_title; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form__group col-6-md col-12-xs">
            <label for="" class="form__label">Musterija</label>
            <select name="reservation_customer_id" id="" class="form__select">
                <?php 
                $select_customer = "SELECT * FROM customers ORDER BY customer_id DESC";
                $run_select_customer = mysqli_query($conn, $select_customer);
                while($row = mysqli_fetch_assoc($run_select_customer )){
                    $customer_id = $row['customer_id'];
                    $customer_name = $row['customer_firstname'] . " " . $row['customer_lastname'];
                
                ?>
                <option value="<?php echo $customer_id; ?>" class="form__option"><?php echo $customer_name; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row gap-1 ">
        <div class="form__group col-12-xs">
        <label for="" class="form__label">Detalji</label>
        <textarea name="reservation_details" id="" cols="30" rows="10" class="form__textarea" placeholder="Sadržaj"><?php echo $reservation_details; ?></textarea>
        </div>
    </div>
    <div class="row gap-1 ">
        <div class="form__group">
            <button class="btn btn-success" type="submit" name="edit_reservation">Ažuriraj</button>
        </div>
    </div>
</form>


<?php } ?>

<?php
if(isset($_POST['edit_reservation'])){
    $reservation_category_id = $_POST['reservation_category_id'];
    $reservation_customer_id = $_POST['reservation_customer_id'];
    $reservation_package_id = $_POST['reservation_package_id'];
    $reservation_date = $_POST['reservation_date'];
    $reservation_details = $_POST['reservation_details'];

    $update_reservation_query = "UPDATE reservations SET ";
    $update_reservation_query .="reservation_category_id = {$reservation_category_id}, ";
    $update_reservation_query .="reservation_customer_id = {$reservation_customer_id}, ";
    $update_reservation_query .="reservation_package_id = {$reservation_package_id}, ";
    $update_reservation_query .="reservation_date = '{$reservation_date}', ";
    $update_reservation_query .="reservation_details = '{$reservation_details}' ";
    $update_reservation_query .="WHERE reservation_id = {$edit_reservation_id}";

    $run_update_reservation_query = mysqli_query($conn, $update_reservation_query);

    if(!$run_update_reservation_query){
        die("Error adding customer " . mysqli_error($conn));
    }else {
        header("Location: reservations.php?reservationUpdatedSuccessfully");
    }
}
?>