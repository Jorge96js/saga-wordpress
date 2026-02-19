<?php get_header(); ?>

    <main class="container main-container mt-5">


        <section class="section">
           <div class="post-content">
           <h1><?php echo the_title( ) ?></h1>
            
            <img src="<?php echo the_post_thumbnail_url( ); ?>">
            <?php echo the_content(  ) ?>
            </div>
            <?php get_sidebar(); ?>

        </section>
        
        <div class="tags">
        <?php echo the_tags( ) ?>
        </div>

    </main>
<?php get_footer(); ?>