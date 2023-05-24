<?php get_header(); ?>

<?php
global $wpdb;
$table = $wpdb->prefix . 'events';

$events = $wpdb->get_results("SELECT * FROM $table");
?>

<div id="carouselExampleAutoplaying" class="carousel slide mb-3"
     style="width: 100%; height: 28rem; box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;"
     data-bs-ride="carousel">
    <div class="carousel-inner h-100">
        <div class="carousel-item active">
            <img src="https://client.gig.co.ke/eventpics/gev_568_banner_pic" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block"></div>
        </div>
        <div class="carousel-item">
            <img src="https://client.gig.co.ke/eventpics/gev_636_banner_pic" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://client.gig.co.ke/eventpics/gev_328_banner_pic" class="d-block w-100" alt="...">
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
                    <div class="card" style="border-radius: 10px;">
                        <div class="item">
                            <a style="text-decoration: none;" href="<?php echo "/plana/index.php/event-description/?id={$events[$j]->id}" ?>">
                                <div class="image-wrapper">
                                    <div class="image-aspect-ratio">
                                        <img src="<?php echo $events[$j]->image_url; ?>" alt="event_banner">
                                    </div>
                                </div>
                                <div class="details">
                                    <p class="date" style="color:#000000;font-weight:700;font-size: 22px;"><?php echo date('l, F j', strtotime($events[$j]->date)); ?>
</p>
                                    <p class="venue" style="color:#000000;"><?php echo $events[$j]->title; ?></p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
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
    }

    h5 {
        color: white;
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

   
    .date,    .venue {
        padding: 5px;
        font-weight: 400;
        font-size: 20px;
        text-decoration: none;
        margin-bottom: 0;
    }

    .details {
        background-color: #ffffff;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        color: white;
    }

    .image-wrapper {
        height: 70%;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .image-aspect-ratio {
        position: relative;
        width: 100%;
        padding-bottom: 100%; /* Maintain 1:1 aspect ratio (square) */
    }

    .image-wrapper img {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        object-fit: cover;
    }
</style>

<?php get_footer(); ?>
