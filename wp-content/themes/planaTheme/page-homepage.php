<?php get_header(); ?>

<?php
global $wpdb;
$table = $wpdb->prefix . 'events';

$events = $wpdb->get_results("SELECT * FROM $table");
?>

<div class="container">
  <?php for ($i = 0; $i < count($events); $i += 4) { ?>
    <div class="row">
      <?php for ($j = $i; $j < min($i + 4, count($events)); $j++) { ?>
        <div class="col-md-3">
          <div class="card">
            <div class="item">
              <a href="<?php echo "/plana/index.php/event-description/?id={$events[$j]->id}" ?>">
                <div class="product">
                  <div class="image">
                    <img src="<?php echo $events[$j]->image_url; ?>" alt="">
                  </div>
                  <div class="details">
                 
                    <p class="venue"><?php echo $events[$j]->venue; ?></p>
                    <p class="price"><?php echo $events[$j]->date; ?></p>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  <?php } ?>
</div>

<style>
@import url('https://fonts.googleapis.com/css?family=PT+Serif+Caption:400');

body {
  background: radial-gradient(#9B2915, #DFDFDF) no-repeat center center fixed;
  font-size: 16px;
  font-family: 'PT Serif Caption', serif;
  line-height: 1.5;
}

h1 {
  color: #DFDFDF;
}

.card {
  border-radius:10px;
  margin-bottom: 15px;
  margin-top: 15px;
}

.product {
  display: flex;
  flex-direction: column;
  height: 100%;
}

.image img {
  width: 95%;
  border-radius: 10px;
  height: 75%;
  object-fit: cover;
}

.details {
  padding: 10px;
  background-color: #FFF;
}

.price {
  font-size: 16px;
  margin-bottom: 5px;
}

.venue {
  font-size: 14px;
  color: #888;
}
</style>

<?php get_footer(); ?>
