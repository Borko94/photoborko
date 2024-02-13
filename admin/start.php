<?php include('includes/admin_header.php'); ?>
<?php include('includes/admin_sidenav.php'); ?>

        

<!-- Main content -->
<main class="admin__main">
    <h2 class="mb-2">Kalendar</h2>
    <?php
    if(isset($_GET['source'])) {
       $source = $_GET['source'];
    }else {
        $source = '';
    }
       switch($source) {
        case 'add_reservation';
        include "includes/add_reservation.php";
        break;

        case 'edit_reservation';
        include "includes/edit_reservation.php";
        break;

        default:
        include "includes/view_all_reservations.php";
        break;
       }
    ?>
    
</main>



<?php include('includes/admin_footer.php'); ?>
        