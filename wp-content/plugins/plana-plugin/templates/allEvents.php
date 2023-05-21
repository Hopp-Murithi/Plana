<?php
global $wpdb;
$table = $wpdb->prefix.'events';
$rawdata = $wpdb->get_results("SELECT * FROM $table");

// Display the table
if ($rawdata) {
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Title</th>';
    echo '<th>Description</th>';
    echo '<th>Date</th>';
    echo '<th>Venue</th>';
    echo '<th>Image</th>';
    echo '<th>Price</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($rawdata as $ticket) {
        echo '<tr>';
        echo '<td>' . $ticket->title . '</td>';
        echo '<td>' . $ticket->description . '</td>';
        echo '<td>' . $ticket->date . '</td>';
        echo '<td>' . $ticket->venue . '</td>';
        echo '<td><img src="data:image/jpeg;base64,' . base64_encode($ticket->image) . '" alt="Event Poster" style="max-width: 100px;"></td>';
        echo '<td>' . $ticket->price . '</td>';
        echo '<td>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo 'No Events found.';
}
?>
