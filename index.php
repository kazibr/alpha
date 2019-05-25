<?php get_header();?>
<?php get_template_part('/template-parts/common/hero');?>
<div class="posts">
    <?php 
        while(have_posts()){
            the_post();
    ?>  
    <div <?php post_class();?>>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="post-title"><a href="<?php the_permalink()?>" ><?php the_title();?></a></h2>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <p>
                        <strong><?php the_author();?></strong><br/>
                        <?php echo get_the_date('jS F, Y'); ?>
                    </p>
                    <p>Catagroy</p>
                    <?php the_category( ', ');?>
                    <p>Tags</p>
                    <?php echo get_the_tag_list( "<ul class=\"list-unstyled\"><li>", "</li><li>", "</li></ul>" );?>
                    


                    <?php
                    $alpha_post_format = get_post_format();
                    if($alpha_post_format == 'audio'){
                        echo '<span class="dashicons dashicons-format-audio"></span>';
                    }else if($alpha_post_format == 'video'){
                        echo '<span class="dashicons dashicons-format-video"></span>';
                    }else if($alpha_post_format == 'image'){
                        echo '<span class="dashicons dashicons-format-image"></span>';
                    } else if($alpha_post_format == 'quote'){
                        echo '<span class="dashicons dashicons-format-quote"></span>';
                    }
                    ?>
                    
                </div>
                <div class="col-md-8">
                    <p>
                        <?php
                            if(has_post_thumbnail()){
                                the_post_thumbnail('large',array('class' => 'img-fluid' ));
                            }
                        ?>
                    </p>
                    <p>
                        <?php
                        // if(!post_password_required()){
                        //     the_excerpt();
                        // }else{
                        //     echo get_the_password_form();
                        // } 
                        the_excerpt();
                            
                        ?>
                    </p>
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