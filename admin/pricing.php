<?php include('includes/admin_header.php'); ?>
<?php include('includes/admin_sidenav.php'); ?>

        

<!-- Main content -->
<main class="admin__main">
    <h2 class="mb-2">Paketi</h2>
    <?php
    if(isset($_GET['source'])) {
       $source = $_GET['source'];
    }else {
        $source = '';
    }
       switch($source) {
        case 'add_pricing';
        include "includes/add_pricing.php";
        break;

        case 'edit_pricing';
        include "includes/edit_pricing.php";
        break;

        default:
        include "includes/view_all_pricing.php";
        break;
       }
    ?>
    
</main>



<?php include('includes/admin_footer.php'); ?>
        