<article class="card">
    <a href="<?php the_permalink();?>">
        <div class="card-image">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr($alt_text); ?>">
        </div>
        <div class="card-body">
            <h3><?php the_title(); ?></h3>
            <p><?php echo get_the_date(); ?></p>
        </div>
    </a>
</article>