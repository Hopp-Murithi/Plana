<?php
get_header();

global $wpdb;
$table = $wpdb->prefix . 'events';
$id = $_GET['id'];
$data = $wpdb->get_results("SELECT * FROM $table WHERE id=$id");

if (isset($_POST['purchase_ticket'])) {
    // Retrieve form data
    $ticketType = $_POST['ticket_type'];
    $numTickets = $_POST['num_tickets'];

    // Add the purchased tickets to the user's tickets
    for ($i = 0; $i < $numTickets; $i++) {
        $wpdb->insert(
            $user_tickets_table,
            array(
                'event_id' => $id,
                'ticket_type' => $ticketType,
                'ticket_quantity' => 1,
            ),
            array(
                '%d',
                '%s',
                '%d',
            )
        );
    }

    // Redirect to a thank you page or display a success message
    wp_redirect(home_url('/thank-you-page'));
    exit;
}
?>

<div class="container" style="background-color: #ffffff;">
    <div class="row main-cont">
        <div class="col-md-6">
            <img src="<?php echo $data[0]->image_url; ?>" alt="Event Image" class="img-fluid image">
            <p style="color: #000000;">Date: <?php echo date('d/m/Y', strtotime($data[0]->date)); ?></p>
            <p style="color: #000000;">Time: 7:00 PM</p>
            <p style="color: #9B2915;">Price: <?php echo $data[0]->price; ?></p>
            <p style="color: #000000;">Venue: <?php echo $data[0]->venue; ?></p>
        </div>
        <div class="col-md-6">
            <div class="text-end">
                <form action="" method="post">
                    <label for="ticket-type">Ticket Type</label>
                    <select name="ticket_type" id="ticket-type">
                        <option value="regular">Regular</option>
                        <option value="vip">VIP</option>
                    </select>

                    <label for="num-tickets">Number of Tickets</label>
                    <input type="number" name="num_tickets" id="num-tickets" min="1" value="1">

                    <input type="submit" name="purchase_ticket" value="Buy Tickets">
                </form>
            </div>
            <h2 style="color: #9B2915;">More details...</h2>
            <p style="color: #000000;"><?php echo $data[0]->description; ?></p>
        </div>
    </div>
</div>

<style>
    .main-cont {
        border-radius: 15px;
        margin-top: 15px;
        background-color: #DFDFDF;
    }

    .image {
        margin-top: 15px;
        border-radius: 6px;
        margin-bottom: 6px;
    }
</style>

<form method="POST" action="">
    <input type="hidden" name="purchase_ticket" value="1">
    <label for="ticket_type">Ticket Type:</label>
    <select name="ticket_type" id="ticket_type">
        <option value="vip">VIP</option>
        <option value="regular">Regular</option>
    </select>
    <br>
    <label for="ticket_quantity">Ticket Quantity:</label>
    <input type="number" name="ticket_quantity" id="ticket_quantity" min="1" required>
    <br>
    <input type="submit" value="Purchase Tickets">
</form>


<?php get_footer(); ?>
