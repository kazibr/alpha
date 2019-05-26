<?php get_header();?>
<?php get_template_part('/template-parts/common/hero');?>
<div class="posts">
    <?php 
        while(have_posts()){
            the_post();
    ?>  
    <?php get_template_part( 'post-formats/content', get_post_format())?>
    
        <?php
            }
        ?>
        
    </div>
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
            <?php
                the_posts_pagination( array(
                    'screen_reader_text'=>' ',
                    'mid_size'  => 2,
                    'prev_text' => __( 'Back', 'textdomain' ),
                    'next_text' => __( 'Onward', 'textdomain' )

                    ) );
            ?>
            </div>
        </div>
    </div>

<?php get_footer();?>