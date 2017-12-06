<?php

/**
 * Template Name: About
 */

 ?>

<?php get_header(); ?>

<!-- Mission, vision & værdier sektion -->
<div class="mvv-section">
    <?php $image = get_field('mvv_background');
    if( !empty($image) ): ?>
        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
    <?php endif; ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="widget center">
                    <div class="blur"></div>

                    <div class="text center">
                        <h3>Mission</h3>
                        <p><?php the_field('mission'); ?></p>
                    </div><!--text center-->
                </div><!--widget center-->
            </div><!--col-lg-4-->

            <div class="col-lg-4">
                <div class="widget center values">
                    <div class="blur"></div>

                    <div class="text center value">
                        <h3>Værdier</h3>
                        <p><?php the_field('values'); ?></p>
                    </div><!--text center-->
                </div><!--widget center-->
            </div><!--col-lg-4-->

            <div class="col-lg-4">
                <div class="widget center vision">
                    <div class="blur"></div>

                    <div class="text center">
                        <h3>Vision</h3>
                        <p><?php the_field('vision'); ?></p>
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
                    <span class="overline"></span>
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </div><!--col-md-6-->
            <?php endwhile; ?>
        <?php endif; ?>
    </div><!--row-->
</div><!--container-->



<!-- Jobs hos Jobview sektion -->
<div class="jobsection">
    <?php $image = get_field('jobsection_background');
    if( !empty($image) ): ?>
        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
    <?php endif; ?>

    <div class="container">
        <div class="jobsection-opslag">
            <span class="overline"></span>
            <h2>Bliv en del af vores team</h2>

            <div class="container">
                <div class="row">
                    <div class="col-lg-9 jobsection-opslag-single">
                        <div class="row">
                            <div class="col-md-4">
                                <?php $image = get_field('jobopslag_img');
                                if( !empty($image) ): ?>
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                <?php endif; ?>
                            </div><!--col-lg-3-->

                            <div class="col-md-8 tekst-opslag-single">
                                <h3>Systemudvikler til jobportalen jobview</h3>

                                <p>For ARTOGIS a/s søger vi en alsidig IT-systemudvikler, til udvikling af brugervenlige og kvalitetsbetonede For ARTOGIS a/s søger vi en alsidig IT-systemudvikler, til udvikling af brugervenlige og kvalitetsbetonede (…)</p>

                                <p class="opslag-single-info"><strong>Ansøgningsfrit:</strong> 29/12-2017<br>
                                <strong>Jobtype:</strong> Fuldtid</p>

                                <button class="jw-btn-primary">Se opslag</button>
                            </div><!--col-lg-7-->
                        </div><!--row-->
                    </div><!--jobsection-opslag-single-->

                    <div class="col-lg-9 jobsection-opslag-single">
                        <div class="row">
                            <div class="col-md-4">
                                <?php $image = get_field('jobopslag_img');
                                if( !empty($image) ): ?>
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                <?php endif; ?>
                            </div><!--col-lg-3-->

                            <div class="col-md-8 tekst-opslag-single">
                                <h3>Systemudvikler til jobportalen jobview</h3>

                                <p>For ARTOGIS a/s søger vi en alsidig IT-systemudvikler, til udvikling af brugervenlige og kvalitetsbetonede For ARTOGIS a/s søger vi en alsidig IT-systemudvikler, til udvikling af brugervenlige og kvalitetsbetonede (…)</p>

                                <p class="opslag-single-info"><strong>Ansøgningsfrit:</strong> 29/12-2017<br>
                                <strong>Jobtype:</strong> Fuldtid</p>

                                <button class="jw-btn-primary">Se opslag</button>
                            </div><!--col-lg-7-->
                        </div><!--row-->
                    </div><!--jobsection-opslag-single-->

                    <div class="col-lg-9 padding-0-btn">
                        <button class="uopfordret-btn">Søg uopfordret</button>
                    </div><!--col-lg-9-->
                </div><!--row-->
            </div><!--container-->
        </div><!--jobsection-opslag-->
    </div><!--container-->
</div><!--jobsection-->



<!-- Presseoplæg sektion -->
<div class="container press-section">
    <span class="overline"></span>
    <h2>Seneste presseoplæg</h2>

    <?php $args = array( 'post_type' => 'presse', 'posts_per_page' => 3 );
    $the_query = new WP_Query( $args ); ?>
    <?php if ( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="row press-single">
                <div class="col-xl-2 col-md-3 col-4">
                    <?php the_post_thumbnail(); ?>
                </div><!--col-md-2-->

                <div class="col-xl-10 col-md-9 col-8 d-flex align-items-center">
                    <h3><a href="<?php the_field('press_links'); ?>"><?php the_title(); ?></a></h3>
                </div><!--col-md-10-->
            </div><!--row-->
            <?php wp_reset_postdata(); ?>
        <?php endwhile; ?>
    <?php endif; ?>

    <h3><a href="<?php echo get_page_link(215); ?>">Se flere</a></h3>
</div><!--container-->


<?php get_footer(); ?>
