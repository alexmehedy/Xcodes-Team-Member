<?php
/*
  Admin Settings Page

*/


/**
 * Adds a submenu page under a custom post type parent.
 */
function xct_admin_settings() {
    add_submenu_page(
        'edit.php?post_type=team-member',
        __( 'Xcodes Team Members', 'xcodes_team' ),
        __( 'Xcodes Team Settings', 'xcodes_team' ),
        'manage_options',
        'xt-team-member',
        'xt_team_member'
    );
}
add_action('admin_menu', 'xct_admin_settings');

/**
 * Display callback for the submenu page.
 */
function xt_team_member() {
    ?>
    <div class="wrap container p-5">
      <div class="row">
        <div class="col-lg-8">
          <form class="" action="options.php" method="post">
            <?php wp_nonce_field('update-options');?>

            <label for="short_title" class="mb-2">Small Title</label>
            <textarea name="short_title" class="form-control" id="short_title" placeholder="small title"><?php echo get_option('short_title')?></textarea>
            <br>

            <label for="title" class="mb-2">Title</label>
            <textarea name="title" class="form-control" id="title" placeholder="title" rows="8" cols="80"><?php echo get_option('title')?></textarea>
            <br>

            <label for="hover_color" class="mb-2">Hover Color:</label>
            <div class="clear-fix"></div>
            <input type="color" name="color_picker"  class="form-control mb-3" placeholder="Color Picker Here" id="hover_color" style="height:200px" value="<?php echo get_option('color_picker')?>">

            <label for="hover_border_color" class="mb-2">Hover Border Color:</label>
            <div class="clear-fix"></div>
            <input type="color" name="hover_border_color"  class="form-control mb-3" placeholder="Color Picker Here" id="hover_border_color" style="height:200px" value="<?php echo get_option('hover_border_color')?>">

            <input type="submit" name="submit" value="<?php _e( 'HIT HERE','xcodes_team')?>" class="btn btn-outline-dark" style="width: 100%">

            <input type="hidden" name="action" value="update">
            <input type="hidden" name="page_options" value="short_title,title,color_picker,hover_border_color">
          </form><!--form-->
        </div><!--col-->
        <div class="col-lg-4">
          <div class="card">
            <div class="img-container">
                <div class="skewed">
                    <div id="img"></div>
                </div>
            </div>
            <div class="content">
                <h2>Alex Mehedy</h2>
                <p>Full Stack Web Developer</p>
                <div class="links">
                    <a href="https://fb.com/alex.mehedy" target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/alex_mehedy/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/alex-mehedy/" target="_blank"><i class="fab fa-linkedin"></i></a>
                    <a href="https://github.com/alexmehedy" target="_blank"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </div>
        <a href="https://www.buymeacoffee.com/alexmehedy" class="btn btn-outline-info" target="_blank">Doante Me</a>
        </div><!--col-->
      </div><!--row-->
    </div><!--wrap--->
    <?php
}

?>
