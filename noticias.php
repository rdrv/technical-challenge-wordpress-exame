<?php 
    $urlNoticias = home_url('/noticias');
    $csss = array('noticias', 'card');   
    require_once('header.php');
?>

<a href="<?= $urlNoticias ?>">Teste</a>

<form action="<?= $urlNoticias ?>" method="get">
    <?php 
        $categorias = get_terms('categorias');
        foreach ($categorias as $categoria) { ?>
        <button name="categorias" value="<?= $categoria->slug ?>" type="submit"><?= $categoria->name ?></button>
    <?php } ?>
</form>

<?php 


$existeBusca = array_key_exists('categorias', $_GET);

if($existeBusca) {
    $taxQuery = array(
        array(
            'taxonomy' => 'categorias',
            'field' => 'slug',
            'terms' => $_GET['categorias']
        )
    );
}

$args = array(
    'post_type' => 'noticias',
    'tax_query' => $taxQuery
);

$loopNoticias = new WP_Query($args);

if( $loopNoticias->have_posts() ) {
    while ( $loopNoticias->have_posts() ) {
        $loopNoticias->the_post();
?>

<li>
    <a href="<?= the_permalink() ?>">
        <div class="temp_thumbnail">
            <?php the_post_thumbnail(); ?>
        </div>
        <h4><?php the_title(); ?></h4>
        <p><?php the_excerpt() ?></p>
    </a>
</li>

</ul>

<?php
    }
}

?>

<?php get_footer(); ?>