<?php include('includes/admin_header.php'); ?>
<?php include('includes/admin_sidenav.php'); ?>

        

<!-- Main content -->
<!-- Main content -->
<main class="admin__main">
    <?php
    if(isset($_GET['source'])) {
       $source = $_GET['source'];
    }else {
        $source = '';
    }
       switch($source) {
        case 'add_blog_post';
        include "includes/add_blog_post.php";
        break;

        case 'edit_blog_post';
        include "includes/edit_blog_post.php";
        break;

        case 'blog_posts_by_author';
        include "includes/blog_posts_by_author.php";
        break;

        case 'blog_posts_by_category';
        include "includes/blog_posts_by_category.php";
        break;

        default:
        include "includes/view_all_blog_posts.php";
        break;
       }
    ?>
</main>



<?php include('includes/admin_footer.php'); ?>
        