<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * @param $atts
 * @return string
 */
function melasistema_timeline_shortcode($atts = '') {

    /**
     * Load CSS
     */
	wp_enqueue_style( 'mela_timeline_css', MELATIMELINE_BASE_URL . '/assets/css/mela-timeline.css', array(), MELATIMELINE_CURRENT_VERSION, 'all' );
	wp_enqueue_script( 'mela_timeline_js', MELATIMELINE_BASE_URL . '/assets/js/mela-timeline.js', array(), MELATIMELINE_CURRENT_VERSION, 'all' );

    /**
     * Shortcode attrs
     */
 	$value = shortcode_atts( array(
        'posts_per_page' => -1,
        'order' => 'ASC',
    ), $atts );

	/**
	* Loop Timeline with attrs
	*/
	$args = array(  
		'post_type' => 'mela_timeline',
		'posts_per_page' => $value['posts_per_page'],
		'orderby'=> 'title',
		'order' => $value['order'],
		'suppress_filters' => 0,
	);

	$query = new WP_Query( $args ); 

	$timelines = $query->posts;

    /**
     * Reset the query
     */
	wp_reset_query();

	$timelines = get_posts( $args );

	$content = "";

	ob_start(); ?>

		<section class="cd-timeline js-cd-timeline">
			<div class="container max-width-lg cd-timeline__container">

				<?php foreach($timelines as $timeline) { ?>

					<?php write_log($timeline); ?>

					<div class="cd-timeline__block">
				        <div class="cd-timeline__img ccd-timeline__img--none">
				          <!-- <img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ); ?>/assets/img/cd-icon-picture.svg" alt="Picture"> -->
				        </div> <!-- cd-timeline__img -->

				        <div class="cd-timeline__content text-component">
				          <h2><?php echo $timeline->post_title; ?></h2>
				          <p class="color-contrast-medium"><?php echo $timeline->post_content; ?></p>

				          <div class="flex justify-between items-center">
				            <!-- <span class="cd-timeline__date">Jan 14</span> -->
				            <!-- <a href="#0" class="btn btn--subtle">Read more</a> -->
				          </div>
				        </div> <!-- cd-timeline__content -->
				      </div> <!-- cd-timeline__block -->

				<?php } ?>

			</div>
		</section> <!-- cd-timeline -->

	<?php $content .= ob_get_clean();

	return $content;

} 
// register shortcode
add_shortcode('melasistema-timeline', 'melasistema_timeline_shortcode');