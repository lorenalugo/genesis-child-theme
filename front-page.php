<?php
/**
 * Homepage Template.
 */
/*General Settings*/
// Remove site title
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );
// Move navbar to the right
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header_right', 'genesis_do_nav' );
// Remove sidebars
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
remove_action( 'genesis_sidebar_alt', 'genesis_do_sidebar_alt' );
//Force full page layout
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
add_action( 'genesis_meta', 'customized_content' );

function customized_content () {  
    add_action( 'genesis_after_header', 'frontpage_welcome' );
    add_action( 'genesis_before_content', 'frontpage_first_area' );     
    /* The loop goes here*/
    add_action( 'genesis_after_content', 'frontpage_second_area' );
}

function frontpage_welcome() {
    ?>  <div class="welcome-section"><?php
    if ( is_active_sidebar( 'welcome-section' ) ) {
        genesis_widget_area('welcome-section');
    }else{
        ?><h4 class="widgettitle">Welcome</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis blandit consectetur tellus.</p><?php
    }
    ?></div><?php
}

function frontpage_first_area() {
    ?>  <div class="section-1"><?php
    if ( is_active_sidebar( 'sidebar-1' ) ) {
        genesis_widget_area('sidebar-1');
    }else{
        ?><h4 class="widgettitle">Section 1</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis blandit consectetur tellus. Quisque vitae consequat lectus. Nullam a nibh gravida, cursus justo vitae, varius justo.</p><?php
    }
    ?></div>
    <?php
}
function frontpage_second_area() {
    ?><div class="section-2">
        <div class="wrap">
            <div class="row">
                <div class="col-md-6 text-right">
                    <?php
                        if (is_active_sidebar( 'sidebar-2' )) {
                            genesis_widget_area( 'sidebar-2' );                         
                        }else{
                            ?><h4 class="widgettitle">Section 2 Widget 1</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis blandit consectetur tellus. Quisque vitae consequat lectus. Nullam a nibh gravida, cursus justo vitae, varius justo.</p>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p><?php
                        }
                    ?>
                </div>
                <div class="col-md-6">
                    <?php
                        if (is_active_sidebar( 'sidebar-3' )) {
                            genesis_widget_area( 'sidebar-3' );                         
                        }else{
                            ?><h4 class="widgettitle">Section 2 Widget 2</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis blandit consectetur tellus. Quisque vitae consequat lectus. Nullam a nibh gravida, cursus justo vitae, varius justo.</p><?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}

//* Grid Style Content Archive 
function be_archive_post_class( $classes ) {
 // Don't run on single posts or pages
 if( !is_home() ) 
 return $classes;
 $classes[] = 'one-half';
 global $wp_query;
 if( 0 == $wp_query->current_post || 0 == $wp_query->current_post % 2 )
 $classes[] = 'first';
 return $classes;
}
add_filter( 'post_class', 'be_archive_post_class' );

function he_archive_post_class( $classes ) {
 // Don't run on single posts or pages
 if( !is_category() )
 return $classes;
 $classes[] = 'one-half';
 global $wp_query;
 if( 0 == $wp_query->current_post || 0 == $wp_query->current_post % 2 )
 $classes[] = 'first';
 return $classes;
}
add_filter( 'post_class', 'he_archive_post_class' );
genesis();