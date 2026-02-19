<?php get_header();
$tag_slug = get_query_var('tag');

?>

<main class="container main-container">
        <div class="container-subtitle">
            <h2 class="text-left"><?php echo $tag_slug; ?></h2>
        </div>

        <section class="section">
            <div class="posts-grid">
                <?php
                    
                    $args = array(
                        'tag' => $tag_slug,
                        'posts_per_page' => -1,
                    );

                   $query = new WP_Query($args);

                    while($query->have_posts(  )): $query->the_post();   
                    ?>
                    
                    <?php get_template_part( 'template-parts/lastets-posts' ); ?>

                    <?php
                        wp_reset_postdata();
                        endwhile;
                    ?>
            </div>
        </section>
</main>

<?php get_footer(); ?>