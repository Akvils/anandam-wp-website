<?php
  get_header();
  pageBanner(array(
    'title' => 'All Programs',
    'subtitle' => 'See all the programs that we offer.'
  ));
?>

<div class="container container--narrow page-section">
  <ul class="link-list min-list">
    <?php //class="link-list min-list"
    while (have_posts()) {
        the_post(); ?>
        <li>
          <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            <p style="font-size: 1rem;">
              <?php
              the_field("page_banner_subtitle");?></p>
          </div>
        </li>
    <?php  }
    echo paginate_links();
     ?>
  </ul>

</div>

<?php get_footer(); ?>
