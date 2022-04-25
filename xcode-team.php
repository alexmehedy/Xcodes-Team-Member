<?php

/**
 * Plugin Name:       Xcodes Team Member
 * Plugin URI:        https://hosttier.com
 * Description:       Xcodes slider Its a beutifull slider with shortcode management
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Hosttier
 * Author URI:        https://fb.com/alex.mehedy
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       xcodes_team
 * Domain Path:       /languages
 */

 // Constant.
 define( 'XCODES_TEAM_VERSION', '1.0.0' );
 define( 'XCODES_TEAM_DIR_PATH', plugin_dir_path( __FILE__ ) );
 define( 'XCODES_TEAM_DIR_URL', plugin_dir_url( __FILE__ ));
 define( 'XCODES_TEAM_ASSETS', XCODES_TEAM_DIR_URL . '/assets');



/*Calling Stylesheet*/
function xct_calling_resource(){
  wp_enqueue_style('xct-font-awsome',"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css", $media = 'all' );
  wp_enqueue_style('xct-bootstrap', XCODES_TEAM_ASSETS."/css/bootstrap.css", $media = 'all' );
  wp_enqueue_style('xct-front-main-style', XCODES_TEAM_ASSETS."/css/style.css", $media = 'all' );


//script calling
  wp_enqueue_script( 'xct-bootstrap', XCODES_TEAM_ASSETS."/js/boostrap.js",array ( 'jquery' ), $ver = XCODES_TEAM_VERSION, $in_footer = true );
  wp_enqueue_script( 'xct-bootstrap-pop', XCODES_TEAM_ASSETS."/js/bootstrap-pop.js",array ( 'jquery' ), $ver = XCODES_TEAM_VERSION, $in_footer = true );
}
add_action('wp_enqueue_scripts','xct_calling_resource');

//calling admin stylesheet

function xct_admin_style(){
  wp_enqueue_style('xct-font-awsome',"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css", $media = 'all' );
  wp_enqueue_style('xct-bootstrap', XCODES_TEAM_ASSETS."/css/bootstrap.css", $media = 'all' );
  wp_enqueue_style('xct-admin', XCODES_TEAM_ASSETS."/admin/css/style.css", $media = 'all' );
}
add_action('admin_enqueue_scripts','xct_admin_style');


//Register Custom post

if ( ! function_exists('xct_custom_post_type') ) {

// Register Custom Post Type
function xct_custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Team Members', 'Post Type General Name', 'xcodes_team' ),
		'singular_name'         => _x( 'team member type', 'Post Type Singular Name', 'xcodes_team' ),
		'menu_name'             => __( 'Team Member', 'xcodes_team' ),
		'name_admin_bar'        => __( 'Post Type', 'xcodes_team' ),
		'archives'              => __( 'Item Archives', 'xcodes_team' ),
		'attributes'            => __( 'Item Attributes', 'xcodes_team' ),
		'parent_item_colon'     => __( 'Parent Item:', 'xcodes_team' ),
		'all_items'             => __( 'All Items', 'xcodes_team' ),
		'add_new_item'          => __( 'Add New Item', 'xcodes_team' ),
		'add_new'               => __( 'Add New', 'xcodes_team' ),
		'new_item'              => __( 'New Item', 'xcodes_team' ),
		'edit_item'             => __( 'Edit Item', 'xcodes_team' ),
		'update_item'           => __( 'Update Item', 'xcodes_team' ),
		'view_item'             => __( 'View Item', 'xcodes_team' ),
		'view_items'            => __( 'View Items', 'xcodes_team' ),
		'search_items'          => __( 'Search Item', 'xcodes_team' ),
		'not_found'             => __( 'Not found', 'xcodes_team' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'xcodes_team' ),
		'featured_image'        => __( 'Featured Image', 'xcodes_team' ),
		'set_featured_image'    => __( 'Set featured image', 'xcodes_team' ),
		'remove_featured_image' => __( 'Remove featured image', 'xcodes_team' ),
		'use_featured_image'    => __( 'Use as featured image', 'xcodes_team' ),
		'insert_into_item'      => __( 'Insert into item', 'xcodes_team' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'xcodes_team' ),
		'items_list'            => __( 'Items list', 'xcodes_team' ),
		'items_list_navigation' => __( 'Items list navigation', 'xcodes_team' ),
		'filter_items_list'     => __( 'Filter items list', 'xcodes_team' ),
	);
	$args = array(
		'label'                 => __( 'team member type', 'xcodes_team' ),
		'description'           => __( 'Post Type Description', 'xcodes_team' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 50,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
    'menu_icon'             => 'dashicons-admin-users'
	);
	register_post_type( 'team-member', $args );

}
add_action( 'init', 'xct_custom_post_type', 0 );



//wp query

function xct_team_loop(){ ?>
  <section class="section-team">
    <div class="container">
        <!-- Start Header Section -->
        <div class="row justify-content-center text-center">
          <div class="col-md-8 col-lg-6">
            <div class="header-section">
              <h3 class="small-title">
                <?php
                $value = get_option('short_title');
                if ($value == '') {
                  echo "Our Experts";
                }else {
                echo $value;
                }

                ?>


              </h3>
              <h2 class="title">
                <?php
                    $value = get_option('title');
                    if ($value == '') {
                      echo "Let's meet with our team members";
                    }else {
                    echo $value;
              }

              ?></h2>
            </div>
          </div>
        </div>

<div class="row">
<?php  // WP_Query arguments
$args = array(
	'post_type'              => array( 'team-member' ),
	'post_status'            => array( 'publish' ),
  //'post_per_page'          =>array('10');
);

// The Query
$xct_query = new WP_Query( $args );

// The Loop
if ( $xct_query->have_posts() ) {
	while ( $xct_query->have_posts() ) {
		$xct_query->the_post();
		// do something  ?>


    				<!-- Start Single Person -->
    				<div class="col-sm-6 col-lg-4 col-xl-3">
    					<div class="single-person">
    						<div class="person-image">
    							<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full') ?>" alt="<?php the_title()?>">
    							<span class="icon">
    								<i class="fab "></i>
    							</span>
    						</div>
    						<div class="person-info">
    							<h3 class="full-name"><?php the_title()?></h3>
    							<span class="speciality"><?php the_excerpt()?></span>
    						</div>
    					</div>
    				</div>
    				<!-- / End Single Person -->
<?php	}
} else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata(); ?>

<!-- / End Header Section -->
</div>
</div>
</section>
<?php
}

/*
  xct_customshortcode
*/

function xct_customshortcode() {
    add_shortcode( 'XCTEAM', 'xct_team_loop' );
}
add_action( 'init', 'xct_customshortcode' );
}




//for icluding files
foreach (glob(XCODES_TEAM_DIR_PATH."/includes/*.php") as $php_files) {
  include_once $php_files;

}

//register activation hook

register_activation_hook( __FILE__, 'xtc_activation_hook');
add_action( 'admin_init','xtc_plugins_redirect');

function xtc_activation_hook(){
  add_option( 'xtc_plugins_activation_redirect',true );
}
function xtc_plugins_redirect(){
  if (get_option( 'xtc_plugins_activation_redirect', false )) {
    delete_option( 'xtc_plugins_activation_redirect');
    if (!isset($_GET['activate-multi'])) {
        wp_redirect( 'edit.php?post_type=team-member&page=xt-team-member');
    }
  }
}
 ?>
