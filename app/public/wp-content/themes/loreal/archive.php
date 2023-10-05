<?php get_header(); ?>
<?php 
    if ( is_category() ) {
        $title = single_tag_title( '', false );
    }
    elseif ( is_tag() ) {
        $title = "Étiquette : " . single_tag_title( '', false );
    }
    elseif ( is_search() ) {
        $title = "Vous avez recherché : " . get_search_query();
    }
    else {
        $title = 'Le Blog';
    }
?>

  

    <main class="site__content container">
        <div class="main-content">
        <section class="applications" data-aos="fade-up"        >
            <h2 class="title title-big">
                Les applications <br>"<?php echo $title?>"
            </h2>

            <div class="cards">
                <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
                
                    <!-- Ergo Fast -->
                    <div class="card card-app">
                        <a href="<?php the_permalink(); ?>">
                            <h3><?php the_title(); ?></h3>
                            <p><?php the_excerpt(); ?></p>

                            <ul class="tags">
                                

                                <?php the_terms( get_the_ID() , 'thematique' , '<li class="active">' , '' , '</li>'); ?>
                                <?php the_terms( get_the_ID() , 'centre-interet' , '<li>' , '</li><li>' , '</li>'); ?>

                            </ul>
                            <img class="app-logo" src="img/temp/logo-ergofast.svg" >
                            <div class="card-img">
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="Ergo Fast">
                            </div>
                        </a>
                    </div>

                <?php endwhile; endif; ?>
            </div>
        </section>

        <?php the_posts_pagination(); ?>
    </div>
    <?php get_footer(); ?>
    </main>