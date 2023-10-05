<?php get_header(); ?>
	<main>
	<div class="main-content">
        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

            <?php the_content(); ?>

        <?php endwhile; endif; ?>

    
        </section>

    </div>
</main>
<?php get_footer(); ?>