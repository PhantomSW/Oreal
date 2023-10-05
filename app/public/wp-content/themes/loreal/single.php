<?php get_header(); ?>

	<div class="appli">
	<main class="container">

 <div class="main-content">
                <section class="grid main-grid" style="padding:70px;">
                    <aside class="logo">
<!-- ACF -->          <?php $id = get_post_meta( get_the_ID(), 'logo', true );
                        if($id) {
                        $image_url = wp_get_attachment_image_src($id, 'full');
                        echo '<img class="logo" src="'.$image_url[0].'">'; 
                        } else {
                        $image_url = wp_get_attachment_image_src(650, 'full');
                        echo '<img class="logo" src="'.$image_url[0].'">'; } 
                        ?>
                    </aside>

                    <section class="header">
                        <h1><?php the_title(); ?></h1>
                        <p class="chapo"><?php if (get_post_meta( get_the_ID(), 'rapide_introduction', true )) echo get_post_meta( get_the_ID(), 'rapide_introduction', true ); else echo 'Introduce your application';?></p>
                        
                        <div class="lang">
                            <a href="" class="active" title="Version française">FR</a> / <a href="" title="English version">EN</a>
                        </div>
                    </section>

                    <aside class="aside ">
                        <div class="bloc">
                            <h3 class="title">Télécharger&nbsp;:</h3>
                            <?php $lien_appli = get_post_meta( get_the_ID(), 'doc_tuto_de_lapplication', true );
                            if ($lien_appli) { $hey = $lien_appli["url"]; } else { $hey = '#'; }
                            echo '<a href="'.$hey.'" title="Télécharger le doc tuto de l\'application">Le doc tuto de l\'application</a>'; ?>
                        </div>
                        <div class="bloc">
                        
                            <h3 class="title">Application disponible sur&nbsp;:</h3>
                            <?php   $id = get_post_meta( get_the_ID(), 'disponible_sur', true );
                                    if($id) {
                                        $image_url = wp_get_attachment_image_src($id, 'full');
                                        echo '<img alt="Desktop" src="'.$image_url[0].'">'; 
                                    } else {
                                        $image_url = wp_get_attachment_image_src(649, 'full');
                                        echo '<img alt="Desktop" src="'.$image_url[0].'">'; 
                                    }
                            ?>
                        </div>
                        
                        <?php if (get_post_meta( get_the_ID(), 'qr_appli', true)) {
                            $image_url = wp_get_attachment_image_src(get_post_meta( get_the_ID(), 'qr_appli', true ), 'full');
                            echo    '<div class="code">
							        <img alt="QR Code" src="'.$image_url[0].'">
                                    <a style="color:black;" href="" class="btn">Accéder au site</a>
                                    </div>'; }
                        ?>

                        <?php if (strlen(get_post_meta( get_the_ID(), 'qr_android', true)) >= 1) {
                            $image_url = wp_get_attachment_image_src(get_post_meta( get_the_ID(), 'qr_appli', true ), 'full');
                            echo    '<div class="code">
							        <img alt="QR Code" src="'.$image_url[0].'">
                                    <a style="color:black;" href="" class="btn"><i class="fa fa-android" style="font-size:24px"></i>Installer</a>
                                    </div>'; }
                        ?>

                        <?php if (strlen(get_post_meta( get_the_ID(), 'qr_appli', true)) >= 1) {
                            $image_url = wp_get_attachment_image_src(get_post_meta( get_the_ID(), 'qr_appli', true ), 'full');
                            echo    '<div class="code">
							        <img alt="QR Code" src="'.$image_url[0].'">
                                    <a style="color:black;" href="" class="btn"><i class="fa fa-apple" aria-hidden="true"></i> Installer </a>
                                    </div>'; }
                        ?>
                    </aside>

<!-- THE CONTENT -->

                    <section class="content">
                        <?php the_content(); ?>
                    </section>
                </section>

<!-- FIN THE CONTENT -->
        <div class="single-margin">
                <!-- CARACTERISTIQUES -->
                <section class="caracteristiques" data-aos="fade-up">
                    <h2 class="title title-big">
                        Caractéristiques <br>de l'application
                    </h2>

                    <?php if (get_post_meta( get_the_ID(), 'license', true ) == 1 ) {
                  $image_url = wp_get_attachment_image_src(62, 'full');
                  echo '<div class="licence">
                          <span>Licence<br>obligatoire </span>
                          <img alt="License Obligatoire" src="'.$image_url[0].'">
                    </div>';
                } else if (get_post_meta( get_the_ID(), 'license', true ) == 0 ) {
                  $image_url = wp_get_attachment_image_src(62, 'full');
                  echo '<div class="licence">
                          <span>Licence<br>non obligatoire </span>
                          <img alt="License non Obligatoire" src="'.$image_url[0].'">
                    </div>';
                } else {
                    $image_url = wp_get_attachment_image_src(62, 'full');
                    echo '<div class="licence">
                          <span>Licence<br>non renseignée </span>
                          <img alt="License non Renseignée" src="'.$image_url[0].'">
                    </div>';
                }
                ?>

                    <ul class="lev1">
                        <li>
                            <h3>Thématique&nbsp;:</h3>
                            <?php the_terms( get_the_ID() , 'thematique' , '<span class="pill active">' , '' , '</span>'); ?>
                        </li>
                        <li></span><span>
                            <h3>Centres d'intérêt&nbsp;:</h3>
                            <?php the_terms( get_the_ID() , 'centre-interet' , '<span class="pill">' , '</span>&nbsp;<span class="pill">' , '</span>'); ?>
                        </li>
                        <li>
                            <h3>Activité cible&nbsp;:</h3>
                            <?php the_terms( get_the_ID() , 'category' , '<span class="pill">' , '</span>&nbsp;<span class="pill">' , '</span>'); ?>
                        </li>
                    </ul>

                    <ul class="lev2">
<!-- ACF -->            <li><strong>Hiérarchie cible</strong> : <u><?php echo get_post_meta( get_the_ID(), 'hierarchie_cible', true ); ?></u></li>
<!-- ACF -->            <li><strong>Accès</strong> : <?php echo get_post_meta( get_the_ID(), 'acces', true ); ?></li>
<!-- ACF -->            <li><strong>Contact</strong> : <a style="color:black;" href="<?php $lien_contact = get_post_meta( get_the_ID(), 'lien_du_contact', true ); if($lien_contact) echo $lien_contact["url"]; ?>"><?php echo get_post_meta( get_the_ID(), 'nom_du_contact', true ); ?></a></li>
<!-- ACF -->            <li><strong>Nature</strong> : <u><?php the_terms( get_the_ID() , 'nature' , '<span class="bug">' , '' , '</span>'); ?></u></li>
                        <li><strong>Licence</strong> : <u><?php if (get_post_meta( get_the_ID(), 'license', true ) == 1 ) { echo 'Obligatoire'; } else if (get_post_meta( get_the_ID(), 'license', true ) == 1 ) { echo 'Facultative'; } else { echo 'Non renseignée'; } ?></u></li>
                    </ul>
                </section>

                <!-- EVALUATIONS/COMMENTAIRES -->
                <section class="commentaires-partage" data-aos="fade-up">
                    <h2 class="title title-big">
                        Evaluations et commentaires <br>de l'application
                    </h2>

                    <!-- Evaluation -->
                    <div class="grid evaluation">
                        <!-- Stars rating -->
                        <div class="rating-stars">
                            <!-- 0.5 -->
                            <label aria-label="0.5 stars" class="rating-label rating-label--half"><i class="rating-icon rating-icon--star fa fa-star-half"></i></label>
                            
                            <!-- 1 -->
                            <label aria-label="1 star" class="rating-label"><i class="rating-icon rating-icon--star fa fa-star"></i></label>
                            
                            <!-- 1.5 -->
                            <label aria-label="1.5 stars" class="rating-label rating-label--half"><i class="rating-icon rating-icon--star fa fa-star-half"></i></label>
                            
                            <!-- 2 -->
                            <label aria-label="2 stars" class="rating-label"><i class="rating-icon rating-icon--star fa fa-star"></i></label>

                            <!-- 2.5 -->
                            <label aria-label="2.5 stars" class="rating-label rating-label--half"><i class="rating-icon rating-icon--star fa fa-star-half"></i></label>
                            
                            <!-- 3 -->
                            <label aria-label="3 stars" class="rating-label"><i class="rating-icon rating-icon--star fa fa-star"></i></label>
                            
                            <!-- 3.5 -->
                            <label aria-label="3.5 stars" class="rating-label rating-label--half"><i class="rating-icon rating-icon--star fa fa-star-half"></i></label>
                            
                            <!-- 4 -->
                            <label aria-label="4 stars" class="rating-label label-off"><i class="rating-icon rating-icon--star fa fa-star"></i></label>

                            <!-- 4.5 -->
                            <label aria-label="4.5 stars" class="rating-label label-off rating-label--half"><i class="rating-icon fa fa-star-half"></i></label>
                            
                            <!-- 5 -->
                            <label aria-label="5 stars" class="rating-label label-off"><i class="rating-icon fa fa-star"></i></label>

                            <span class="note">
                                <span>4,5</span> / 5
                            </span>
                        </div>

                        <!-- Bar rating -->
                        <div class="bars">
                            <p>Utilité</p>
                            <div class="rating-bars">
                                <!-- 0.5 -->
                                <label aria-label="0.5 bars" class="bar-label" for="bar-05"></label>
                                
                                <!-- 1 -->
                                <label aria-label="1 bars" class="bar-label" for="bar-10"></label>
                                
                                <!-- 1.5 -->
                                <label aria-label="1.5 bars" class="bar-label" for="bar-15"></label>
                                
                                <!-- 2 -->
                                <label aria-label="2 bars" class="bar-label" for="bar-20"></label>

                                <!-- 2.5 -->
                                <label aria-label="2.5 bars" class="bar-label" for="bar-25"></label>
                                
                                <!-- 3 -->
                                <label aria-label="3 bars" class="bar-label" for="bar-30"></label>
                                
                                <!-- 3.5 -->
                                <label aria-label="3.5 bars" class="bar-label" for="bar-35"></label>
                                
                                <!-- 4 -->
                                <label aria-label="4 bars" class="bar-label label-off" for="bar-40"></label>

                                <!-- 4.5 -->
                                <label aria-label="4.5 bars" class="bar-label label-off" for="bar-45"></label>
                                
                                <!-- 5 -->
                                <label aria-label="5 bars" class="bar-label label-off" for="bar-50"></label>
                            </div>

                            <p>Prise en main</p>
                            <div class="rating-bars">
                                <!-- 0.5 -->
                                <label aria-label="0.5 bars" class="bar-label" for="bar2-05"></label>
                                
                                <!-- 1 -->
                                <label aria-label="1 bars" class="bar-label" for="bar2-10"></label>
                                
                                <!-- 1.5 -->
                                <label aria-label="1.5 bars" class="bar-label" for="bar2-15"></label>
                                
                                <!-- 2 -->
                                <label aria-label="2 bars" class="bar-label" for="bar2-20"></label>

                                <!-- 2.5 -->
                                <label aria-label="2.5 bars" class="bar-label" for="bar2-25"></label>
                                
                                <!-- 3 -->
                                <label aria-label="3 bars" class="bar-label" for="bar2-30"></label>
                                
                                <!-- 3.5 -->
                                <label aria-label="3.5 bars" class="bar-label label-off" for="bar2-35"></label>
                                
                                <!-- 4 -->
                                <label aria-label="4 bars" class="bar-label label-off" for="bar2-40"></label>

                                <!-- 4.5 -->
                                <label aria-label="4.5 bars" class="bar-label label-off" for="bar2-45"></label>
                                
                                <!-- 5 -->
                                <label aria-label="5 bars" class="bar-label label-off" for="bar2-50"></label>
                            </div>
                        </div>
                    </div>

                    <hr class="separ">

                    <!-- Commentaires -->
                    <p class="number">2 commentaires</p>

                    <div class="grid bloc-comment">
                        <div class="initiales">AL</div>
                        <div class="comment">
                            <blockquote>« Une application indispensable, qui me rend bien des services au quotidien en entreprise. »</blockquote>
                            <span class="auteur">Aurélie L. 03/05/2022</span>

                            <!-- Notes -->
                            <div class="grid">
                                <div class="rating-stars">
                                    <!-- 0.5 -->
                                    <label aria-label="0.5 stars" class="rating-label rating-label--half"><i class="rating-icon rating-icon--star fa fa-star-half"></i></label>
                                    
                                    <!-- 1 -->
                                    <label aria-label="1 star" class="rating-label"><i class="rating-icon rating-icon--star fa fa-star"></i></label>
                                    
                                    <!-- 1.5 -->
                                    <label aria-label="1.5 stars" class="rating-label rating-label--half"><i class="rating-icon rating-icon--star fa fa-star-half"></i></label>
                                    
                                    <!-- 2 -->
                                    <label aria-label="2 stars" class="rating-label"><i class="rating-icon rating-icon--star fa fa-star"></i></label>

                                    <!-- 2.5 -->
                                    <label aria-label="2.5 stars" class="rating-label rating-label--half"><i class="rating-icon rating-icon--star fa fa-star-half"></i></label>
                                    
                                    <!-- 3 -->
                                    <label aria-label="3 stars" class="rating-label"><i class="rating-icon rating-icon--star fa fa-star"></i></label>
                                    
                                    <!-- 3.5 -->
                                    <label aria-label="3.5 stars" class="rating-label rating-label--half"><i class="rating-icon rating-icon--star fa fa-star-half"></i></label>
                                    
                                    <!-- 4 -->
                                    <label aria-label="4 stars" class="rating-label"><i class="rating-icon rating-icon--star fa fa-star"></i></label>

                                    <!-- 4.5 -->
                                    <label aria-label="4.5 stars" class="rating-label label-off rating-label--half"><i class="rating-icon rating-icon--star fa fa-star-half"></i></label>
                                    
                                    <!-- 5 -->
                                    <label aria-label="5 stars" class="rating-label label-off"><i class="rating-icon fa fa-star"></i></label>
                                </div>
                                <div class="bars">
                                    <p>Utilité</p>
                                    <div class="rating-bars">
                                        <!-- 0.5 -->
                                        <label aria-label="0.5 bars" class="bar-label" for="bar-05"></label>
                                        
                                        <!-- 1 -->
                                        <label aria-label="1 bars" class="bar-label" for="bar-10"></label>
                                        
                                        <!-- 1.5 -->
                                        <label aria-label="1.5 bars" class="bar-label" for="bar-15"></label>
                                        
                                        <!-- 2 -->
                                        <label aria-label="2 bars" class="bar-label" for="bar-20"></label>

                                        <!-- 2.5 -->
                                        <label aria-label="2.5 bars" class="bar-label" for="bar-25"></label>
                                        
                                        <!-- 3 -->
                                        <label aria-label="3 bars" class="bar-label" for="bar-30"></label>
                                        
                                        <!-- 3.5 -->
                                        <label aria-label="3.5 bars" class="bar-label" for="bar-35"></label>
                                        
                                        <!-- 4 -->
                                        <label aria-label="4 bars" class="bar-label label-off" for="bar-40"></label>

                                        <!-- 4.5 -->
                                        <label aria-label="4.5 bars" class="bar-label label-off" for="bar-45"></label>
                                        
                                        <!-- 5 -->
                                        <label aria-label="5 bars" class="bar-label label-off" for="bar-50"></label>
                                    </div>

                                    <p>Prise en main</p>
                                    <div class="rating-bars">
                                        <!-- 0.5 -->
                                        <label aria-label="0.5 bars" class="bar-label" for="bar2-05"></label>
                                        
                                        <!-- 1 -->
                                        <label aria-label="1 bars" class="bar-label" for="bar2-10"></label>
                                        
                                        <!-- 1.5 -->
                                        <label aria-label="1.5 bars" class="bar-label" for="bar2-15"></label>
                                        
                                        <!-- 2 -->
                                        <label aria-label="2 bars" class="bar-label" for="bar2-20"></label>

                                        <!-- 2.5 -->
                                        <label aria-label="2.5 bars" class="bar-label" for="bar2-25"></label>
                                        
                                        <!-- 3 -->
                                        <label aria-label="3 bars" class="bar-label" for="bar2-30"></label>
                                        
                                        <!-- 3.5 -->
                                        <label aria-label="3.5 bars" class="bar-label label-off" for="bar2-35"></label>
                                        
                                        <!-- 4 -->
                                        <label aria-label="4 bars" class="bar-label label-off" for="bar2-40"></label>

                                        <!-- 4.5 -->
                                        <label aria-label="4.5 bars" class="bar-label label-off" for="bar2-45"></label>
                                        
                                        <!-- 5 -->
                                        <label aria-label="5 bars" class="bar-label label-off" for="bar2-50"></label>
                                    </div>
                                </div>
                            </div>
                            
                            <p>Ergo Fast Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem … <a href="" title="Lire le commentaire">Voir plus</a></p>
                        </div>
                    </div>

                    <div class="grid bloc-comment">
                        <div class="initiales">AL</div>
                        <div class="comment">
                            <blockquote>« Depuis sa sortie, c’est tout simplement mon compagnon au quotidien ! »</blockquote>
                            <span class="auteur">Matthieu B. 28/03/2022</span>

                            <!-- Notes -->
                            <div class="grid">
                                <div class="rating-stars">
                                    <!-- 0.5 -->
                                    <label aria-label="0.5 stars" class="rating-label rating-label--half"><i class="rating-icon rating-icon--star fa fa-star-half"></i></label>
                                    
                                    <!-- 1 -->
                                    <label aria-label="1 star" class="rating-label"><i class="rating-icon rating-icon--star fa fa-star"></i></label>
                                    
                                    <!-- 1.5 -->
                                    <label aria-label="1.5 stars" class="rating-label rating-label--half"><i class="rating-icon rating-icon--star fa fa-star-half"></i></label>
                                    
                                    <!-- 2 -->
                                    <label aria-label="2 stars" class="rating-label"><i class="rating-icon rating-icon--star fa fa-star"></i></label>

                                    <!-- 2.5 -->
                                    <label aria-label="2.5 stars" class="rating-label rating-label--half"><i class="rating-icon rating-icon--star fa fa-star-half"></i></label>
                                    
                                    <!-- 3 -->
                                    <label aria-label="3 stars" class="rating-label"><i class="rating-icon rating-icon--star fa fa-star"></i></label>
                                    
                                    <!-- 3.5 -->
                                    <label aria-label="3.5 stars" class="rating-label rating-label--half"><i class="rating-icon rating-icon--star fa fa-star-half"></i></label>
                                    
                                    <!-- 4 -->
                                    <label aria-label="4 stars" class="rating-label"><i class="rating-icon rating-icon--star fa fa-star"></i></label>

                                    <!-- 4.5 -->
                                    <label aria-label="4.5 stars" class="rating-label label-off rating-label--half"><i class="rating-icon rating-icon--star fa fa-star-half"></i></label>
                                    
                                    <!-- 5 -->
                                    <label aria-label="5 stars" class="rating-label label-off"><i class="rating-icon fa fa-star"></i></label>
                                </div>
                                <div class="bars">
                                    <p>Utilité</p>
                                    <div class="rating-bars">
                                        <!-- 0.5 -->
                                        <label aria-label="0.5 bars" class="bar-label" for="bar-05"></label>
                                        
                                        <!-- 1 -->
                                        <label aria-label="1 bars" class="bar-label" for="bar-10"></label>
                                        
                                        <!-- 1.5 -->
                                        <label aria-label="1.5 bars" class="bar-label" for="bar-15"></label>
                                        
                                        <!-- 2 -->
                                        <label aria-label="2 bars" class="bar-label" for="bar-20"></label>

                                        <!-- 2.5 -->
                                        <label aria-label="2.5 bars" class="bar-label" for="bar-25"></label>
                                        
                                        <!-- 3 -->
                                        <label aria-label="3 bars" class="bar-label" for="bar-30"></label>
                                        
                                        <!-- 3.5 -->
                                        <label aria-label="3.5 bars" class="bar-label" for="bar-35"></label>
                                        
                                        <!-- 4 -->
                                        <label aria-label="4 bars" class="bar-label label-off" for="bar-40"></label>

                                        <!-- 4.5 -->
                                        <label aria-label="4.5 bars" class="bar-label label-off" for="bar-45"></label>
                                        
                                        <!-- 5 -->
                                        <label aria-label="5 bars" class="bar-label label-off" for="bar-50"></label>
                                    </div>

                                    <p>Prise en main</p>
                                    <div class="rating-bars">
                                        <!-- 0.5 -->
                                        <label aria-label="0.5 bars" class="bar-label" for="bar2-05"></label>
                                        
                                        <!-- 1 -->
                                        <label aria-label="1 bars" class="bar-label" for="bar2-10"></label>
                                        
                                        <!-- 1.5 -->
                                        <label aria-label="1.5 bars" class="bar-label" for="bar2-15"></label>
                                        
                                        <!-- 2 -->
                                        <label aria-label="2 bars" class="bar-label" for="bar2-20"></label>

                                        <!-- 2.5 -->
                                        <label aria-label="2.5 bars" class="bar-label" for="bar2-25"></label>
                                        
                                        <!-- 3 -->
                                        <label aria-label="3 bars" class="bar-label" for="bar2-30"></label>
                                        
                                        <!-- 3.5 -->
                                        <label aria-label="3.5 bars" class="bar-label label-off" for="bar2-35"></label>
                                        
                                        <!-- 4 -->
                                        <label aria-label="4 bars" class="bar-label label-off" for="bar2-40"></label>

                                        <!-- 4.5 -->
                                        <label aria-label="4.5 bars" class="bar-label label-off" for="bar2-45"></label>
                                        
                                        <!-- 5 -->
                                        <label aria-label="5 bars" class="bar-label label-off" for="bar2-50"></label>
                                    </div>
                                </div>
                            </div>
                            
                            <p>Ergo Fast Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem … <a href="" title="Lire le commentaire">Voir plus</a></p>
                        </div>
                    </div>
                </section>

                <!-- PARTAGE EVALUATION -->
                <section class="commentaires-partage" data-aos="fade-up">

                    <h2 class="title title-big">
                        Partagez votre évaluation <br>sur l'application
                    </h2>

                    <!-- Stars rating -->
                    <div class="rating-stars">
                        <p>Votre note globale</p>

                        <!-- 0 -->
                        <input class="rating-input rating-input--none" checked name="rating" id="rating-0" value="0" type="radio">
                        <label aria-label="0 stars" class="rating-label" for="rating-0"></label>

                        <!-- 0.5 -->
                        <label aria-label="0.5 stars" class="rating-label rating-label--half" for="rating-05"><i class="rating-icon rating-icon--star fa fa-star-half"></i></label>
                        <input class="rating-input" name="rating" id="rating-05" value="0.5" type="radio">
                        
                        <!-- 1 -->
                        <label aria-label="1 star" class="rating-label" for="rating-10"><i class="rating-icon rating-icon--star fa fa-star"></i></label>
                        <input class="rating-input" name="rating" id="rating-10" value="1" type="radio">
                        
                        <!-- 1.5 -->
                        <label aria-label="1.5 stars" class="rating-label rating-label--half" for="rating-15"><i class="rating-icon rating-icon--star fa fa-star-half"></i></label>
                        <input class="rating-input" name="rating" id="rating-15" value="1.5" type="radio">
                        
                        <!-- 2 -->
                        <label aria-label="2 stars" class="rating-label" for="rating-20"><i class="rating-icon rating-icon--star fa fa-star"></i></label>
                        <input class="rating-input" name="rating" id="rating-20" value="2" type="radio">

                        <!-- 2.5 -->
                        <label aria-label="2.5 stars" class="rating-label rating-label--half" for="rating-25"><i class="rating-icon rating-icon--star fa fa-star-half"></i></label>
                        <input class="rating-input" name="rating" id="rating-25" value="2.5" type="radio">
                        
                        <!-- 3 -->
                        <label aria-label="3 stars" class="rating-label" for="rating-30"><i class="rating-icon rating-icon--star fa fa-star"></i></label>
                        <input class="rating-input" name="rating" id="rating-30" value="3" type="radio">
                        
                        <!-- 3.5 -->
                        <label aria-label="3.5 stars" class="rating-label rating-label--half" for="rating-35"><i class="rating-icon rating-icon--star fa fa-star-half"></i></label>
                        <input class="rating-input" name="rating" id="rating-35" value="3.5" type="radio">
                        
                        <!-- 4 -->
                        <label aria-label="4 stars" class="rating-label" for="rating-40"><i class="rating-icon rating-icon--star fa fa-star"></i></label>
                        <input class="rating-input" name="rating" id="rating-40" value="4" type="radio">

                        <!-- 4.5 -->
                        <label aria-label="4.5 stars" class="rating-label rating-label--half" for="rating-45"><i class="rating-icon rating-icon--star fa fa-star-half"></i></label>
                        <input class="rating-input" name="rating" id="rating-45" value="4.5" type="radio">
                        
                        <!-- 5 -->
                        <label aria-label="5 stars" class="rating-label" for="rating-50"><i class="rating-icon rating-icon--star fa fa-star"></i></label>
                        <input class="rating-input" name="rating" id="rating-50" value="5" type="radio">
                    </div>

                    <!-- Bar rating -->
                    <div class="grid bars">
                        <div>
                            <p>Utilité</p>
                            <div class="rating-bars">
                                <!-- 0 -->
                                <input class="bar-input bar-input--none" checked name="bar-util" id="bar-0" value="0" type="radio">
                                <label aria-label="0 bars" class="bar-label" for="bar-0">&nbsp;</label>

                                <!-- 0.5 -->
                                <label aria-label="0.5 bars" class="bar-label" for="bar-05"></label>
                                <input class="bar-input" name="bar-util" id="bar-05" value="0.5" type="radio">
                                
                                <!-- 1 -->
                                <label aria-label="1 bars" class="bar-label" for="bar-10"></label>
                                <input class="bar-input" name="bar-util" id="bar-10" value="1" type="radio">
                                
                                <!-- 1.5 -->
                                <label aria-label="1.5 bars" class="bar-label" for="bar-15"></label>
                                <input class="bar-input" name="bar-util" id="bar-15" value="1.5" type="radio">
                                
                                <!-- 2 -->
                                <label aria-label="2 bars" class="bar-label" for="bar-20"></label>
                                <input class="bar-input" name="bar-util" id="bar-20" value="2" type="radio">

                                <!-- 2.5 -->
                                <label aria-label="2.5 bars" class="bar-label" for="bar-25"></label>
                                <input class="bar-input" name="bar-util" id="bar-25" value="2.5" type="radio">
                                
                                <!-- 3 -->
                                <label aria-label="3 bars" class="bar-label" for="bar-30"></label>
                                <input class="bar-input" name="bar-util" id="bar-30" value="3" type="radio">
                                
                                <!-- 3.5 -->
                                <label aria-label="3.5 bars" class="bar-label" for="bar-35"></label>
                                <input class="bar-input" name="bar-util" id="bar-35" value="3.5" type="radio">
                                
                                <!-- 4 -->
                                <label aria-label="4 bars" class="bar-label" for="bar-40"></label>
                                <input class="bar-input" name="bar-util" id="bar-40" value="4" type="radio">

                                <!-- 4.5 -->
                                <label aria-label="4.5 bars" class="bar-label" for="bar-45"></label>
                                <input class="bar-input" name="bar-util" id="bar-45" value="4.5" type="radio">
                                
                                <!-- 5 -->
                                <label aria-label="5 bars" class="bar-label" for="bar-50"></label>
                                <input class="bar-input" name="bar-util" id="bar-50" value="5" type="radio">
                            </div>
                        </div>
                        
                        <div>
                            <p>Prise en main</p>
                            <div class="rating-bars">
                                <!-- 0 -->
                                <input class="bar-input bar-input--none" checked name="bar-prise" id="bar2-0" value="0" type="radio">
                                <label aria-label="0 bars" class="bar-label" for="bar2-0">&nbsp;</label>

                                <!-- 0.5 -->
                                <label aria-label="0.5 bars" class="bar-label" for="bar2-05"></label>
                                <input class="bar-input" name="bar-prise" id="bar2-05" value="0.5" type="radio">
                                
                                <!-- 1 -->
                                <label aria-label="1 bars" class="bar-label" for="bar2-10"></label>
                                <input class="bar-input" name="bar-prise" id="bar2-10" value="1" type="radio">
                                
                                <!-- 1.5 -->
                                <label aria-label="1.5 bars" class="bar-label" for="bar2-15"></label>
                                <input class="bar-input" name="bar-prise" id="bar2-15" value="1.5" type="radio">
                                
                                <!-- 2 -->
                                <label aria-label="2 bars" class="bar-label" for="bar2-20"></label>
                                <input class="bar-input" name="bar-prise" id="bar2-20" value="2" type="radio">

                                <!-- 2.5 -->
                                <label aria-label="2.5 bars" class="bar-label" for="bar2-25"></label>
                                <input class="bar-input" name="bar-prise" id="bar2-25" value="2.5" type="radio">
                                
                                <!-- 3 -->
                                <label aria-label="3 bars" class="bar-label" for="bar2-30"></label>
                                <input class="bar-input" name="bar-prise" id="bar2-30" value="3" type="radio">
                                
                                <!-- 3.5 -->
                                <label aria-label="3.5 bars" class="bar-label" for="bar2-35"></label>
                                <input class="bar-input" name="bar-prise" id="bar2-35" value="3.5" type="radio">
                                
                                <!-- 4 -->
                                <label aria-label="4 bars" class="bar-label" for="bar2-40"></label>
                                <input class="bar-input" name="bar-prise" id="bar2-40" value="4" type="radio">

                                <!-- 4.5 -->
                                <label aria-label="4.5 bars" class="bar-label" for="bar2-45"></label>
                                <input class="bar-input" name="bar-prise" id="bar2-45" value="4.5" type="radio">
                                
                                <!-- 5 -->
                                <label aria-label="5 bars" class="bar-label" for="bar2-50"></label>
                                <input class="bar-input" name="bar-prise" id="bar2-50" value="5" type="radio">
                            </div>
                        </div>
                    </div>

                    <form>
                        <input type="text" class="form-control" placeholder="Titre de votre commentaire">
                        <textarea class="textarea" placeholder="Votre commentaire"></textarea>

                        <!-- Button -->
                        <p class="text-right">
                            <button type="submit" class="btn btn-orange">Laisser votre évaluation</button>
                        </p>
                    </form>
                    
                </section>

                <!-- RECHERCHE -->
                <section class="search" data-aos="fade-up">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Trouver une application : tapez les premières lettres de son nom...">
                            <i class="icon fa-solid fa-magnifying-glass"></i>
                        </div>

                        <label>Rechercher une application par critères :</label>
                        <div class="filtres">
                            <select multiple="multiple" class="form-select select-thematique">
                                <option value="ergonomie">Ergonomie</option>
                                <option value="audit">Audit</option>
                                <option value="risques-chimiques">Risques chimiques</option>
                                <option value="conduite">Conduite</option>
                                <option value="risques-generaux">Risques généraux</option>
                                <option value="life">LIFE</option>
                                <option value="proprioception">Proprioception</option>
                            </select>

                            <select multiple="multiple" class="form-select select-interet">
                                <option value="safe">Safe at work, safe at home</option>
                                <option value="maitrise-risques">Maîtrise des risques</option>
                                <option value="bien-etre">Bien-être</option>
                                <option value="technologies">Nouvelles technologies</option>
                            </select>

                            <select multiple="multiple" class="form-select select-activite">
                                <option value="usine">Usine</option>
                                <option value="entrepot">Entrepôt</option>
                                <option value="ri">R&I</option>
                                <option value="sales">Sales</option>
                                <option value="stores">Stores</option>
                                <option value="administration">Administration</option>
                                <option value="institutes">Instituts</option>
                                <option value="thermes">Thermes</option>
                                <option value="formations">Formations</option>
                            </select>

                            <button type="submit" class="btn btn-orange">Valider</button>
                        </div>
                        
                    </form>
                </section>

                <hr class="separ">

                <!-- AUTRES APPLICATIONS -->
                <section class="autres-applications" data-aos="fade-up">
                    <h2 class="title title-big">
                        Autres applications <br>qui pourraient également vous intéresser
                    </h2>

                    <!-- Filtres -->
                    <div class="caracteristiques inner">
                    <ul class="lev1">
                        <li>
                            <h3>Thématique&nbsp;:</h3>
                            <?php the_terms( get_the_ID() , 'thematique' , '<span class="pill active">' , '' , '</span>'); ?>
                        </li>
                        <li></span><span>
                            <h3>Centres d'intérêt&nbsp;:</h3>
                            <?php the_terms( get_the_ID() , 'centre-interet' , '<span class="pill">' , '</span>&nbsp;<span class="pill">' , '</span>'); ?>
                        </li>
                        <li>
                            <h3>Activité cible&nbsp;:</h3>
                            <?php the_terms( get_the_ID() , 'category' , '<span class="pill">' , '</span>&nbsp;<span class="pill">' , '</span>'); ?>
                        </li>
                    </ul>
                    </div>
</div> <!-- margin -->

                    <!-- Swiper cards -->
                    <div class="swiper swiper-apps">
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <div class="card card-app">
                                    <a href="application.php">
                                        <h3>Ergo Capt</h3>
                                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque, eaque culpa molestiae nulla.</p>
                                        <ul class="tags">
                                            <li class="active">Ergonomie</li>
                                            <li>Bien-être</li>
                                            <li>Centrale</li>
                                        </ul>
                                        <img class="app-logo" src="img/temp/logo-ergocapt.svg" alt="Ergo Capt">
                                        <div class="card-img">
                                            <img src="img/temp/visuel-ergocapt.jpg" alt="Ergo Capt">
                                        </div>
                                    </a>
                                    
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card card-app">
                                    <a href="application.php">
                                        <h3>Ergonomic Attitude</h3>
                                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque, eaque culpa molestiae nulla.</p>
                                        <ul class="tags">
                                            <li class="active">Ergonomie</li>
                                            <li>Bien-être</li>
                                            <li>Centrale</li>
                                        </ul>
                                        <img class="app-logo" src="img/temp/logo-ergoattitude.svg" alt="Ergonomic Attitude">
                                        <div class="card-img">
                                            <img src="img/temp/visuel-ergoattitude.jpg" alt="Ergonomic Attitude">
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card card-app">
                                    <a href="application.php">
                                        <h3>Vitality for all</h3>
                                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque, eaque culpa molestiae nulla.</p>
                                        <ul class="tags">
                                            <li class="active">Bien-être</li>
                                            <li>Centrale</li>
                                        </ul>
                                        <img class="app-logo" src="img/temp/logo-vitality.svg" alt="Vitality for all">
                                        <div class="card-img">
                                            <img src="img/temp/visuel-vitality.jpg" alt="Vitality for all">
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card card-app">
                                    <a href="application.php">
                                        <h3>Women in safety</h3>
                                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque, eaque culpa molestiae nulla.</p>
                                        <ul class="tags">
                                            <li class="active">Bien-être</li>
                                            <li>Centrale</li>
                                        </ul>
                                        <img class="app-logo" src="img/temp/logo-womensafety.svg" alt="Women in safety">
                                        <div class="card-img">
                                            <img src="img/temp/visuel-womensafety.jpg" alt="Women in safety">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </section>
            </div>


            <?php the_posts_pagination(); ?>
			<?php get_footer(); ?>
			</div>


			<!-- JS -->
			<script>
            // Carousel modal
            var swiper1 = new Swiper('.swiper-visuels', {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 0,
                mousewheel: true,
                
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });

            // Swiper apps
            var swiper2 = new Swiper('.swiper-apps', {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 0,
                mousewheel: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2
                    },
                    992: {
                        slidesPerView: 3,
                        spaceBetween: 10
                    },
                    1200: {
                        slidesPerView: 3,
                        spaceBetween: 20
                    }
                }
            });
        </script>

        <script>
            MicroModal.init({
                openTrigger: 'data-custom-open',
                closeTrigger: 'data-custom-close',
                openClass: 'is-open',
                disableScroll: true,
                disableFocus: false,
                awaitOpenAnimation: false,
                awaitCloseAnimation: false,
            });
        </script>

            
        </main>

        <!-- FOOT -->


        

    </body>
</html>