<div class="container-create">
<?php
    global $wpdb;

    // Check if the event_id parameter is provided in the URL
    if (isset($_GET['event_id'])) {
        $update_id = $_GET['event_id'];

        // Fetch the event details from the database
        $table_name = $wpdb->prefix . 'events';
        $event = $wpdb->get_row("SELECT * FROM $table_name WHERE id = $update_id");

        // Proceed with rendering the form if the event exists
        if ($event) {
            ?>
 
    <form class="updateEvent" action="" method="post" enctype="multipart/form-data">
        <h3>Update Event</h3>
        <div class="formm">
            <label for="title">Event Title</label>
            <input type="text" name="title" id="title" value="<?php echo $event->title; ?>">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" value="<?php echo $event->description; ?>">
            <label for="date">Event Date</label>
            <input type="date" name="date" id="date" value="<?php echo $event->date; ?>">
            <label for="venue">Venue</label>
            <input type="text" name="venue" id="venue" value="<?php echo $event->venue; ?>">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" value="<?php echo $event->price; ?>">
            <label for="price-vip">Price vip</label>
            <input type="text" name="price-vip" id="price-vip" value="<?php echo $event->pricevip; ?>">
            <label for="vip_tickets">VIP Tickets</label>
            <input type="number" name="vip_tickets" id="vip_tickets" min="0" value="<?php echo $event->vip_tickets; ?>">
            <label for="regular_tickets">Regular Tickets</label>
            <input type="number" name="regular_tickets" id="regular_tickets" min="0" value="<?php echo $event->regular_tickets; ?>">
            <label for="image">Event Poster</label>
            <input type="file" name="image" id="image">
        </div>

        <input type="submit" value="Update Event" name="update">
    </form>
    <?php
        } else {
            echo 'Event not found.';
        }
    } else {
        echo 'Event ID not provided.';
    }
    ?>
</div>
