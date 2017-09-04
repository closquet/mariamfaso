<?php
/*
 * Template Name: Galerie
 */?>

<?php get_header(); ?>

    <section aria-labelledby="gallery__title" class="wrap bloc gallery">
        <h2 id="gallery__title" role="heading" aria-level="2" class="page-title gallery__title">
			<?= __('Galerie', 'fr') ?>
        </h2>
        <div class="gallery__container">
			
			
			<?php if( have_posts() ): while( have_posts() ): the_post(); ?>
				
				<?= do_shortcode('[ngg_images gallery_ids="3" display_type="photocrati-nextgen_basic_thumbnails" images_per_page=3 order_by=imagedate order_direction=DESC ajax_pagination="1" ]');?>
                
			<?php endwhile; else: ?>
                <p><?= __('Il n&nbsp;y a pas encore de d&nbsp;images', 'fr') ?></p>
			<?php endif; ?>

        </div>


    </section>

<?php get_footer(); ?>