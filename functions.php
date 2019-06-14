<?php

require_once get_theme_file_path( '/inc/tgm.php' );

if(site_url()=='http://dev.testone.com/wp'){
    define('VERSION', time());
}else{
    define('VERSION', wp_get_theme()->get('Version'));
}


function alpha_bootstrapping(){
    load_theme_textdomain('alpha');
    add_theme_support('title-tag');
    $alpha_custom_header_details = array(
        'header-text' => true,
        'deafult-text-color' => '#222'
    );
    add_theme_support('custom-header',$alpha_custom_header_details);
    $alpha_custom_logo = array(
        "width"  => '100',
        "height" => '100'
    );
    add_theme_support( 'custom-logo',$alpha_custom_logo );
    add_theme_support( 'custom-background' );
    add_theme_support('post-thumbnails');
    register_nav_menu('topmenu', __('Top Menu','alpha'));
    register_nav_menu('footermenu',__('Footer Menu', 'alpha'));
    add_theme_support('post-formats', array('audio','video','image','quote','link'));
}

add_action( 'after_setup_theme', 'alpha_bootstrapping');

function alpha_assets(){
    wp_enqueue_style('dashicon');
    wp_enqueue_style( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' );
    wp_enqueue_style( 'featherlight-css', '//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.css');
    wp_enqueue_style( 'alpha', get_stylesheet_uri(),null,VERSION);

    wp_enqueue_script( 'featherlight-js','//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.js' , array('jquery'), '0.0.1', true );
    wp_enqueue_script( 'alpha-main-js', get_theme_file_uri('/assets/js/main.js'), array('jquery'), VERSION, true );
}

add_action( 'wp_enqueue_scripts', 'alpha_assets' );

function alpha_sidebar(){
    register_sidebar( 
        array(
            'name'          => __( 'Single Post sidebar','alpha' ),
            'id'            => "sidebar-1",
            'description'   => __('Right Sidebar', 'alpha'),
            'class'         => 'right-sidebar-1',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => "</section>\n",
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => "</h2>\n",
        )
     );

     register_sidebar( 
        array(
            'name'          => __( 'Footer left','alpha' ),
            'id'            => "footer-left",
            'description'   => __('Footer Left', 'alpha'),
            'class'         => 'footer-left',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => "</section>\n",
            'before_title'  => '<h5 class="widgettitle">',
            'after_title'   => "</h5>\n",
        )
     );
     register_sidebar( 
        array(
            'name'          => __( 'Footer mid','alpha' ),
            'id'            => "footer-mid",
            'description'   => __('Footer Middle', 'alpha'),
            'class'         => 'footer-mid',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => "</section>\n",
            'before_title'  => '<h5 class="widgettitle">',
            'after_title'   => "</h5>\n",
        )
     );
     register_sidebar( 
        array(
            'name'          => __( 'Footer Right','alpha' ),
            'id'            => "footer-right",
            'description'   => __('Footer Right', 'alpha'),
            'class'         => 'footer-right',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => "</section>\n",
            'before_title'  => '<h5 class="widgettitle">',
            'after_title'   => "</h5>\n",
        )
     );

}

add_action( 'widgets_init', 'alpha_sidebar' );

function alpha_the_excerpt($args){
    if(!post_password_required()){
        return $args;
    }else{
        echo get_the_password_form();
    }
}
add_filter( 'the_excerpt', 'alpha_the_excerpt' );

function alpha_protected_title_change(){
    return '%s';
}

add_filter('protected_title_format', 'alpha_protected_title_change');

function alpha_menu_item_class($classes, $item){
    $classes[] = 'list-inline-item';
    return $classes;
}
add_filter('nav_menu_css_class', 'alpha_menu_item_class', 10, 2);

function alpha_about_page_template_banner(){
    if(is_page()){
        $alpha_feat_image = get_the_post_thumbnail_url(null, 'large');
        ?>
        <style>
            /*is this working? */
            .page-header{
                background-image: url(<?php echo $alpha_feat_image; ?>);
            }
            .header{
                background-image: url(<?php echo $alpha_feat_image; ?>);
            }
        </style>
        <?php
    }
    $blog_id = get_option('page_for_posts');
    if(is_home()){
        $alpha_feat_blog_image = get_the_post_thumbnail_url($blog_id, 'large');

        ?>
        <style>
            .header{
                background-image: url(<?php echo $alpha_feat_blog_image; ?>);
                background-size:cover;
                margin-bottom: 50px;
            }
        </style>
        <?php
    }

    if(is_front_page()){
        if(current_theme_supports('custom-header')){
            ?>            
            <style>
                .header{
                    background-image: url(<?php echo header_image();?>);
                    background-size: cover;
                    margin-bottom: 50px;
                }
                .header h1.heading a, h3.tagline{
                    color:#<?php echo get_header_textcolor();?>;
                    <?php
                        if(!display_header_text()){
                            echo 'display:none;';
                        }
                    ?>

                }
            </style>            
            <?php
        }
    }
    
}
add_action( 'wp_head', 'alpha_about_page_template_banner', 15);
