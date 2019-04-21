<?php get_header();

  while(have_posts()) {
    the_post();
    pageBanner();
    ?>

    <div class="container container--narrow page-section">

      <div class="metabox metabox--position-up metabox--with-home-link">
        <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('people'); ?>"><i class="fa fa-home" aria-hidden="true"></i> People Home</a> <span class="metabox__main"><?php the_title(); ?></span></p>
      </div>

      <div class="generic-content">
        <div class="row group">

          <div class="one-third">
            <?php the_post_thumbnail('peoplePortrait'); ?>
          </div>

          <div class="two-thirds">
            <?php
            $fields = get_field_objects();
            if( $fields ) {
              ?>
                <table>
                  <?php
                    foreach ($fields as $field_name => $field) {
                      if ($field['value'] != get_field('attended_event')) {
                        if ($field['value'] != get_field('page_banner_subtitle')) {
                          if($field['value'] != get_field('page_banner_background_image')) {
                        ?>
                          <tr>
                            <td><strong><?php echo $field['label']; ?>: </strong></td>
                            <td><?php echo $field['value']; ?></td>
                          </tr>
                        <?php
                      }}} // end if value
                    } // end foreach field
                  ?>
                </table>
              <?php
            } // end if fields
            ?>
            <?php the_content() ?>
          </div>

        </div>
      </div>

      <?php
        $attendedEvents = get_field('attended_event');
        if ($attendedEvents) {
          echo '<hr class="section-break">';
          echo '<h2 class="headline headline--medium">Attended Event(s)</h2>';
          echo '<ul class=" min-list">';
          foreach ($attendedEvents as $events) { ?>
            <li>
                <a href="<?php echo get_the_permalink($events); ?>" class="event-summary__title headline headline--tiny"><?php echo get_the_title($events); ?></a>
            </li>
        <?php  }
          echo '</ul>';
        }

       ?>

    </div>

  <?php }
  get_footer();
 ?>
