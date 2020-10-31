<?php get_header(); ?>

<?php 
if( have_posts() ) {
    while ( have_posts() ) {
        the_post();
?>

    <a href="<?= the_permalink() ?>">
        <div class="temp_thumbnail">
            <?php the_post_thumbnail(); ?>
        </div>
        <h4><?php the_title(); ?></h4>
        <p><?php the_excerpt() ?></p>
        <?php the_taxonomies(); ?>
        <?= get_the_date(); ?>
    </a>

<?php
    }
}

?>

<?php get_footer(); ?>