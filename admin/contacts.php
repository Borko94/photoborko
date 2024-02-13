<?php include('includes/admin_header.php'); ?>
<?php include('includes/admin_sidenav.php'); ?>

        

<!-- Main content -->
<main class="admin__main">
    <h2 class="mb-2">Kontakti</h2>
    <a href="contacts.php?source=add_contact" class="btn btn-success">Dodaj novi kontakt</a>
    <?php
    if(isset($_GET['source'])) {
       $source = $_GET['source'];
    }else {
        $source = '';
    }
       switch($source) {
        case 'add_contact';
        include "includes/add_contact.php";
        break;

        case 'edit_contact';
        include "includes/edit_contact.php";
        break;

        default:
        include "includes/view_all_contacts.php";
        break;
       }
    ?>
    
</main>



<?php include('includes/admin_footer.php'); ?>
        