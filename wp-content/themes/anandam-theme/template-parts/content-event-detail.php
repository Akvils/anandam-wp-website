<div class="event-summary">
  <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
    <span class="event-summary__month"><?php
    $eventDate = new DateTime(get_field('event_date'));
    echo $eventDate->format('M');
     ?></span>
    <span class="event-summary__day"><?php echo $eventDate->format('d'); ?></span>
  </a>
  <div class="event-summary__content">
    <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
    <p><?php echo wp_trim_words(get_the_content(), 18); ?> <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>

    <?php
    $fields = get_field_objects();
    if( $fields ) {
      ?>
        <table>
          <?php
            foreach ($fields as $field_name => $field) {
              if ($field['value'] !== get_field('event_date')) {
                if ($field['value'] !== get_field('related_program')) {
                  if ($field['value'] !== get_field('page_banner_subtitle')) {
                    if ($field['value'] !== get_field('page_banner_background_image')) {
                ?>
                  <tr>
                    <td><strong><?php echo $field['label']; ?>: </strong></td>
                    <td><?php echo $field['value']; ?></td>
                  </tr>
                <?php
              }}}} // end if value
            } // end foreach field
          ?>
        </table>
      <?php
    } // end if fields
    ?>

  </div>
</div>
