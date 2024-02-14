<a href="contacts.php?source=add_contact" class="btn btn-success">Dodaj novi kontakt</a>
<br><br>
<table class="table table__wrapper">
    <thead>
        <tr class="table__row">
        <th class="table__head">ID</th>
        <th class="table__head">Ime i Prezime</th>
        <th class="table__head">Telefon</th>
        <th class="table__head">Email</th>
        <th class="table__head">Grad</th>
        <th class="table__head">Cijena</th>
        <th class="table__head">Kategorija</th>
        <th class="table__head">Detalji</th>
        <th colspan="2" class="table__head">Akcije</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query_pricing = "SELECT * FROM contacts";
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
        <tr class="table__row">
        <td data-label="ID" class="table__data"><?php echo $contact_id; ?></td>
        <td data-label="ID" class="table__data"><?php echo $contact_firstname . " " . $contact_lastname; ?></td>
        <td data-label="Naslov" class="table__data"><?php echo $contact_phone; ?></td>
        <td data-label="Date" class="table__data"><?php echo $contact_email; ?></td>
        <td data-label="Author" class="table__data"><?php echo $contact_city; ?></td>
        <td data-label="Author" class="table__data"><?php echo $contact_pricing; ?></td>
        <td data-label="Author" class="table__data"><?php echo $contact_category; ?></td>
        <td data-label="Author" class="table__data"><?php echo $contact_details; ?></td>
        <td data-label="Edituj" class="table__data">
            <a href="contacts.php?source=edit_contact&id=<?php echo $contact_id; ?>" class="table__link">
            <svg class="table__icon table__icon-edit">
                <use xlink:href="img/sprite.svg#icon-pencil"></use>
            </svg>
            </a>
        </td>
        <td data-label="Obrisi" class="table__data">
            <a href="contacts.php?delete=<?php echo $contact_id; ?>" class="table__link">
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
    $delete_contact_id = $_GET['delete'];
    $query_delete_contact = "DELETE FROM contacts WHERE contact_id = $delete_contact_id";
    $run_query_delete_contact = mysqli_query($conn, $query_delete_contact);

    if(!$run_query_delete_contact){
        echo "Error deleting package!";
    }else {
        header("Location: contacts.php?deletedContact");
    }
}
?>