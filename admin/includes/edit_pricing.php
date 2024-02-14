<?php 
if(isset($_GET['id'])){
    $get_pricing_id = $_GET['id'];
    $query_pricing = "SELECT * FROM pricing WHERE pricing_id = $get_pricing_id";
            $run_query_pricing = mysqli_query($conn, $query_pricing);
            while($row = mysqli_fetch_assoc($run_query_pricing)){
                $pricing_id = $row['pricing_id'];
                $pricing_category_id = $row['pricing_category_id'];
                $pricing_title = $row['pricing_title'];
                $pricing_description = $row['pricing_description'];
                $pricing_features = $row['pricing_features'];
                $pricing_price = $row['pricing_price'];

?>
<form action="" class="form" method="post">
    <div class="row gap-1">
    <div class="form__group col-6-md col-6-xs">
        <lable class="form__label">Naziv paketa</lable>
        <input name="pricing_title" type="text" class="form__input" value="<?php echo $pricing_title; ?>">
    </div>
    <div class="form__group col-6-md col-6-xs">
            <label for="" class="form__label">Kategorija</label>
            <select name="pricing_category_id" id="" class="form__select">
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
    </div>
    <div class="row gap-1 ">
        <div class="form__group col-6-md col-6-xs">
            <label for="" class="form__label">Opis, (kratki)</label>
            <input name="pricing_description" type="text" class="form__input" value="<?php echo $pricing_description; ?>">
        </div>
        <div class="form__group col-6-md col-6-xs">
            <label for="" class="form__label">Cijena</label>
            <input name="pricing_price" type="text" class="form__input" value="<?php echo $pricing_price; ?>">
        </div>
    </div>
    <div class="row gap-1 ">
        <div class="form__group col-12-xs">
            <label for="" class="form__label">Features, (koristi ||| za razmak)</label>
            <input name="pricing_features" type="text" class="form__input" value="<?php echo $pricing_features; ?>">
        </div>
    </div>
    <div class="row gap-1 ">
        <div class="form__group">
            <button class="btn btn-success" type="submit" name="update_pricing">Dodaj</button>
        </div>
    </div>
</form>
<?php } }?>
<?php 
if(isset($_POST['update_pricing'])){
    $pricing_title = $_POST['pricing_title'];
    $pricing_category_id = $_POST['pricing_category_id'];
    $pricing_description = $_POST['pricing_description'];
    $pricing_features = $_POST['pricing_features'];
    $pricing_price = $_POST['pricing_price'];

    $query_update_pricing = "UPDATE pricing SET ";
    $query_update_pricing .="pricing_title = '{$pricing_title}', ";
    $query_update_pricing .="pricing_category_id = '{$pricing_category_id}', ";
    $query_update_pricing .="pricing_description = '{$pricing_description}', ";
    $query_update_pricing .="pricing_features = '{$pricing_features}', ";
    $query_update_pricing .="pricing_price = '{$pricing_price}' ";
    $query_update_pricing .="WHERE pricing_id = $get_pricing_id";
    
    $run_query_update_pricing = mysqli_query($conn, $query_update_pricing);

    if(!$run_query_update_pricing) {
        die('Error updating package' . mysqli_error($conn));
    }else {
        header("Location: pricing.php?packageUpdatedSuccessfully");
    }
}

?>