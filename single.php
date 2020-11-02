<?php
    $csss = array('single', 'noticias');   
    require_once('header.php');

    if( have_posts() ) {
        while ( have_posts() ) {
            the_post();
?>

<main class="my-5">
    <section class="noticias_taxonomias my-4">
        <?php the_taxonomies(); ?>
    </section>
    <h1 class="h1 font-weight-bolder single_titulo"><?php the_title(); ?></h1>
    <?php the_excerpt() ?>
    <section class="noticias_infos my-4">
        <small class="noticias_infos__small">Por:</small>
        <div class="noticias_infos__autor d-flex align-items-center my-2">
            <?php 
                echo get_avatar( get_the_author_meta( 'ID' ), 32 );
            ?>
            <p class="noticias_infos__autor___nome ml-2 font-weight-bold">
                <?php the_author(); ?>
            </p>
        </div>
        <small class="noticias_infos__small">
            Publicado em: <?= get_the_date() ?> às <?= the_time( 'H:i:s' ) ?>
        </small>
    </section>
    <article class="single_content my-4">
        <?php the_post_thumbnail('large', array('class' => 'single_imagem')); ?>
        <hr class="my-4">
        <?php the_content(); ?>
    </article>
</main>


  


<?php
    }
}

?>

</section>

<?php get_footer(); ?>