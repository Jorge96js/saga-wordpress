<?php get_header( );?>

    <header class="header">

        <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 1,
                'orderby'        => 'rand',
                'order'          => 'DESC'
            );

            $mainCard = new WP_Query($args);

            if($mainCard->have_posts()):
                while($mainCard->have_posts()): $mainCard->the_post();
                $thumbnail_id = get_post_thumbnail_id();
                $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
            ?>

        <a href="<?php echo the_permalink(  )?>" class="main-card card">
            <div>
                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr($alt_text); ?>">
                <div class="card-body">
                    <h3><?php the_title() ?></h3>
                </div>
            </div>
        </a>

            <?php 
                endwhile;
                 wp_reset_postdata(  );    
            endif;
            ?>

        <div class="grid-header">

        <?php 
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 4,
                'orderby' => 'rand'
            );

            $lastestPosts = new WP_Query($args);

            if($lastestPosts->have_posts()):

                while($lastestPosts->have_posts()) : $lastestPosts->the_post();
                    $thumbnail_id = get_post_thumbnail_id();
                    $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
                ?>
                
                    <div class="box">
                        <a href="<?php the_permalink(); ?>">
                            <div class="card">
                                <img src="<?php echo the_post_thumbnail_url(  ) ?>" alt="<?php echo esc_attr($alt_text); ?>">
                                <div class="card-body">
                                    <h3><?php the_title(); ?></h3>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php
                endwhile;
                wp_reset_postdata(); 
            endif; 
            ?>
            
        </div>
    </header>

    <main class="container main-container">
        <div class="container-subtitle">
            <h2 class="text-left">Lastest Posts</h2>
        </div>

        <section class="section">
            <div class="forntpage__posts">
                    <div class="posts-grid">
                <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 4,
                        'paged' => get_query_var('paged') ? get_query_var('paged') : 1 // Añadir paginación
                    );

                    $entrada = new WP_Query($args);

                    while($entrada->have_posts()):
                        $entrada->the_post();
                        $thumbnail_id = get_post_thumbnail_id();
                        $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
                ?>

                    <?php get_template_part('template-parts/lastets-posts'); ?>


                <?php 
                    endwhile;
                    wp_reset_postdata();
                ?>

                </div>
                <a href="<?php echo esc_html("/all-posts"); ?>" class="main-btn">show more</a>

            </div>
                <?php get_sidebar(); ?>

        </section>
    </main>

<?php get_footer( );?>