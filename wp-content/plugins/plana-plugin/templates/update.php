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
            if (isset($_POST['update'])) {
                // Retrieve updated form inputs
                $title = $_POST['title'];
                $description = $_POST['description'];
                $date = $_POST['date'];
                $venue = $_POST['venue'];
                $price = $_POST['price'];
                $price_vip = $_POST['price-vip'];
                $vip_tickets = $_POST['vip_tickets'];
                $regular_tickets = $_POST['regular_tickets'];
                $image_url = $_POST['image_url'];

                // Update the event in the database
                $updated = $wpdb->update(
                    $table_name,
                    array(
                        'title' => $title,
                        'description' => $description,
                        'date' => $date,
                        'venue' => $venue,
                        'price' => $price,
                        'pricevip' => $price_vip,
                        'vip_tickets' => $vip_tickets,
                        'regular_tickets' => $regular_tickets,
                        'image_url' => $image_url,
                    ),
                    array('id' => $update_id)
                );

                if ($updated) {
                    echo '<p class="success-message">Event updated successfully!</p>';
                } else {
                    echo '<p class="error-message">Failed to update event.</p>';
                }
            }
            ?>

            <form class="updateEvent" action="" method="post">
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
                    <label for="price-vip">Price VIP</label>
                    <input type="text" name="price-vip" id="price-vip" value="<?php echo $event->pricevip; ?>">
                    <label for="vip_tickets">VIP Tickets</label>
                    <input type="number" name="vip_tickets" id="vip_tickets" min="0" value="<?php echo $event->vip_tickets; ?>">
                    <label for="regular_tickets">Regular Tickets</label>
                    <input type="number" name="regular_tickets" id="regular_tickets" min="0" value="<?php echo $event->regular_tickets; ?>">
                    <label for="image_url">Event Image URL</label>
                    <input type="text" name="image_url" id="image_url" value="<?php echo $event->image_url; ?>">
                </div>

                <input type="submit" value="Update Event" name="update">
            </form>
        <?php
        }
    }
    ?>
</div>
