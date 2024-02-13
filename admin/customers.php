<?php include('includes/admin_header.php'); ?>
<?php include('includes/admin_sidenav.php'); ?>

        

<!-- Main content -->
<main class="admin__main">
    <h2 class="mb-2">Musterije</h2>
    <?php
    if(isset($_GET['source'])) {
       $source = $_GET['source'];
    }else {
        $source = '';
    }
       switch($source) {
        case 'add_customer';
        include "includes/add_customer.php";
        break;

        case 'edit_customer';
        include "includes/edit_customer.php";
        break;

        default:
        include "includes/view_all_customers.php";
        break;
       }
    ?>
    
</main>



<?php include('includes/admin_footer.php'); ?>
        