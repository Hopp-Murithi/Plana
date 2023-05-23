<?php
get_header();
global $wpdb;
$table = $wpdb->prefix . 'events';
$rawdata = $wpdb->get_results("SELECT * FROM $table");

// Display the table
if ($rawdata) {
    echo '<table class="custom-table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Title</th>';
    echo '<th>Description</th>';
    echo '<th>Date</th>';
    echo '<th>Venue</th>';
    echo '<th>Price</th>';
    echo '<th>Price (VIP)</th>';
    echo '<th>VIP Tickets</th>';
    echo '<th>Regular Tickets</th>';
    echo '<th>Image</th>';
    echo '<th>Actions</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($rawdata as $event) {
        echo '<tr>';
        echo '<td>' . $event->title . '</td>';
        echo '<td>' . $event->description . '</td>';
        echo '<td>' . $event->date . '</td>';
        echo '<td>' . $event->venue . '</td>';
        echo '<td>' . $event->price . '</td>';
        echo '<td>' . $event->pricevip . '</td>';
        echo '<td>' . $event->vip_tickets . '</td>';
        echo '<td>' . $event->regular_tickets . '</td>';
        echo '<td><img src="' . $event->image_url . '" alt="Event Image" width="100"></td>';
        echo '<td>';
        echo '<form method="post" action="">';
        echo '<input type="hidden" name="event_id" value="' . $event->id . '">';
        echo '<input type="submit" value="Delete" name="delete_event">';
        echo ' | ';
        echo '<a href="?page=update&event_id=' . $event->id . '">Update</a>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo 'No Events found.';
}

// Logic for delete event
if (isset($_POST['delete_event'])) {
    $event_id = $_POST['event_id'];

    // Delete event from the database
    $wpdb->delete(
        $table,
        array('id' => $event_id),
        array('%d')
    );

    // Refresh the page after deleting the event
    wp_redirect(admin_url('/admin.php?page=events'));
    exit();
}

// Logic for update event
if (isset($_GET['event_id']) && isset($_GET['action']) && $_GET['action'] === 'update') {
    $event_id = $_GET['event_id'];

    // Redirect to the update page with the event ID as a parameter
    wp_redirect(admin_url('/admin.php?page=update&update_id=' . $event_id));
    exit();
}

get_footer();
?>