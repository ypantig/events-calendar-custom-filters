<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Display -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.23
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}

get_header();
?>
<main id="tribe-events-pg-template" class="tribe-events-pg-template">
  <?php

    $termArgs = [
      'taxonomy' => 'tribe_events_cat',
      'hide_empty' => true,
    ];

    $terms = new \WP_Term_Query( $termArgs );

    // get the terms from tribe events category
    $terms = $terms->terms;

  ?>

  <form method="post">

    <?php

      $parameter = '';
      // get the URL parameter
      if ( isset( $_REQUEST[ 'tribe_event_category' ] ) ) {
        $parameter = $_REQUEST[ 'tribe_event_category' ];
      }

    ?>

    <label>
      <input type="radio" name="category" value="all" onclick="window.location.href='<?php echo get_post_type_archive_link( 'tribe_events' ); ?>" <?php if ( $parameter == '' ) echo 'checked="checked"'; ?>>
      <span>All</span>
    </label>

    <?php // go through each of the terms to display them ?>
    <?php foreach ( $terms as $term ): ?>
      <?php

        $selected = '';

        // check if the URL parameter is the same as the
        // current term we're looping through
        if ( $term->slug == $parameter ) {
          $selected = ' checked="checked"';
        }

      ?>
      
      <label>
        <input type="radio" name="category" value="<?php echo $term->slug ?>" onclick="window.location.href='<?php echo get_post_type_archive_link( 'tribe_events' ); ?>?tribe_event_category=<?php echo $term->slug; ?>'" <?php echo $selected; ?>>
        <span><?php echo $term->name; ?></span>
      </label>
    <?php endforeach; ?>
  </form>

  <?php tribe_events_before_html(); ?>
  <?php tribe_get_view(); ?>
  <?php tribe_events_after_html(); ?>
</main> <!-- #tribe-events-pg-template -->
<?php
get_footer();
