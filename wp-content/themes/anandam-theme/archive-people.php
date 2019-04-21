<?php
  get_header();
  pageBanner(array(
    'title' => 'All People',
    'subtitle' => 'People of Anandam Maitri Sangh'
  ));
?>

<div class="container container--narrow page-section">
  <ul class="people-cards">
    <?php
  //  echo '<ul class="people-cards">';
    while (have_posts()) {
        the_post(); ?>
        <li class="professor-card__list-item">
          <a class="professor-card" href="<?php the_permalink(); ?>">
            <img class="professor-card__image" src="<?php the_post_thumbnail_url('peopleLandscape'); ?>">
            <span class="professor-card__name"><?php the_title(); ?></span>
          </a>
        </li>
    <?php  }
//    echo '</ul>';
    echo paginate_links();
     ?>
   </ul>
</div>

<?php get_footer(); ?>
