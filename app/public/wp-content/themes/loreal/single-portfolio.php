<?php get_header(); ?>
<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

      <h1><?php the_title(); ?></h1>
      <?php the_breadcrumb(); ?>
      <div class="post__meta">
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
        <p>
          Publié le <?php the_date(); ?>
          par <?php the_author(); ?>
          Dans la catégorie <?php the_category(); ?>
          Avec les étiquettes <?php the_tags(); ?>
        </p>
      </div>

      <div class="post__content">
	  <?php the_content(); ?>
    <?php comments_template(); // Commentaires ?>
<p>
    <strong>Avis :</strong> 
    <?php echo get_post_meta( get_the_ID(), 'avis', true ); ?>
</p>

<p>
    <strong>Note :</strong>
    <?php echo get_post_meta( get_the_ID(), 'note', true ); ?> / 10
</p>

<div class="plus-moins">
    <div class="plus">
        <?php echo get_post_meta( get_the_ID(), 'plus', true ); ?>
    </div>
    <div class="plus">
        <?php echo get_post_meta( get_the_ID(), 'moins', true ); ?>
    </div>
</div>
      </div>
    </article>

  <?php endwhile; endif; ?>
  <div class="site__navigation">
	<div class="site__navigation__prev">
		<?php previous_post_link( 'Article Précédent<br>%link' ); ?>
    </div>
    <div class="site__navigation__next">
        <?php next_post_link( 'Article Suivant<br>%link' ); ?> 
    </div>
</div>
<?php get_footer(); ?>