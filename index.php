<?php get_header(); ?>


<h3>Últimas Notícias</h3>

<ul>

<?php 

$args = array(
    'post_type' => 'noticias',
    'posts_per_page' => 3,
);

$tresNoticiasRecentes = new WP_Query($args);

if( $tresNoticiasRecentes->have_posts() ) {
    while ( $tresNoticiasRecentes->have_posts() ) {
        $tresNoticiasRecentes->the_post();
?>

<li>
    <a href="<?= the_permalink() ?>">
        <div class="temp_thumbnail">
            <?php the_post_thumbnail(); ?>
        </div>
        <h4><?php the_title(); ?></h4>
        <p><?php the_excerpt() ?></p>
        <?php the_taxonomies(); ?>
        <?= get_the_date(); ?>
    </a>
</li>

</ul>
<?php
    }
}

?>

<?php get_footer(); ?>