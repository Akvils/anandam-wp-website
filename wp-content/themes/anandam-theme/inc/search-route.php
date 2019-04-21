<?php
add_action('rest_api_init', 'anandamRegisterSearch');

function anandamRegisterSearch() {
  register_rest_route('anandam/v1', 'search', array(
    'methods' => WP_REST_SERVER::READABLE,
    'callback' => 'anandamSearchResults'
  ));
}

function anandamSearchResults($data){
  $mainQuery = new WP_Query(array(
    'post_type' => array('post', 'page', 'people', 'program', 'campus', 'event'),
    's' => sanitize_text_field($data['term'])
  ));

  $results = array(
    'generalInfo' => array(),
    'people' => array(),
    'programs' => array(),
    'events' => array(),
  );

  while ($mainQuery->have_posts()) {
    $mainQuery->the_post();

    if(get_post_type() == 'post' OR get_post_type() == 'page'){
      array_push($results['generalInfo'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink()
      ));
    }

    if(get_post_type() == 'people'){
      array_push($results['people'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'image' => get_the_post_thumbnail_url(0, 'peopleLandscape')
      ));
    }

    if(get_post_type() == 'program'){
      array_push($results['programs'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink()
      ));
    }

    if(get_post_type() == 'event'){
      $eventDate = new DateTime(get_field('event_date'));
      $description = null;
      if (has_excerpt()) {
        $description = get_the_excerpt();
      } else {
        $description = wp_trim_words(get_the_content(), 10);
      }

      array_push($results['events'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'month' => $eventDate->format('M'),
        'day' => $eventDate->format('d'),
        'description' => $description,
      ));
    }

  }

  if ($results['events']) {
    $eventsMetaQuery = array('relation' => 'OR');

    foreach ($results['events'] as $item) {
      array_push($eventsMetaQuery, array(
        'key' => 'attended_event',
        'compare' => 'LIKE',
        'value' => '"' . $item['id'] . '"'
    ));
    }

    $eventRelationshipQuery = new WP_Query(array(
      'post_type' => 'events',
      'meta_query' => $eventsMetaQuery
  ));

    while ($eventRelationshipQuery->have_posts()) {
      $eventRelationshipQuery->the_post();

      if(get_post_type() == 'event'){
        $eventDate = new DateTime(get_field('event_date'));
        $description = null;
        if (has_excerpt()) {
          $description = get_the_excerpt();
        } else {
          $description = wp_trim_words(get_the_content(), 10);
        }

        array_push($results['events'], array(
          'title' => get_the_title(),
          'permalink' => get_the_permalink(),
          'month' => $eventDate->format('M'),
          'day' => $eventDate->format('d'),
          'description' => $description,
        ));
      }
    }

    $results['events'] = array_values(array_unique($results['events'], SORT_REGULAR));
  }

  return $results;

}

 ?>
