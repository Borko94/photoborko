<div class="dashboard">
    <div class="dashboard__item dashboard__item--col">
        <div class="card">
        <div class="card__details">
            <?php
            $all_count_post_query = "SELECT * FROM blog_posts";
            $run_all_count_post_query = mysqli_query($conn, $all_count_post_query);
            $all_post_count = mysqli_num_rows($run_all_count_post_query);
            ?>
            <h3><a href="#"><?php echo $all_post_count; ?></a></h3>
            <p><a href="#">Clanaka</a></p>
        </div>
        <svg class="card__icon">
            <use xlink:href="img/sprite.svg#icon-blogger"></use>
        </svg>
        </div>
    </div>
    <div class="dashboard__item dashboard__item--col">
        <div class="card">
        <div class="card__details">
            <?php
            $all_count_comments_query = "SELECT * FROM blog_comments";
            $run_all_count_comments_query = mysqli_query($conn, $all_count_comments_query);
            $all_comments_count = mysqli_num_rows($run_all_count_comments_query);
            ?>
            <h3><a href="#"><?php echo $all_comments_count; ?></a></h3>
            <p><a href="#">Komentara</a></p>
        </div>
        <svg class="card__icon">
            <use xlink:href="img/sprite.svg#icon-bubbles"></use>
        </svg>
        </div>
    </div>
    <div class="dashboard__item dashboard__item--col">
        <div class="card">
        <div class="card__details">
            <h3><a href="#">54</a></h3>
            <p><a href="#">Clanaka</a></p>
        </div>
        <svg class="card__icon">
            <use xlink:href="img/sprite.svg#icon-blog"></use>
        </svg>
        </div>
    </div>
    <div class="dashboard__item dashboard__item--col">
        <div class="card">
        <div class="card__details">
            <?php
            $all_count_views_query = "SELECT SUM(post_views_count) AS SUM FROM blog_posts";
            $run_all_count_views_query = mysqli_query($conn, $all_count_views_query);
            $all_views_count = mysqli_fetch_column($run_all_count_views_query);
            ?>
            <h3><a href="#"><?php echo $all_views_count; ?></a></h3>
            <p><a href="#">Pregleda</a></p>
        </div>
        <svg class="card__icon">
            <use xlink:href="img/sprite.svg#icon-users"></use>
        </svg>
        </div>
    </div>
</div>