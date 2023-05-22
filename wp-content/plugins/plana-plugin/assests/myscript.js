// JavaScript code to handle button clicks

// Function to handle delete button click
function handleDeleteButtonClick(eventId) {
    // Add your code here to handle the delete action
    // You can make an AJAX request to a server-side script to delete the event based on the event ID
    // For example: $.post('delete-event.php', { event_id: eventId }, function(response) { ... });
    console.log('Delete button clicked for event ID: ' + eventId);
}

// Function to handle update button click
function handleUpdateButtonClick(eventId) {
    // Add your code here to handle the update action
    // You can redirect the user to an update page or show a modal to update the event details
    console.log('Update button clicked for event ID: ' + eventId);
}

// Attach click event listeners to the delete buttons
var deleteButtons = document.querySelectorAll('.delete-button');
deleteButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        var eventId = this.getAttribute('data-event-id');
        handleDeleteButtonClick(eventId);
    });
});

// Attach click event listeners to the update buttons
var updateButtons = document.querySelectorAll('.update-button');
updateButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        var eventId = this.getAttribute('data-event-id');
        handleUpdateButtonClick(eventId);
    });
});