<?php get_header(); ?>

    <main class="container main-container">
        <div class="container-subtitle">
            <!-- Titulo para resultados de busqueda -->
            <h2 class="text-left text-2xl">Resultados para:  <?php echo get_search_query(); ?></h2>
        </div>

        <section class="section">
            <div class="posts-grid">
                <?php if(have_posts( ) ): the_post(); ?>
                    <?php while(have_posts(  )): the_post(  ); ?>
                        <?php get_template_part('template-parts/lastets-posts'); ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </section>
    </main>

<?php get_footer(); ?>
