<footer class="footer">

        <nav class="navbar footer-nav">
            <?php

                $args = [
                    'theme_location' => 'primary_menu',
                    'container' => 'ul',
                    'container_class' => 'menu'
                ];
                
                wp_nav_menu( $args );
        ?>

        </nav>

        <div class="by">
            <p id="developed">Desarrollado Por <strong><a target="_blank" href="https://www.binaraweb.com.ar">Binaraweb</a></strong></p>
        </div>
    </footer>

    <script src="/build/js/main.js"></script>

</body>
</html>

<?php wp_footer(  ); ?>