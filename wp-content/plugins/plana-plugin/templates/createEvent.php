<div class="container-create">
    <form class="createEvent" action="" method="post" enctype="multipart/form-data">
        <h3>Create Event</h3>
        <div class="formm">
            <label for="title">Event Title</label>
            <input type="text" name="title" id="title">
            <label for="description">Description</label>
            <input type="text" name="description" id="description">
            <label for="date">Event Date</label>
            <input type="date" name="date" id="date">
            <label for="venue">Venue</label>
            <input type="text" name="venue" id="venue">
            <label for="price">Price</label>
            <input type="text" name="price" id="price">
            <label for="price-vip">Price vip</label>
            <input type="text" name="price-vip" id="price-vip">
            <label for="vip_tickets">VIP Tickets</label>
            <input type="number" name="vip_tickets" id="vip_tickets" min="0" value="0">
            <label for="regular_tickets">Regular Tickets</label>
            <input type="number" name="regular_tickets" id="regular_tickets" min="0" value="0">
            <label for="image">Event Poster</label>
            <input type="file" name="image" id="image">

        </div>

        <input type="submit" value="Create Event" name="submit">
    </form>
</div>
