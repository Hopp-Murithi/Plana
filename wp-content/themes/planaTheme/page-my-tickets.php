<?php get_header() ?>

<?php
$bag = get_template_directory_uri() . '/assets/bag.jpg';
?>

<div class="container-fluid">
    <div class="row d-flex">
        <div class=" row mb-2 mt-2 " style="background-color: #ffffff;width:100%;">
            <p class="p-2  product-desc-title" style="font-weight:700;">CART(2)</p>
            <hr>

            <div class="col-md-2">
                <div class="card  border-0 product-container">
                    <div class="d-block mx-auto card-body">
                        <!-- Product image -->
                        <img src="<?php echo $bag ?>" alt="bag" class=" rounded  img-fluid">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Product details -->
                <div class="card border-0 product-container">
                  

                </div>


            </div>
            <hr>
        </div>


    </div>

<style>
     @import url('https://fonts.googleapis.com/css?family=PT+Serif+Caption:400');

body {
  background: radial-gradient(#9B2915, #DFDFDF) no-repeat center center fixed;
  font-size: 16px;
  font-family: 'PT Serif Caption', serif;
  line-height: 1.5;
}

</style>
    <?php get_footer() ?>