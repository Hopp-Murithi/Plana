<?php
/**
 * @package Plana
 */

namespace Inc\Pages;

class MyTickets {
    public function regtickets() {
        $this->handle_ticket_purchase();
    }

    private function handle_ticket_purchase() {
        if (isset($_POST['purchase_ticket'])) {
            // Check if the user is logged in
            if (is_user_logged_in()) {
                $current_user = wp_get_current_user();
                $user_id = $current_user->ID;
                $ticket_id = $_POST['ticket_id'];

                // Add the ticket to the user's tickets
                $this->add_event_to_user($user_id, $ticket_id);
            }
        }
    }

    private function add_event_to_user($user_id, $ticket_id) {
        global $wpdb;
        $user_tickets_table = $wpdb->prefix . 'user_tickets';

        $wpdb->insert(
            $user_tickets_table,
            array(
                'user_id' => $user_id,
                'ticket_id' => $ticket_id,
            ),
            array(
                '%d',
                '%d',
            )
        );
    }

    public function get_user_tickets($user_id) {
        global $wpdb;
        $user_tickets_table = $wpdb->prefix . 'user_tickets';
        $events_table = $wpdb->prefix . 'events';
        $users_table = $wpdb->prefix . 'users';

        $query = "SELECT * FROM $user_tickets_table 
                  INNER JOIN $events_table ON $user_tickets_table.ticket_id = $events_table.id 
                  INNER JOIN $users_table ON $user_tickets_table.user_id = $users_table.ID 
                  WHERE $user_tickets_table.user_id = $user_id";

        return $wpdb->get_results($query);
    }
}
