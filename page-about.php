<?php

/**
 * Template Name: About
 */

 ?>

<?php get_header(); ?>

<!-- Mission, vision & værdier sektion -->
<div class="mvv-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="widget center">
                    <div class="blur"></div>

                    <div class="text center">
                        <h3>Mission</h3>
                        <p>Jobview drømmer om at skabe en interaktiv jobportal til kunder, hvor virksomheder vil lægge deres jobopslag op på, så det kan tiltrække brugerne.</p>
                    </div><!--text center-->
                </div><!--widget center-->
            </div><!--col-lg-4-->
            
            <div class="col-lg-4">
                <div class="widget center">
                    <div class="blur"></div>

                    <div class="text center">
                        <h3>Værdier</h3>
                        <p>Interaktiv jobportal: Den førende jobportal med muligheden for at søge via et interaktivt kort, samt at kunne uploader et video CV. Netværk: Der arbejdes målrettet på at tilbyde en nyere tilgang til rekruttering. Ambition er, at der ikke skal være nogen hindring i at komme til jobsamtale. Respekt: Respekt for hinanden og for sig selv er yderst vigtigt. Derfor arbejdes der aktivt på fornyelse, og at udbyde en mere alsidigt jobportal. Ved at benytte muligheden for at uploade et video CV respekteres der at ikke alle er lige gode til at formulerer sig skriftligt, men alligevel har mindst lige så meget at byde på.</p>
                    </div><!--text center-->
                </div><!--widget center-->
            </div><!--col-lg-4-->
            
            <div class="col-lg-4">
                <div class="widget center">
                    <div class="blur"></div>

                    <div class="text center">
                        <h3>Vision</h3>
                        <p>Jobview’s vision er at blive de jobsøgendes foretrukne jobportal, hvor der konstant arbejdes på at give den bedst og mest effektive løsning på en brugervenlig måde.</p>
                    </div><!--text center-->
                </div><!--widget center-->
            </div><!--col-lg-4-->
        </div><!--row-->
    </div><!--container-->
</div><!--mvv-section-->





<!-- Om Jobview sektion -->
<div class="container about-section">
    <div class="row">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="col-lg-6 d-flex align-items-center">
                    <?php the_post_thumbnail(); ?>
                </div><!--col-md-6-->
                
                <div class="col-lg-6 about-section-txt">
                    <hr class="contact-hr">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </div><!--col-md-6-->
            <?php endwhile; ?>
        <?php endif; ?>
    </div><!--row-->
</div><!--container-->


<!-- Jobs hos Jobview sektion -->



<!-- Presseoplæg sektion -->



<?php get_footer(); ?>