<?php 
    $urlNoticias = home_url('/noticias');
    $csss = array('noticias', 'card');   
    require_once('header.php');
?>

<section class="noticias_taxonomias my-4">
    <a id="todas" href="<?= $urlNoticias ?>">Todas</a>
    <form action="<?= $urlNoticias ?>" method="get">
        <?php 
            $categorias = get_terms('categorias');
            foreach ($categorias as $categoria) { ?>
            <button name="categorias" value="<?= $categoria->slug ?>" id="<?= $categoria->slug ?>" type="submit"><?= $categoria->name ?></button>
        <?php } ?>
    </form>
    <small class="noticias_taxonomias__atual"><?= $_GET['categorias'] ?></small>
</section>

<ul class="card-columns">

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
        include('card.php');
    }
}

?>

</ul>

<?php 
    $jss = array('noticias');   
    require_once('footer.php');
?>