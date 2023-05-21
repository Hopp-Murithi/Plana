<?php
/**
 * @package Plana
 */

namespace Inc\Pages;

use \Inc\Api\Callbacks\AdminCallbacks;

class CreateEvents {
    public function register(){
        $this->create_table();
        $this->add_events();

    }

    function create_table(){
        global $wpdb;

        $table_name = $wpdb->prefix.'events';

        $events_details = "CREATE TABLE IF NOT EXISTS " . $table_name . "(
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            description TEXT NOT NULL,
            date DATE NOT NULL,
            venue VARCHAR(255) NOT NULL,
            price VARCHAR(30) NOT NULL,
            image BLOB NOT NULL
        )";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($events_details);
    }

    function add_events(){
        if(isset($_POST['submit'])){
            global $wpdb;
            $table_name = $wpdb->prefix.'events';
    
            // Retrieve form data
            $title = $_POST['title'];
            $description = $_POST['description'];
            $date = $_POST['date'];
            $venue = $_POST['venue'];
            $price = $_POST['price'];
    
            // Handle image upload
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
                    'image' => $imageData
                ),
                array(
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s'
                )
            );
        }
    }
    
 }