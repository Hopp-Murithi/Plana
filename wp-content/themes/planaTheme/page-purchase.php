<?php
/**
 * Template Name: Ticket Purchase
 *
 * @package Plana
 */

// Get an instance of the MyTickets class
$my_tickets = new \Inc\Pages\MyTickets();
$my_tickets->register();

// Check if the form is submitted
if (isset($_POST['purchase_ticket'])) {
    // Handle the ticket purchase
    // You can add any additional validation or processing logic here
    // For simplicity, we assume the form fields are valid

    // Get the ticket ID from the form
    $ticket_id = $_POST['ticket_id'];

    // Check if the user is logged in
    if (is_user_logged_in()) {
        // Get the current user's ID
        $current_user = wp_get_current_user();
        $user_id = $current_user->ID;

        // Add the ticket to the user's tickets
        $my_tickets->add_event_to_user($user_id, $ticket_id);
        $success_msg = "Ticket purchased successfully.";
    } else {
        // Redirect to the login page if the user is not logged in
        wp_redirect(wp_login_url());
        exit;
    }
}

get_header();
?>

<!-- Display success message if applicable -->
<?php if (isset($success_msg)) : ?>
    <div class="success-message"><?php echo esc_html($success_msg); ?></div>
<?php endif; ?>

<!-- Ticket Purchase Form -->
<form method="post" action="">
    <input type="hidden" name="purchase_ticket" value="1">

    <!-- Add any additional form fields here, such as ticket selection, quantity, etc. -->

    <!-- Ticket ID -->
    <label for="ticket_id">Ticket ID:</label>
    <input type="text" name="ticket_id" id="ticket_id">

    <button type="submit">Purchase Ticket</button>
</form>

<?php get_footer(); ?>
