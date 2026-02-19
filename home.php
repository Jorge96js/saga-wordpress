<?php get_header(); ?>

<main class="container main-container">
        <div class="container-subtitle">
            <h2 class="text-left">ALL POSTS</h2>
        </div>

        <section class="section">
        <div class="posts-grid">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 4,
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1 // Añadir paginación
            );

            $entrada = new WP_Query($args);

            if ($entrada->have_posts()) :
                while ($entrada->have_posts()) : $entrada->the_post();
            ?>
                    <article class="card">
                        <a href="<?php the_permalink(); ?>">
                            <div class="card-image">
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="Post image">
                            </div>
                            <div class="card-body">
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo get_the_date(); ?></p>
                            </div>
                        </a>
                    </article>
            <?php 
                endwhile; 
            else : 
                echo '<p>No hay publicaciones disponibles.</p>';
            endif;

            // Paginación
            echo '<div class="pagination">';
            echo paginate_links(array(
                'total' => $entrada->max_num_pages,
                'mid_size' => 2,
                'prev_text' => __('« Anterior', 'textdomain'),
                'next_text' => __('Siguiente »', 'textdomain'),
            ));
            echo '</div>';

            wp_reset_postdata();
            ?>
        </div>
        
        </section>
    </main>

<?php get_footer(); ?>