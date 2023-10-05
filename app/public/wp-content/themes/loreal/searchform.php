<form action="<?php echo home_url( '/' ); ?>" method="get">
    <label for="search">Rechercher :</label>
    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
    <input type="image" alt="Search" style="max-width:18px;" src="<?php bloginfo( 'template_url' ); ?>/img/search.png" />
</form>