<?php get_header();?>
<?php get_template_part('/template-parts/common/hero');?>

<div class="posts">
    <?php 
        while(have_posts()){
            the_post();
    ?>
    <div class="post " <?php post_class();?>>
        <div class="container">
            <div class="row text-center">
                <div class="col-md-10 offset-md-1">
                    <h2 class="post-title"><?php the_title();?></h2>
                    <p>
                        <strong><?php the_author();?></strong><br />
                        <?php echo get_the_date('jS F, Y'); ?>
                    </p>

                    <?php echo get_the_tag_list( "<ul class=\"list-unstyled\"><li>", "</li><li>", "</li></ul>" );?>

                    <p>
                        <?php
                        if(has_post_thumbnail()){
                            $thumbnail_url = get_the_post_thumbnail_url(null, 'large');
                            echo '<a href="'.$thumbnail_url.'" data-featherlight="image">';
                            the_post_thumbnail('large',array('class' => 'img-fluid' ));
                            echo '</a>';
                        }
                    ?>
                    </p>
                    <!-- <p>
                        <?php                        
                        // the_content();
                        // next_post_link();
                        // echo "<br/>";
                        // previous_post_link();
                    ?>
                    </p> -->

                </div>
            </div>


        </div>
        <?php
            }
        ?>
    </div>
</div>



<?php get_footer();?>