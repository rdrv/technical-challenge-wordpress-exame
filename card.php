<li class="card">
    <div class="card-header" style="background-image: url(<?= the_post_thumbnail_url('thumbnail') ?>)">
    </div>
    <div class="card-body">
        <h5 class="card-title font-weight-bold h5"><?php the_title(); ?></h5>
        <p class="card-text"><?php the_excerpt() ?></p>
        <p class="card-text mt-2">
            <small class="text-muted">
                <?= get_the_date(); ?> | <?= the_time( 'H:i:s' ); ?>
            </small>
        </p>
        <a href="<?= the_permalink() ?>" class="btn mt-4">Saiba mais</a>
    </div>
</li>