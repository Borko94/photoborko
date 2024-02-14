<a href="customers.php?source=add_customer" class="btn btn-success">Dodaj novu musteriju</a>
<table class="table table__wrapper">
    <thead>
        <tr class="table__row">
        <th class="table__head">ID</th>
        <th class="table__head">Ime i Prezime</th>
        <th class="table__head">Telefon</th>
        <th class="table__head">Email</th>
        <th class="table__head">Grad</th>
        <th class="table__head">Detalji</th>
        <th colspan="2" class="table__head">Akcije</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query_pricing = "SELECT * FROM customers";
            $run_query_pricing = mysqli_query($conn, $query_pricing);
            while($row = mysqli_fetch_assoc($run_query_pricing)){
                $customer_id = $row['customer_id'];
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
        <tr class="table__row">
            <td data-label="ID" class="table__data"><?php echo $customer_id; ?></td>
            <td data-label="Ime i prezime" class="table__data"><?php echo $customer_firstname . " " . $customer_lastname; ?></td>
            <td data-label="Telefon" class="table__data"><?php echo $customer_phone; ?></td>
            <td data-label="Email" class="table__data"><?php echo $customer_email; ?></td>
            <td data-label="Grad" class="table__data"><?php echo $customer_city; ?></td>
            <td data-label="Author" class="table__data"><?php echo $customer_details; ?></td>
            <td data-label="Edituj" class="table__data">
                <a href="customers.php?source=edit_customer&id=<?php echo $customer_id; ?>" class="table__link">
                <svg class="table__icon table__icon-edit">
                    <use xlink:href="img/sprite.svg#icon-pencil"></use>
                </svg>
                </a>
            </td>
            <td data-label="Obrisi" class="table__data">
                <a href="customers.php?delete=<?php echo $customer_id; ?>" class="table__link">
                <svg class="table__icon table__icon-trash">
                    <use xlink:href="img/sprite.svg#icon-bin"></use>
                </svg>
                </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
    </table>

<?php
if(isset($_GET['delete'])) {
    $delete_customer_id = $_GET['delete'];
    $query_delete_customer = "DELETE FROM customers WHERE customer_id = $delete_customer_id";
    $run_query_delete_customer = mysqli_query($conn, $query_delete_customer);

    if(!$run_query_delete_customer){
        echo "Error deleting package!";
    }else {
        header("Location: customers.php?deletedCustomer");
    }
}
?>