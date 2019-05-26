<?php get_header();?>
<?php get_template_part('/template-parts/common/hero');?>
<div class="container">
    <div class="authorsection authorpage">
        <div class="row">
            <div class="col-md-2 authorimage">
                <?php 
                    echo get_avatar(get_the_author_meta('ID'));
                ?>
            </div>
            <div class="col-md-10">
                <h4>
                    <?php echo get_the_author_meta( "display_name" ); ?>
                </h4>
                <p>
                    <?php echo get_the_author_meta( "description" ); ?>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="posts text-center">
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