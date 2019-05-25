<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <?php
                if(is_active_sidebar('footer-left')){
                    dynamic_sidebar( 'footer-left' );
                }
            ?>
            </div>
            <div class="col-md-4">
                <?php
                if(is_active_sidebar('footer-mid')){
                    dynamic_sidebar( 'footer-mid' );
                }
            ?>
            </div>
            <div class="col-md-4">
                <?php
                if(is_active_sidebar('footer-right')){
                    dynamic_sidebar( 'footer-right' );
                }
            ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                &copy; LWHH - All Rights Reserved
            </div>
            <div class="col-md-6">
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footermenu',
                            'menu_class' => 'list-inline text-right'
                        )
                    );
                ?>
            </div>
        </div>
    </div>
</div>
<?php wp_footer();?>
</body>

</html>