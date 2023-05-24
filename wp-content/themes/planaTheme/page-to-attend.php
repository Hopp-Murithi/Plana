<?php
/**
 * Template Name: Event Listing
 */
 
get_header();

// Query and display the list of events
$args = array(
    'post_type' => 'event',
    'posts_per_page' => -1,
);

$events = new WP_Query($args);

if ($events->have_posts()) :
    while ($events->have_posts()) :
        $events->the_post();
        ?>
        <h2><?php the_title(); ?></h2>
        <p><?php the_content(); ?></p>
        <a href="<?php echo esc_url(get_permalink()); ?>">View Details</a>
        <?php
    endwhile;
    wp_reset_postdata();
else :
    echo 'No events found.';
endif;

get_footer();
?>
