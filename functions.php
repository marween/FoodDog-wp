<?php


add_theme_support('post-thumbnails');

function sm_custom_meta() {
    add_meta_box( 'sm_meta', __( 'Featured Posts', 'sm-textdomain' ), 'sm_meta_callback', 'post' );
}
function sm_meta_callback( $post ) {
    $featured = get_post_meta( $post->ID );
    ?>
 
	<p>
    <div class="sm-row-content">
        <label for="meta-checkbox">
            <input type="checkbox" name="meta-checkbox" id="meta-checkbox" value="yes" <?php if ( isset ( $featured['meta-checkbox'] ) ) checked( $featured['meta-checkbox'][0], 'yes' ); ?> />
            <?php _e( 'Featured this post', 'sm-textdomain' )?>
        </label>
        
    </div>
</p>
 
    <?php
}
add_action( 'add_meta_boxes', 'sm_custom_meta' );

/**
 * Saves the custom meta input
 */
function sm_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'sm_nonce' ] ) && wp_verify_nonce( $_POST[ 'sm_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
 // Checks for input and saves
if( isset( $_POST[ 'meta-checkbox' ] ) ) {
    update_post_meta( $post_id, 'meta-checkbox', 'yes' );
} else {
    update_post_meta( $post_id, 'meta-checkbox', '' );
}
 
}
add_action( 'save_post', 'sm_meta_save' );


function my_post_queries( $query ) {
  // do not alter the query on wp-admin pages and only alter it if it's the main query
  if (!is_admin() && $query->is_main_query()){

    // alter the query for the home and category pages 

    if(is_home()){
      $query->set('posts_per_page', 6);
    }

    if(is_category()){
      $query->set('posts_per_page', 2);
    }

  }
}
add_action( 'pre_get_posts', 'my_post_queries' );

function notux_widgets_init() {	
	// Mon widget sur mesure
		register_sidebar( array(
			'name'			=> __( 'first column footer', 'foodDog' ),
			'id'			=> 'zone-widgets-1',
			'description'	=> __( 'Description de la zone de widgets.', 'foodDog' ),
			'before_widget'	=> '<div id="%1$s" class="widget %2$s mx-4 col-lg-4">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<div class="widget-title th3">',
			'after_title'	=> '</div>',
		) );
		register_sidebar( array(
			'name'			=> __( 'second column footer', 'foodDog' ),
			'id'			=> 'zone-widgets-2',
			'description'	=> __( 'Description de la zone de widgets.', 'foodDog' ),
			'before_widget'	=> '<div id="%1$s" class="widget %2$s mx-4 col-lg-4">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<div class="widget-title th3">',
			'after_title'	=> '</div>',
		) );
		register_sidebar( array(
			'name'			=> __( 'third column footer', 'foodDog' ),
			'id'			=> 'zone-widgets-3',
			'description'	=> __( 'Description de la zone de widgets.', 'foodDog' ),
			'before_widget'	=> '<div id="%1$s" class="widget %2$s mx-4 col-lg-4">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<div class="widget-title th3">',
			'after_title'	=> '</div>',
		) );
}
add_action( 'widgets_init', 'notux_widgets_init' );

function wpdocs_theme_name_scripts() {
wp_register_style('main-style', get_template_directory_uri().'/style.css', array(), true);
wp_enqueue_style('main-style');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );



 
?>