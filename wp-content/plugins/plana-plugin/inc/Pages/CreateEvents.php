<?php
/**
 * @package Plana
 */

namespace Inc\Pages;

class CreateEvents {
    public function register() {
        $this->create_table();
        $this->add_events();
        $this->update_event();
        $this->delete_event();
    }

    private function create_table() {
        global $wpdb;

        $table_name = $wpdb->prefix . 'events';

        $events_details = "CREATE TABLE IF NOT EXISTS " . $table_name . "(
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            description TEXT NOT NULL,
            date DATE NOT NULL,
            venue VARCHAR(255) NOT NULL,
            price VARCHAR(30) NOT NULL,
            pricevip VARCHAR(30) NOT NULL,
            vip_tickets INT NOT NULL,
            regular_tickets INT NOT NULL,
            image BLOB NOT NULL
        )";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($events_details);
    }

    private function add_events() {
        if (isset($_POST['submit'])) {
            global $wpdb;
            $table_name = $wpdb->prefix . 'events';

            // Retrieve form data
            $title = $_POST['title'];
            $description = $_POST['description'];
            $date = $_POST['date'];
            $venue = $_POST['venue'];
            $price = $_POST['price'];
            $pricevip = $_POST['price-vip'];
            $vip_tickets = $_POST['vip_tickets'];
            $regular_tickets = $_POST['regular_tickets'];
            $imageFile = $_FILES['image'];
            $imageData = file_get_contents($imageFile['tmp_name']);

            // Insert data into the database
            $wpdb->insert(
                $table_name,
                array(
                    'title' => $title,
                    'description' => $description,
                    'date' => $date,
                    'venue' => $venue,
                    'price' => $price,
                    'pricevip' => $pricevip,
                    'vip_tickets' => $vip_tickets,
                    'regular_tickets' => $regular_tickets,
                    'image' => $imageData
                ),
                array(
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%d',
                    '%d',
                    '%s'
                )
            );
        }
    }

    public function delete_event() {
        if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['event_id'])) {
            global $wpdb;
            $table_name = $wpdb->prefix . 'events';
    
            $event_id = $_GET['event_id'];
    
            // Delete event from the database
            $wpdb->delete(
                $table_name,
                array('id' => $event_id),
                array('%d')
            );
    
            // Redirect back to the original page after deletion
            wp_safe_redirect(admin_url('admin.php?page=events'));
            exit;
        }
    }
    

    public function update_event() {
        if (isset($_POST['update_event'])) {
            global $wpdb;
            $table_name = $wpdb->prefix . 'events';

            // Retrieve form data
            $event_id = $_GET['event_id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $date = $_POST['date'];
            $venue = $_POST['venue'];
            $price = $_POST['price'];
            $pricevip = $_POST['price-vip'];
            $vip_tickets = $_POST['vip_tickets'];
            $regular_tickets = $_POST['regular_tickets'];
            $imageFile = $_FILES['image'];
            $imageData = file_get_contents($imageFile['tmp_name']);

            // Update data in the database
            $wpdb->update(
                $table_name,
                array(
                    'title' => $title,
                    'description' => $description,
                    'date' => $date,
                    'venue' => $venue,
                    'price' => $price,
                    'pricevip' => $pricevip,
                    'vip_tickets' => $vip_tickets,
                    'regular_tickets' => $regular_tickets,
                    'image' => $imageData
                ),
                array('id' => $event_id),
                array(
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%d',
                    '%d',
                    '%s'
                ),
                array('%d')
            );

            // Redirect back to the original page after update
            wp_redirect(admin_url('admin.php?page=events'));
            exit;
        }
    }
}
