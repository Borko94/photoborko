<a href="users.php?source=add_user" class="btn btn-success">Dodaj novog <br> korisnika</a>
<table class="table table__wrapper">
    <thead>
        <tr class="table__row">
        <th class="table__head">ID</th>
        <th class="table__head">Username</th>
        <th class="table__head">First and Last name</th>
        <th class="table__head">email</th>
        <th class="table__head">Posts</th>
        <th class="table__head">ROle</th>
        <th class="table__head">status</th>
        <th colspan="2" class="table__head">Akcije</th>
        </tr>
    </thead>
    <tbody>
    <?php 
        $select_users = "SELECT * FROM users";
        $run_select_users = mysqli_query($conn, $select_users);
        while($row = mysqli_fetch_assoc($run_select_users )){
            $user_id = $row['user_id'];
            $user_username = $row['user_username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_post_count = $row['user_post_count'];
            $user_status = $row['user_status'];
            $user_role = $row['user_role'];
        
        ?>
        <tr class="table__row">
            <td data-label="ID" class="table__data"><?php echo $user_id; ?></td>
            <td data-label="Korisnicko ime" class="table__data"><?php echo $user_username; ?></td>
            <td data-label="Ime i Prezime" class="table__data"><?php echo $user_firstname . " " . $user_lastname; ?></td>
            <td data-label="Email" class="table__data"><?php echo $user_email; ?></td>
            <td data-label="Članci" class="table__data"><?php echo $user_post_count; ?></td>
            <td data-label="Role" class="table__data"><?php echo $user_role; ?></td>
            <td data-label="Status" class="table__data"><?php echo $user_status; ?></td>
            <td data-label="Edituj" class="table__data">
                <a href="users.php?source=edit_user&u_id=<?php echo $user_id; ?>" class="table__link">
                <svg class="table__icon table__icon-edit">
                    <use xlink:href="img/sprite.svg#icon-pencil"></use>
                </svg>
                </a>
            </td>
            <td data-label="Obrisi" class="table__data">
                <a href="users.php?delete_user=<?php echo $user_id; ?>" class="table__link">
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
if(isset($_GET['delete_user'])) {
    $delete_user_id = $_GET['delete_user'];

    $delete_user_query = "DELETE FROM users WHERE user_id = '{$delete_user_id}'";
    $run_delete_user_query = mysqli_query($conn, $delete_user_query);

    if(!$run_delete_user_query) {
        die("Error deleting user" . mysqli_error($conn));
    }else {
        header("Location: users.php?userDeletedSuccsfully");
    }
}
?>