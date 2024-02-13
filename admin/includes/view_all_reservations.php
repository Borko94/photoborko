<a href="reservations.php?source=add_reservation" class="btn btn-success">Dodaj novu rezervaciju</a>
<table class="table table__wrapper">
    <thead>
        <tr class="table__row">
        <th class="table__head">Musterija</th>
        <th class="table__head">Kategorija</th>
        <th class="table__head">Paket</th>
        <th class="table__head">Datum</th>
        <th class="table__head">Detalji</th>
        <th colspan="2" class="table__head">Akcije</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $select_reservations = "SELECT * FROM reservations ORDER BY reservation_id DESC";
    $run_select_reservations = mysqli_query($conn, $select_reservations);
    while($row = mysqli_fetch_assoc($run_select_reservations)){
        $reservation_id = $row['reservation_id'];
        $reservation_category_id = $row['reservation_category_id'];
        $reservation_customer_id = $row['reservation_customer_id'];
        $reservation_package_id = $row['reservation_package_id'];
        $reservation_contact_id = $row['reservation_contact_id'];
        $reservation_date = $row['reservation_date'];
        $reservation_details = $row['reservation_details'];
    ?>
        <tr class="table__row">
        <td data-label="Kategorija" class="table__data">
            <?php 
            $select_contact = "SELECT * FROM customers WHERE customer_id = '{$reservation_customer_id}'";
            $run_select_contact = mysqli_query($conn, $select_contact);
            while($row = mysqli_fetch_assoc($run_select_contact)) {
                $customer_id = $row['customer_id'];
                $customer_name = $row['customer_firstname'] . " " . $row['customer_lastname'];
            }
            ?>
            <a href="#"><?php echo $customer_name; ?></a>
        </td>
        <td data-label="Kategorija" class="table__data">
            <?php 
            $select_category = "SELECT * FROM portfolio_categories WHERE portfolio_category_id = '{$reservation_category_id}'";
            $run_select_category = mysqli_query($conn, $select_category);
            while($row = mysqli_fetch_assoc($run_select_category)) {
                $cat_id = $row['portfolio_category_id'];
                $cat_name = $row['portfolio_category_name'];
            ?>
            <a href="reservations.php?source=reservations_by_category&id=<?php echo $cat_id; ?>"><?php echo $cat_name; }?></a>
        </td>
        <td data-label="Naslov" class="table__data">
            <?php
            $select_pricing = "SELECT * FROM pricing WHERE pricing_id = '{$reservation_package_id}'";
            $run_select_pricing = mysqli_query($conn, $select_pricing);
            while($row = mysqli_fetch_assoc($run_select_pricing)) {
                $pricing_id = $row['pricing_id'];
                $pricing_title = $row['pricing_title'];
            ?>
            <a href="reservations.php?source=reservations_by_package&id=<?php echo $pricing_id; ?>"><?php echo $pricing_title; }?></a>
        </td>
        <td data-label="Date" class="table__data"><?php echo $reservation_date; ?></td>
        <td data-label="Author" class="table__data"><?php echo $reservation_details; ?></td>
        <td data-label="Edituj" class="table__data">
            <a href="reservations.php?source=edit_reservation&reservation_id=<?php echo $reservation_id; ?>" class="table__link">
            <svg class="table__icon table__icon-edit">
                <use xlink:href="img/sprite.svg#icon-pencil"></use>
            </svg>
            </a>
        </td>
        <td data-label="Obrisi" class="table__data">
            <a href="reservations.php?delete=<?php echo $reservation_id; ?>" class="table__link">
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
if(isset($_GET['delete'])){
    $delete_reservation_id = $_GET['delete'];
    $delete_reservation = "DELETE FROM reservations WHERE reservation_id = '{$delete_reservation_id}'";
    $run_delete_reservation = mysqli_query($conn, $delete_reservation);
    if(!$run_delete_reservation){
        die("Error deleting reservation" . mysqli_error($conn));
    }else {
        header("Location: reservations.php?reservationDeleted");
    }
}
?>