<?php //setlocale(LC_ALL, 'fr_BE.utf8'); ?>
<?php get_header(); ?>

        
        <section class="intro" aria-labelledby="intro__title">
            <div class="bloc">
                <h2 class="intro__title" id="intro__title" role="heading" aria-level="2">
		            <?= __('Qui sommes-nous', 'fr') . '&nbsp;?' ?>
                </h2>
                <div class="intro__content">
                    <p>
		                <?= __('Née à Bastogne en 2002, Mariam Faso est une ASBL qui met en place et soutien des projets de développement et qui encourage les échanges nord-sud.', 'fr'); ?>
                    </p>
                    <p>
		                <?= __('Son activité se concentre dans les villages situés au nord-ouest et au centre du Burkina Faso et sud au Maroc.', 'fr') ?>
                    </p>
                </div>
                
                <a class="btn dark-btn" href="/a-propos">
		            <?= __('En savoir plus', 'fr'); ?>
                </a>
            </div>
            
        </section>

        <section class="project-cta cta" aria-labelledby="project-cta__title">
            <div class="wrap bloc">
                <h2 class="cta__title project-cta__title" id="project-cta__title" role="heading" aria-level="2">
		            <?= __('Projets récents', 'fr') ?>
                </h2>
                <div class="project-cta__container">
		            <?php
		            $projets = new WP_Query();
		            $projets->query([
			            'post_type' => 'projets',
			            'showposts' => '3'
		            ]);
		            ?>
		            <?php if( $projets->have_posts() ): while( $projets->have_posts() ): $projets->the_post(); ?>
                        <article aria-labelledby="project-cta__article__title" class="h-entry project-cta__article">
                            <h3 id="project-cta__article__title" role="heading" aria-level="3" class="p-name page-title project-cta__article__title">
					            <?php the_title(); ?>
                            </h3>
				            <?php the_post_thumbnail('my_thumbnail', ['class' => 'project-cta__article__thumbnail']); ?>
                            <time class="dt-published project-cta__article__date" datetime="<?php ec_the_html_date_field('start_date') ; ?>">
					            <?php the_field('start_date') ; ?>
                            </time>
                            <p class="p-summary project-cta__article__teasing">
					            <?php the_field( 'teasing'); ?>
                            </p>
                            <a class="u-url link read-more project-cta__article__link" href="<?= get_permalink() ?>">
                                Voir le projet
                                <span class="visually-hidden"> <?php the_title(); ?></span>
                            </a>
                        </article>
		            <?php endwhile; else: ?>
                        <p><?= __('Il n\'y a pas encore de projets', 'fr') ?></p>
		            <?php endif; ?>
                </div>
                <a class="btn dark-btn project-cta__btn" href="/projets">
		            <?= __('Tous les  projets', 'fr'); ?>
                </a>
            </div>
        </section>

        <section class="cta gallery-cta" aria-labelledby="gallery-cta__title">
            <div class="wrap bloc">
                <h2 class="cta__title gallery-cta__title" id="gallery-cta__title" role="heading" aria-level="2">
		            <?= __('En images', 'fr') ?>
                </h2>
                <div class="gallery-cta__container">
		            <?= do_shortcode('[ngg_images gallery_ids="3" display_type="photocrati-nextgen_basic_thumbnails" maximum_entity_count=3 images_per_page=3 disable_pagination=1 order_by=imagedate order_direction=ASC" number_of_columns="10"]');?>
                </div>
                <a class="btn dark-btn" href="/galerie">
		            <?= __('Toutes les photos', 'fr'); ?>
                </a>
            </div>
        </section>



<?php get_footer(); ?>