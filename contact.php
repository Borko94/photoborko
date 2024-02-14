<?php include('includes/header.php'); ?>
<?php include('includes/navigation.php'); ?>
<!-- <?php include('includes/slideshow.php'); ?> -->

<main class="main">
    <div class="heading-div text-center mt-1 mb-2">
        <!-- <h1 class="heading-primary">Kontakt</h1> -->
    </div>

    <section class="contact" style="margin-top: 6rem;">
            <div class="contact__details">
                <h1 class="contact__title">Hajde da se čujemo</h1>
                <p class="contact__text">Otvoreni smo za sve prijedloge ili samo za razgovor</p>
                <ul class="contact__list">
                    <li class="contact__item">
                        <svg class="contact__icon">
                            <use xlink:href="img/sprite.svg#icon-location"></use>
                        </svg> 
                        <span>Adresa: Cara Dušana bb <br> Kotor Varoš 78220</span>
                    </li>
                    <li class="contact__item">
                        <svg class="contact__icon">
                            <use xlink:href="img/sprite.svg#icon-phone"></use>
                        </svg> 
                        <span>Tel.: 00387 63 227 407</span>
                    </li>
                    <li class="contact__item">
                        <svg class="contact__icon">
                            <use xlink:href="img/sprite.svg#icon-envelop"></use>
                        </svg> 
                        <span>Email: info@photoborko.com</span>
                    </li>
                    <li class="contact__item">
                        <svg class="contact__icon">
                            <use xlink:href="img/sprite.svg#icon-earth"></use>
                        </svg> 
                        <span>www.photoborko.com</span>
                    </li>
                </ul>
            </div>
            <form action="" class="contact__form" method="post">
                <div class="contact__form-group">
                    <h1 class="contact__form-title">Kontakt</h1>
                </div>
                <!-- <div class="contact__form-group">
                    <input name="name" type="text" class="contact__input" placeholder="Puno ime i prezime">
                </div> -->
                <div class="contact__form-group">
                    <!-- <label for="" class="contact__label">Email</label> -->
                    <input name="email" type="email" class="contact__input" placeholder="Email adresa">
                </div>
                <div class="contact__form-group">
                    <!-- <label for="" class="contact__label">Suject</label> -->
                    <input name="subject" type="text" class="contact__input" placeholder="Tip događaja">
                </div>
                <div class="contact__form-group">
                    <!-- <label for="">Poruka</label> -->
                    <textarea class="contact__textarea" id="subject" name="body" placeholder="Sadržaj poruke"></textarea>
                </div>
                <div class="contact__form-group">
                    <button class="contact__button" type="submit" name="submit_email">Pošalji poruku</button>
                </div>
            </form>
        </section>
    
</main>

<?php include('includes/info_details.php'); ?>
<?php include('includes/footer.php'); ?>

<?php
if(isset($_POST['submit_email'])){
$to = "borkosavic94@gmail.com;borko@photoborko.com";
$subject = $_POST['subject'];
$body = $_POST['body'];
$header = "From: " . $_POST['email'];

mail($to, $subject, $body, $header);
}

?>