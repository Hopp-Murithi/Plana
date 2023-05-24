<?php

namespace Inc\Pages;

class MyTickets {
    public function register() {
        add_action('init', array($this, 'handle_ticket_purchase'));
    }

    public function handle_ticket_purchase() {
        if (isset($_POST['purchase_ticket'])) {
            if (is_user_logged_in()) {
                global $wpdb;
                $user_tickets_table = $wpdb->prefix . 'user_tickets';
                $events_table = $wpdb->prefix . 'events';

                $current_user = wp_get_current_user();
                $user_id = $current_user->ID;
                $event_id = $_GET['id']; // Assuming the event ID is passed through GET parameter 'id'
                $ticket_type = $_POST['ticket_type'];
                $ticket_quantity = (int) $_POST['ticket_quantity'];

                $event = $this->get_event_by_id($event_id);
                if (!$event) {
                    // Handle invalid event ID
                    return;
                }

                // Calculate the ticket price based on the ticket type and quantity
                $ticket_price = ($ticket_type === 'vip') ? $event->pricevip : $event->price;
                $total_price = $ticket_price * $ticket_quantity;

                // Deduct the purchased tickets from the remaining tickets
                if ($ticket_type === 'vip') {
                    $event->vip_tickets -= $ticket_quantity;
                } else {
                    $event->regular_tickets -= $ticket_quantity;
                }

                // Update the event with the new remaining ticket quantities
                $this->update_event($event_id, $event->vip_tickets, $event->regular_tickets);

                // Add the purchased tickets to the user's tickets
                for ($i = 0; $i < $ticket_quantity; $i++) {
                    $wpdb->insert(
                        $user_tickets_table,
                        array(
                            'user_id' => $user_id,
                            'event_id' => $event_id,
                            'ticket_type' => $ticket_type,
                            'ticket_price' => $ticket_price,
                            'ticket_quantity' => 1,
                        ),
                        array(
                            '%d',
                            '%d',
                            '%s',
                            '%f',
                            '%d',
                        )
                    );
                }

                // Redirect to a success page or display a success message
                wp_redirect(home_url('/success'));
                exit();
            } else {
                // Redirect to the login page or display an error message
                wp_redirect(wp_login_url());
                exit();
            }
        }
    }

    private function get_event_by_id($event_id) {
        global $wpdb;
        $events_table = $wpdb->prefix . 'events';

        $query = $wpdb->prepare("SELECT * FROM $events_table WHERE id = %d", $event_id);
        return $wpdb->get_row($query);
    }

    private function update_event($event_id, $vip_tickets, $regular_tickets) {
        global $wpdb;
        $events_table = $wpdb->prefix . 'events';

        $wpdb->update(
            $events_table,
            array(
                'vip_tickets' => $vip_tickets,
                'regular_tickets' => $regular_tickets,
            ),
            array('id' => $event_id),
            array('%d', '%d'),
            array('%d')
        );
    }
}

?>