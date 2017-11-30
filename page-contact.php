<?php

/**
 * Template Name: Contact
 */

 ?>

<?php get_header(); ?>

<div class="container">
    <!-- KONTAKT SEKTION -->
    <div class="contactsection">
        <hr class="contact-hr">
        <h1>Kontakt os her</h1>
    
        <div class="row">
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2265.5741417671584!2d10.38694701591689!3d55.40033558046054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x464cdfff36caefcb%3A0x4c76560ba9b75ed7!2sN%C3%B8rregade+71%2C+5000+Odense+C!5e0!3m2!1sda!2sdk!4v1512044925384" width="600" height="450" frameborder="0" style="border:0" allowfullscreen class="hr-lokation"></iframe>
            </div><!--col-md-6-->

            <div class="col-md-6">
                <div class="row kundesupport">
                    <div class="col-md-4">
                        <?php $image = get_field('kundesupport_img');
                        if( !empty($image) ): ?>
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                        <?php endif; ?>
                    </div><!--col-md-4-->

                    <div class="col-md-8">
                        <h3>Kunde support</h3>
                        <p>Nørregade 71, 1. th <br>
                        DK-5000 Odense C <br>
                        +45 71 99 75 80 <br>
                        kundesupport@jobview.dk</p>
                    </div><!--sol-md-8-->
                </div><!--kundesupport-->
                
                <div class="row tekniksupport top-offset-30">
                    <div class="col-md-4">
                        <?php $image = get_field('tekniksupport_img');
                        if( !empty($image) ): ?>
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                        <?php endif; ?>
                    </div><!--col-md-4-->

                    <div class="col-md-8">
                        <h3>Teknik support</h3>
                        <p>Nørregade 71, 1. th <br>
                        DK-5000 Odense C <br>
                        +45 71 99 75 80 <br>
                        tekniksupport@jobview.dk</p>
                    </div><!--col-md-8-->
                </div><!--tekniksupport-->
            </div><!--col-md-6-->
        </div><!--row-->
    </div><!--contactsection-->
    
    <!-- FAQ SEKTION -->
    <div class="faqsection top-offset-50">
        <hr class="contact-hr">
        <h2>Mangler du hurtig hjælp, check FAQ</h2>
    </div><!--faqsection-->
</div><!--container-->

<?php get_footer(); ?>