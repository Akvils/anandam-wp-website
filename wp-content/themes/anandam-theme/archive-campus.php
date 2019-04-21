<?php
  get_header();
  pageBanner(array(
    'title' => 'Anandam Campus',
    'subtitle' => 'Place of love, healing and transformation.'
  ));
?>
<div class="container container--narrow page-section">
<div class="generic-content">
    <?php
    while (have_posts()) {
      the_post();
      the_content();
    }
     ?>
   </div>
</div>

<?php get_footer(); ?>
