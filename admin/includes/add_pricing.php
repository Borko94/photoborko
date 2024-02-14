<form action="" class="form" method="post">
    <div class="row gap-1">
    <div class="form__group col-6-md col-6-xs">
        <lable class="form__label">Naziv paketa</lable>
        <input name="pricing_title" type="text" class="form__input" placeholder="Naziv paketa">
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
            <input name="pricing_description" type="text" class="form__input" placeholder="Opis">
        </div>
        <div class="form__group col-6-md col-6-xs">
            <label for="" class="form__label">Cijena</label>
            <input name="pricing_price" type="text" class="form__input" placeholder="Cijena">
        </div>
    </div>
    <div class="row gap-1 ">
        <div class="form__group col-12-xs">
            <label for="" class="form__label">Features, (koristi ||| za razmak)</label>
            <input name="pricing_features" type="text" class="form__input" placeholder="Detalji">
        </div>
    </div>
    <div class="row gap-1 ">
        <div class="form__group">
            <button class="btn btn-success" type="submit" name="add_pricing">Dodaj</button>
        </div>
    </div>
</form>

<?php 
if(isset($_POST['add_pricing'])){
    $pricing_title = $_POST['pricing_title'];
    $pricing_category_id = $_POST['pricing_category_id'];
    $pricing_description = $_POST['pricing_description'];
    $pricing_features = $_POST['pricing_features'];
    $pricing_price = $_POST['pricing_price'];

    $query_insert_pricing = "INSERT INTO pricing (pricing_title, pricing_category_id, pricing_description,pricing_features, pricing_price) values ('{$pricing_title}', '{$pricing_category_id}', '{$pricing_description}', '{$pricing_features}', '{$pricing_price}')";
    $run_query_insert_pricing = mysqli_query($conn, $query_insert_pricing);

    if(!$run_query_insert_pricing) {
        die('Error adding new package' . mysqli_error($conn));
    }else {
        header("Location: pricing.php?packageAddedSuccessfully");
    }
}

?>