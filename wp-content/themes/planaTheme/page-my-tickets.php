<?php
/*
 * Template Name: My Tickets Template
 */

get_header();

// Check if the user is logged in
if (is_user_logged_in()) {
    $current_user = wp_get_current_user();
    $user_id = $current_user->ID;

    // Retrieve the user's tickets from the database
    global $wpdb;
    $user_tickets_table = $wpdb->prefix . 'user_tickets';

    $query = $wpdb->prepare("SELECT * FROM $user_tickets_table WHERE user_id = %d", $user_id);
    $user_tickets = $wpdb->get_results($query);

    // Display the user's tickets
    if (!empty($user_tickets)) {
        echo '<h2>Your Tickets:</h2>';

        echo '<div class="card-deck" style="display: flex; flex-flow: row wrap; color:black;">';
        foreach ($user_tickets as $ticket) {
            echo '<div class="card mb-3">';
            echo '<div class="card-body text-dark">';
            echo '<h5 class="card-title">Event ID: ' . $ticket->event_id . '</h5>';
            echo '<p class="card-text">Ticket Type: ' . $ticket->ticket_type . '</p>';
            echo '<p class="card-text">Price: ' . $ticket->ticket_price . '</p>';
            echo '<p class="card-text">Quantity: ' . $ticket->ticket_quantity . '</p>';
            echo '<p class="card-text">Purchase Date: ' . $ticket->purchase_date . '</p>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo 'You have not purchased any tickets.';
    }
} else {
    echo 'Please log in to view your tickets.';
}

get_footer();
?>
