<?php include('includes/admin_header.php'); ?>
<?php include('includes/admin_sidenav.php'); ?>

<!-- Main content -->
<main class="admin__main">
    <?php
    if(isset($_GET['source'])) {
       $source = $_GET['source'];
    }else {
        $source = '';
    }
       switch($source) {
        case 'add_portfolio_post';
        include "includes/add_portfolio_post.php";
        break;

        case 'edit_portfolio_post';
        include "includes/edit_portfolio_post.php";
        break;

        case 'portfolio_posts_by_author';
        include "includes/portfolio_posts_by_author.php";
        break;

        case 'portfolio_posts_by_category';
        include "includes/portfolio_posts_by_category.php";
        break;

        default:
        include "includes/view_all_portfolio_posts.php";
        break;
       }
    ?>
</main>

<?php include('includes/admin_footer.php'); ?>
        