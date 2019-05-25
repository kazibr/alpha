<h2>
<?php
    if(is_category()){
        single_cat_title();
    }elseif(is_tag()){
        single_tag_title();
    }elseif(is_author()){
        the_author( );
    }
?>
</h2>