<?php
/**
 * Template Name: Custom WP Query 
 */
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
<?php get_template_part( "/template-parts/common/hero" ); ?>
    <div class="posts text-center">
        <?php
        $paged          = get_query_var( "paged" ) ? get_query_var( "paged" ) : 1;
        $posts_per_page = 2;
        $post_ids       = array( 1,17,1779,1782,1781,1786,1787,1177,1176 );
        $_p             = new WP_Query( array(
            // 'posts_per_page' => $posts_per_page,
            // 'post__in'       => $post_ids,
            // 'orderby'        => 'post__in',
             'paged'          => $paged,
             'tag' =>'image',
             'category_name' => 'block',
             'posts_per_page' => 5,
             'tax_query' => array(
                 'relation' => 'OR',
                 array(
                     'taxonomy' => 'category',
                     'field' => 'slug',
                     'terms' => array('block')
                 ),
                 array(
                    'taxonomy' => 'post_tag',
                    'field' => 'slug',
                    'terms' => array('image')
                )
             )
        ) );
       ?>

       <?php
        while($_p-> have_posts()){
            $_p -> the_post(  );
            ?>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
            <?php
            }
            wp_reset_query(  );
       ?>
       <!-- <h3><?php the_title();?></h3> -->

        <div class="container post-pagination">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        echo paginate_links(
                            array(
                                'total' => $_p->max_num_pages,
                                'current' => $paged,
                                'prev_next' =>false
                            )
                        );
                    ?>
                </div>
            </div>
        </div>

    </div>
<?php get_footer(); ?>