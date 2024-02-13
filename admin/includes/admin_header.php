<?php ob_start(); ?>
<?php include('../includes/connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | PhotoBorko</title>

    <link rel="stylesheet" href="css/style.css">

    <script src="https://cdn.tiny.cloud/1/hf7g21rih1xbx4s0dil6yztrfqp2osfghmx9elqqhrl0z9rn/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
  <div class="admin">
      <!-- Header -->
      <header class="admin__header">
        <a href="index.php" class="logo">
          <h4>Admin | PhotoBorko</h4>
        </a>
        <div class="toolbar">
          <!-- <button class="btn btn-primary">Add New Plumbus</button> -->
          <div class="logout">
            <a class="logout__link" href="#">
                Borko Savic
                <svg class="logout__icon">
                    <use xlink:href="img/sprite.svg#icon-circle-down"></use>
                </svg>
                </a>
              <ul class="logout__list">
                <li class="logout__item">
                  <a href="profile.php">
                    <svg class="logout__icon">
                      <use xlink:href="img/sprite.svg#icon-user"></use>
                  </svg> Profile
                  </a>
                </li>
                <li class="logout__item">
                  <a href="logout.php">
                    <svg class="logout__icon">
                      <use xlink:href="img/sprite.svg#icon-switch"></use>
                    </svg>
                    Log out</a>
                </li>
              </ul>
          </div>
        </div>
      </header>