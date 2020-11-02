<?php 

    if( have_posts() ) {
        while( have_posts() ) {
            the_post();

        if(is_page('noticias')) { 
            require_once('noticias.php');
        } else {
            get_header();
            the_title();
            the_content();
            get_footer();
        }
    }
}
