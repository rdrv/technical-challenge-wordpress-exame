<?php 
    $csss = array('card');   
    require_once('header.php');
?>

<main class="my-4">
    <h3 class="h1 m-5 mr-auto ml-auto text-center font-weight-bold">Últimas Notícias</h3>
    
    <ul class="card-columns">
    
    <?php 
    
    $args = array(
        'post_type' => 'noticias',
        'posts_per_page' => 3,
    );
    
    $tresNoticiasRecentes = new WP_Query($args);
    
    if( $tresNoticiasRecentes->have_posts() ) {
        while ( $tresNoticiasRecentes->have_posts() ) {
            $tresNoticiasRecentes->the_post();
            include('card.php');
        }
    }
    ?>
    
    </ul>
</main>


<?php get_footer(); ?>