<!DOCTYPE html>

<html lang="en">
<head>
  <title>Hello My Friend</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
  <link rel="stylesheet" href="../css/style.css">
  <script src="../js/script.js"></script>
</head>
<body>
  <div class="container">
    <?php for($i = 1; $i < 10; $i++) { ?>
    <div class="card">
      <span class="card__category">Category <?php echo $i; ?></span>
      <div class="card__section">
        <div class="card__image" style="background-image: url('../images/pic_<?php echo $i; ?>.jpg')"></div>
        <div class="card__description">
          <h3 class="card__title">Title <?php echo $i; ?></h3>
          <p class="card__text">100% Up to 100 + $1500 + 150 Zee Spins + 500 Zee Points<?php echo $i; ?></p>
        </div>
        <div class="card__actions">
          <div class="card__stars" style="background-image: url('../images/stars.jpg')"></div>
          <button type="button" data-id="<?php echo $i; ?>" class="card__button">Play</button>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</body>
</html>