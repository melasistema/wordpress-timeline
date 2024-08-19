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

    <div class="timeline">

		<?php foreach($timelines as $index => $timeline) {
			$alignment = ($index % 2 == 0) ? 'left' : 'right';
			$titleAlignment = ($index % 2 == 0) ? 'title-align-right' : 'title-align-left'; ?>

            <div class="container <?php echo $alignment; ?>">
                <div class="content">
                    <h2 class="<?php echo $titleAlignment; ?>"><?php echo $timeline->post_title; ?></h2>
                    <p><?php echo $timeline->post_content; ?></p>
                </div>
            </div>

		<?php } ?>

    </div>

	<?php $content .= ob_get_clean();

	return $content;

} 
// register shortcode
add_shortcode('melasistema-timeline', 'melasistema_timeline_shortcode');