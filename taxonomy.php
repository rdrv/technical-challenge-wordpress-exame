<?php 
    $csss = array('card');   
    require_once('header.php');
?>

<main class="my-4">
    <h3 class="h1 m-5 mr-auto ml-auto text-center font-weight-bold">
        <?php 
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            echo $term->name; 
        ?>
    </h3>
    
    <ul class="card-columns">
    
    <?php 
    
    if( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            include('card.php');
        }
    }

    ?>
    
    </ul>
</main>


<?php get_footer(); ?>