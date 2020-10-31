<?php get_header(); ?>

<?php 
if( have_posts() ) {
    while ( have_posts() ) {
        the_post();
?>

    <?php the_post_thumbnail(); ?>
    <?php the_title(); ?>
    <?php the_content(); ?>
    <?php the_author(); ?>
    <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
    <?php the_taxonomies(); ?>
    <?= get_the_date(); ?>

<?php
    }
}

?>

<?php get_footer(); ?>