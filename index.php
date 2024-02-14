<?php include('includes/header.php'); ?>
<?php include('includes/navigation.php'); ?>
<?php include('includes/slideshow.php'); ?>
    
    
    <main class="main">
        <section class="heading text-center">
            <h1 class="heading-primary text-italic mt-4">Ja sam Borko, fotograf iz Kotor Varoša specijalizovan za vjenčanja, krštenja, rođendane</h1>
            <p class="heading-text mt-2 mb-4">Zabilježiću energiju i emociju Vašeg vjenčanja, rođendana ili proslave i obraditi fotografije tako, da ostanu autentične i dosljedne Vama, ali uz prisustvo našeg stila i kreativne slobode. Najljepše fotografije su one za koje niste ni znali da su načinjene.</p>
        </section>

        <section class="heading text-center">
            <h2 class="heading-primary"><a href="portfolio.php">Usluge</a></h2>
        </section>

        <section class="main-portfolio">
            <div class="main-portfolio__item">
            <a href="portfolio.php?source=portfolio_wedding"><img src="uploads/portfolio-images/65109339cb0685.83916036.jpg" alt="" class="main-portfolio__image"></a>
                <!-- <p class="main-portfolio__subtitle">Some more text</p> -->
                <h1 class="main-portfolio__title"><a href="portfolio.php?source=portfolio_wedding">Vjenčanja</a></h1>
            </div>
            <div class="main-portfolio__item">
            <a href="portfolio.php?source=portfolio_baptism"><img src="uploads/portfolio-images/krstenje.jpg" alt="" class="main-portfolio__image"></a>
                <!-- <p class="main-portfolio__subtitle">Some more text</p> -->
                <h1 class="main-portfolio__title"><a href="portfolio.php?source=portfolio_baptism">Krštenja</a></h1>
            </div>
            <div class="main-portfolio__item">
            <a href="portfolio.php?source=portfolio_birthday"><img src="uploads/portfolio-images/6510a8b3b29b56.85126355.jpg" alt="" class="main-portfolio__image"></a>
                <!-- <p class="main-portfolio__subtitle">Some more text</p> -->
                <h1 class="main-portfolio__title"><a href="portfolio.php?source=portfolio_portrait">Rođendani</a></h1>
            </div>
        </section>

        <section class="videoAdd">
           <video class="videoAdd__video" autoplay muted loop controls>
                <source src="uploads/video/DiD.mp4" type="video/mp4" codecs="avc1.42E01E, mp4a.40.2">
            </video> 
            <script>
                document.getElementById('vid').play();
            </script>
        </section>
        
        <?php include('includes/blog_cards.php'); ?>
    </main>

    
        

<?php include('includes/info_details.php'); ?>
<?php include('includes/footer.php'); ?>