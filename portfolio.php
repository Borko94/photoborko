<?php include('includes/header.php'); ?>
<?php include('includes/navigation.php'); ?>
<!-- <?php include('includes/slideshow.php'); ?> -->

<main class="main">
    <div class="heading-div text-center mt-1 mb-2">
        <h1 class="heading-primary">Portfolio</h1>
    </div>

    <?php
    if(isset($_GET['source'])) {
       $source = $_GET['source'];
    }else {
        $source = '';
    }
       switch($source) {
        case 'portfolio_wedding';
        include "includes/portfolio_wedding.php";
        break;

        case 'portfolio_baptism';
        include "includes/portfolio_baptism.php";
        break;

        case 'portfolio_portrait';
        include "includes/portfolio_portrait.php";
        break;

        case 'portfolio_birthday';
        include "includes/portfolio_birthday.php";
        break;

        default:
        include "includes/view_all_portfolio.php";
        break;

       }
    
    ?> 
    
</main>

    
        

<?php include('includes/info_details.php'); ?>
<?php include('includes/footer.php'); ?>