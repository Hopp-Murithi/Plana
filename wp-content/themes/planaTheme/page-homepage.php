<?php get_header(); ?>

<?php
global $wpdb;
$table = $wpdb->prefix . 'events';

$events = $wpdb->get_results("SELECT * FROM $table");
?>

<div id="carouselExampleAutoplaying" class="carousel slide mb-3 "
        style="width:100%;height:28rem;box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;"
        data-bs-ride="carousel">
        <div class="carousel-inner h-100">
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Y29uY2VydHxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>
                      Get some
                    </h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1566932769119-7a1fb6d7ce23?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8c3BvcnRzJTIwYWR2ZXJ0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1459749411175-04bf5292ceea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8Y29uY2VydHxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

  <div class="container">
    <?php for ($i = 0; $i < count($events); $i += 4) { ?>
      <div class="row">
        <?php for ($j = $i; $j < min($i + 4, count($events)); $j++) { ?>
          <div class="col-md-3">
            <div class="card">
              <div class="item">
                <a href="<?php echo "/plana/index.php/event-description/?id={$events[$j]->id}" ?>">


                  <img src="<?php echo $events[$j]->image_url; ?>" alt="event_banner">

                  <div class="details">
                    <p class="price"><?php echo date('l', strtotime($events[$j]->date)); ?></p>
                  

                  </div>

                </a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
  @import url('https://fonts.googleapis.com/css?family=PT+Serif+Caption:400');


  body {
    background-color: #DFDFDF;
    font-family: 'PT Serif Caption', serif;
  }


  .carousel {
    height: 25%;
  }

  .carousel .carousel-item img {
    height: 100%;
    object-fit: cover;
    background-size: cover;
  }
h5{
  color:white;
}
  .carousel .carousel-control-prev,
  .carousel .carousel-control-next {
    width: 8%;
  }

  .carousel .carousel-control-prev-icon,
  .carousel .carousel-control-next-icon {
    background-color: #ffffff;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .carousel .carousel-control-prev-icon:before,
  .carousel .carousel-control-next-icon:before {
    content: '';
    display: inline-block;
    transform: scale(1.5);
    color: #000000;
  }

  .carousel .carousel-control-prev-icon {
    margin-left: -15px;
  }

  .carousel .carousel-control-next-icon {
    margin-right: -15px;
  }

  .card {
    border-radius: 10px;
    margin-bottom: 20px;
    position: relative;
  }

  .price {
    color: black;
    font-weight: 600;
  }

  .card .card-body {
    height: 10%;
    padding: 10px;
  }

  img {
    height: 95%;
    width: 100%;
    border-radius: 2px;
  }

  .card .card-footer .dot {
    width: 12px;
    height: 12px;
    background-color: #9B2915;
    border-radius: 50%;
    margin-left: 5px;
  }

  .card .card-footer .dot:last-child {
    margin-right: 0;
  }

  .card .card-footer .dot:not(:last-child) {
    margin-right: 5px;
  }
</style>

<?php get_footer(); ?>