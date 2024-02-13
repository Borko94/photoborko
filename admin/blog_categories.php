<?php include('includes/admin_header.php'); ?>
<?php include('includes/admin_sidenav.php'); ?>

<!-- Main content -->
<main class="admin__main">
    <h3 class="mb-2">blog kategorije</h3>
    <div class="container">
        <div class="row ">
            <div class="col-6-md col-12-xs">
                <form action="" method="post" class="form">
                    <div class="form__group col-8-md col-6-xs">
                        <label class="form__label">Dodaj novu kategoriju</label>
                        <input name="cat_title" class="form__input" type="text" placeholder="Naziv">
                    </div>
                    <div class="row gap-1 ">
                        <div class="form__group">
                            <button class="btn btn-success" type="submit" name="add_category">Dodaj</button>
                        </div>
                    </div>
                </form>
                <?php
                if(isset($_GET['edit'])) {
                    $edit_cat_id = $_GET['edit'];
                    $select_cat = "SELECT * FROM blog_categories WHERE blog_category_id = '{$edit_cat_id}'";
                    $run_select_cat = mysqli_query($conn,$select_cat);

                    if(!$run_select_cat){
                        die("Error selecting category" . mysqli_error($conn));
                    }else {
                        while($row = mysqli_fetch_assoc($run_select_cat)) {
                            $cat_title = $row['blog_category_name'];

                ?>
                <form action="" method="post" class="form mt-3">
                    <div class="form__group col-8-md col-6-xs">
                        <label class="form__label">Ažuriraj kategoriju</label>
                        <input name="cat_title_new" class="form__input" type="text" value="<?php echo $cat_title; ?>">
                    </div>
                    <div class="row gap-1 ">
                        <div class="form__group">
                            <button class="btn btn-success" type="submit" name="update_category">Ažuriraj</button>
                        </div>
                    </div>
                </form>
                <?php  
                    }
                }
                if(isset($_POST['update_category'])) {
                    $cat_title_new = $_POST['cat_title_new'];
                
                    $update_category_query = "UPDATE blog_categories SET blog_category_name = '{$cat_title_new}' WHERE blog_category_id = '$edit_cat_id'";
                    $run_update_category_query = mysqli_query($conn, $update_category_query);
                
                    if(!$run_update_category_query) {
                        die("Error updating category: " . mysqli_error($conn));
                    }else {
                        header("Location: blog_categories.php?categoryUpdatedSuccessfully");
                    }
                }
            }
            ?>
            </div>
            <div class="col-6-md col-12-xs mt-1">
                <table class="table table__wrapper">
                    <thead>
                        <tr class="table__row">
                        <th class="table__head">ID</th>
                        <th class="table__head">Naziv</th>
                        
                        <th colspan="2" class="table__head">Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $select_categories = "SELECT * FROM blog_categories";
                        $run_select_categories = mysqli_query($conn, $select_categories);
                        while($row = mysqli_fetch_assoc($run_select_categories )){
                            $cat_id = $row['blog_category_id'];
                            $cat_title = $row['blog_category_name'];
                        
                        ?>
                        <tr class="table__row">
                            <td data-label="ID" class="table__data"><?php echo $cat_id; ?></td>
                            <td data-label="ID" class="table__data"><?php echo $cat_title; ?></td>
                            <td data-label="Edituj" class="table__data">
                                <a href="blog_categories.php?edit=<?php echo $cat_id; ?>" class="table__link">
                                <svg class="table__icon table__icon-edit">
                                    <use xlink:href="img/sprite.svg#icon-pencil"></use>
                                </svg>
                                </a>
                            </td>
                            <td data-label="Obrisi" class="table__data">
                                <a href="blog_categories.php?delete=<?php echo $cat_id; ?>" class="table__link">
                                <svg class="table__icon table__icon-trash">
                                    <use xlink:href="img/sprite.svg#icon-bin"></use>
                                </svg>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>



<?php include('includes/admin_footer.php'); ?>


<?php
if(isset($_POST['add_category'])) {
    $cat_title = $_POST['cat_title'];

    $query = "INSERT INTO blog_categories (blog_category_name, blog_category_date) VALUES ('{$cat_title}', now())";
    $run_query = mysqli_query($conn, $query);

    if(!$run_query){
        echo "error inserting data into database";
    }else {
        header("Location: blog_categories.php?newCategoryAdded");
    }
}
?>

<?php 
if(isset($_GET['delete'])) {
    $delete_cat_id = $_GET['delete'];
    
    $delete_cat_query = "DELETE FROM blog_categories WHERE blog_category_id = '{$delete_cat_id}'";
    $run_delete_cat_query = mysqli_query($conn, $delete_cat_query);

    if(!$run_delete_cat_query) {
        die("Error deleting from blog categories" . mysqli_error($conn));
    }else {
        header("Location: blog_categories.php?deletedCategorySuccessfully");
    }
}
?>

<?php 

?>