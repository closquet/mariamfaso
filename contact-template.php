<?php
/*
 * Template Name: Contact
 */?>

<?php
$contacts = new WP_Query();
$contacts->query([
	'post_type' => 'membres',
	'showposts' => '-1'
]);
?>

<?php get_header(); ?>

    <section class="bloc contact-section" aria-labelledby="contact-section__title">
        <div class="wrap">
            </h3>
	        <?php if ($_REQUEST['sent'] == 'yes'): ?>
                <p class="contact-section__contact-form-section__sent">Votre message à bien été envoyé.</p>
	        <?php elseif($_REQUEST['sent'] == 'no'):?>
                <p class="contact-section__contact-form-section__not-sent">Veuillez s'il vous plaît remplir les trois champs correctement.</p>
	        <?php elseif($_REQUEST['sent'] == 'error'):?>
                <p class="contact-section__contact-form-section__not-sent">Une erreur s'est produite, veuillez réessayer.</p>
	        <?php elseif(!isset( $_REQUEST['sent'])):?>
	        <?php endif;?>
            <h2 class="page-title contact-section__title" id="contact-section__title" role="heading" aria-level="2">
		        <?= __('Nous contacter', 'fr') ?>
            </h2>
            <div class="contact-section__intro">
                <p>
			        <?= __('Vous pouvez nous contacter par téléphone, courrier, ', 'fr') . '<span>e-mail</span>' . __(' ou encore par le ', 'fr') . '<span>' . __('formulaire', 'fr') . '</span>' . __(' présent sur cette page.', 'fr') ?>
                </p>
            </div>

            <section class="contact-section__contacts-list-section" aria-labelledby="contact-section__contacts-list__title">
                <h3 class="contact-section__contacts-list__title" id="contact-section__contacts-list__title" role="heading" aria-level="3">
			        <?= __('Liste de contacts', 'fr') ?>
                </h3>
                <div class="contact-section__contacts-list">
			        <?php if( $contacts->have_posts() ): while( $contacts->have_posts() ): $contacts->the_post(); ?>
				        <?php if ($post->ID == '459'): ?>
                            <ul class="contact-section__contact">
                                <li class="contact-section__contact__name">
							        <?php the_title(); ?>
                                </li>
                                <li class="contact-section__contact__job">
							        <?php the_field('job');?>
                                </li>
                                <li>
                                    <img class="contact-section__contact__image" src="<?= get_field( 'picture' )['url']; ?>" alt="<?= get_field( 'picture' )['alt']; ?>" width="<?= get_field( 'picture' )['sizes']['membre-width']; ?>" height="<?= get_field( 'picture' )['sizes']['membre-height']; ?>">
                                </li>
						        <?php if (get_field( 'address')['street'] && get_field( 'address')['street_num'] && get_field( 'address')['post_code'] && get_field( 'address')['city']):?>
                                    <li>
                                        <ul class="contact-section__contact__address">
                                            <li class="contact-section__contact__address__street-and-num">
										        <?= get_field( 'address')['street'];?>, <?= get_field( 'address')['street_num'];?>
                                            </li>
                                            <li class="contact-section__contact__address__postal-code-and-city">
										        <?= get_field( 'address')['post_code'];?> <?= get_field( 'address')['city'];?>
                                            </li>
                                        </ul>
                                    </li>
						        <?php endif;?>
	                            <?php if (get_field( 'tel')): ?>
                                    <li class="contact-section__contact__tel">
                                        <a class="link" href="tel:<?php the_field('tel');?>"><?php the_field('tel');?></a>
                                    </li>
	                            <?php endif;?>
                                <?php if (get_field( 'mail')): ?>
                                    <li>
                                        <a class="contact-section__contact__email link" href="mailto:<?php the_field('mail');?>"><span><?php the_field('mail');?></span></a>
                                    </li>
						        <?php endif;?>
                            </ul>
				        <?php else:?>
                            <ul class="contact-section__contact h-card" itemprop="member" itemscope itemtype="http://schema.org/Person">
                                <li class="contact-section__contact__name p-name" itemprop="name" >
							        <?php the_title(); ?>
                                </li>
                                <li class="contact-section__contact__job p-role" itemprop="jobTitle" >
							        <?php the_field('job');?>
                                </li>
                                <li class="u-photo" itemprop="image" >
                                    <img class="contact-section__contact__image" src="<?= get_field( 'picture' )['url']; ?>" alt="<?= get_field( 'picture' )['alt']; ?>" width="<?= get_field( 'picture' )['sizes']['membre-width']; ?>" height="<?= get_field( 'picture' )['sizes']['membre-height']; ?>">
                                </li>
						        <?php if (get_field( 'address')['street'] && get_field( 'address')['street_num'] && get_field( 'address')['post_code'] && get_field( 'address')['city']):?>
                                    <li itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                        <ul class="contact-section__contact__address">
                                            <li class="contact-section__contact__address__street-and-num p-street-address" itemprop="streetAddress" itemprop="postalAddress">
										        <?= get_field( 'address')['street'];?>, <?= get_field( 'address')['street_num'];?>
                                            </li>
                                            <li class="contact-section__contact__address__postal-code-and-city">
                                                <span class=" p-postal-code" itemprop="postalCode"><?= get_field( 'address')['post_code'];?></span> <span class="p-locality" itemprop="addressLocality"><?= get_field( 'address')['city'];?></span>
                                            </li>
                                        </ul>
                                    </li>
						        <?php endif;?>
	                            <?php if (get_field( 'tel')): ?>
                                    <li class="contact-section__contact__tel p-tel" itemprop="telephone" >
                                        <a class="link" href="tel:<?php the_field('tel');?>"><?php the_field('tel');?></a>
                                    </li>
	                            <?php endif;?>
                                <?php if (get_field( 'mail')): ?>
                                    <li class="contact-section__contact__email u-email" itemprop="email" >
                                    <a class="link" href="mailto:<?php the_field('mail');?>"><span><?php the_field('mail');?></span></a>
                                    </li>
						        <?php endif;?>
                            </ul>
				        <?php endif;?>
			        <?php  endwhile;endif; ?>
                </div>
            </section>
	        <?php if($_REQUEST['sent'] == 'no'):?>
		        <?php include 'template-parts/contact-form.php'; ?>
	        <?php elseif($_REQUEST['sent'] == 'error'):?>
		        <?php include 'template-parts/contact-form.php'; ?>
	        <?php elseif(!isset( $_REQUEST['sent'])):?>
		        <?php include 'template-parts/contact-form.php'; ?>
	        <?php endif;?>
            
        </div>
    </section>

    
    <script src="<?php ec_asset( 'js/jquery.min.js' ); ?>"></script>
    <script src="<?php ec_asset( 'js/parsley.min.js' ); ?>"></script>
    <script src="<?php ec_asset( 'js/fr.js' ); ?>"></script>
    <script>
        $('#contact-form').parsley();
    </script>
<?php get_footer(); ?>