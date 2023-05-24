<?php get_header() ?>
<?php

global $wpdb;
$table = $wpdb->prefix . 'events';
$id = $_GET['id'];
$data = $wpdb->get_results("SELECT * FROM $table WHERE id=$id");



?>

<div class="container" style="background-color: #ffffff;">
  <div class="row main-cont">
    <div class="col-md-6">
      <img src=<?php echo $data[0]->image_url; ?>  alt="Event Image" class="img-fluid image">
      <p style=" color:#000000">Date:<?php
$date = $data[0]->date;
$convertedDate = date('d/m/Y', strtotime($date));
echo $convertedDate;
?>
</p>
      <p style=" color:#000000">Time: 7:00 PM</p>
      <p style=" color:#D00000;font-weight:600;">Price:<?php echo $data[0]->price; ?> </p>
      <p style=" color:#000000">Venue:<?php echo $data[0]->venue; ?></p>
    </div>
    <div class="col-md-6">
      <div class="text-end">
        <form action="" method="post">
          <input type="submit" name="ticket_id" value="Buy Now">
        </form>
      </div>
      <h2 style=" color:#9B2915;">More details...</h2>
      <p style=" color:#000000"><?php echo $data[0]->description; ?></p>
    </div>
  </div>
</div>
<style>
.main-cont{
  border-radius: 15px;
  margin-top: 15px;
  background-color: #DFDFDF;
}

.image{
  margin-top: 15px;
  border-radius: 6px;
  margin-bottom: 6px;
}
input[type="submit"]{
 background-color:#160FE7 ;
  color:#ffffff;
  padding: 6px;
  margin: 8px;
  border-radius: 6px;
}
</style>


<?php get_footer() ?>