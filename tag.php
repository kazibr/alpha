<?php get_header();?>
<?php get_template_part('/template-parts/common/hero');?>
<div class="posts text-center">
    <h1><?php single_tag_title('Posts under: ');?></h1>
    <?php 
        while(have_posts()){
            the_post();
    ?>
    <div <?php post_class();?>>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="post-title"><a href="<?php the_permalink()?>"><?php the_title();?></a></h2>
                </div>
            </div>
        </div>
    </div>
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