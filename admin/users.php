<?php include('includes/admin_header.php'); ?>
<?php include('includes/admin_sidenav.php'); ?>

        

<!-- Main content -->
<main class="admin__main">
    <h2 class="mb-2">Korisnici</h2>
    <?php
    if(isset($_GET['source'])) {
       $source = $_GET['source'];
    }else {
        $source = '';
    }
       switch($source) {
        case 'add_user';
        include "includes/add_user.php";
        break;

        case 'edit_user';
        include "includes/edit_user.php";
        break;

        default:
        include "includes/view_all_users.php";
        break;
       }
    ?>
    
</main>



<?php include('includes/admin_footer.php'); ?>
        