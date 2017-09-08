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
				
				<?php //the_content();
                echo do_shortcode('[ngg_images source="galleries" container_ids="3" display_type="photocrati-nextgen_basic_thumbnails" override_thumbnail_settings="1" thumbnail_width="350" thumbnail_height="350" thumbnail_crop="1" images_per_page="6" number_of_columns="10" ajax_pagination="0" show_all_in_lightbox="0" use_imagebrowser_effect="0" show_slideshow_link="0" template="default" order_by="sortorder" order_direction="ASC" returns="included" maximum_entity_count="5000"]');
				?>
				               
			<?php endwhile; else: ?>
                <p><?= __('Il n&nbsp;y a pas encore de d&nbsp;images', 'fr') ?></p>
			<?php endif; ?>

        </div>


    </section>

<?php get_footer(); ?>