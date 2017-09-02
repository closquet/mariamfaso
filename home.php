<?php //setlocale(LC_ALL, 'fr_BE.utf8'); ?>
<?php get_header(); ?>

        
        <section aria-labelledby="intro__title" class=" bloc intro">
            <h2 id="intro__title" role="heading" aria-level="2" class="page-title intro__title">
                <?= __('Qui sommes-nous', 'fr') . '&nbsp;?' ?>
            </h2>
            <p class="intro__content">
                <?= __('Née à Bastogne en 2002, Mariam Faso est une ASBL qui met en place et soutien des projets de développement et qui encourage les échanges nord-sud.', 'fr'); ?>
            </p>
            <p class="intro__content">
                <?= __('Son activité se concentre dans les villages situés au nord-ouest et au centre du Burkina Faso et sud au Maroc.', 'fr') ?>
            </p>
            <a class="btn intro__btn" href="/a-propos">
                <?= __('En savoir plus', 'fr'); ?>
            </a>
        </section>
        <section aria-labelledby="project-cta__title" class="wrap bloc project-cta">
            <h2 id="project-cta__title" role="heading" aria-level="2" class="page-title project-cta__title">
                <?= __('Nos derniers projets', 'fr') . '&nbsp;?' ?>
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
                    <article aria-labelledby="project-cta__article__title" class="project-cta__article">
                        <h3 id="project-cta__article__title" role="heading" aria-level="3" class="page-title project-cta__article__title">
				            <?php the_title(); ?>
                        </h3>
			            <?php the_post_thumbnail('my_thumbnail', ['class' => 'project-cta__article__thumbnail']); ?>
                        <time class="project-cta__article__date" datetime="<?php ec_the_html_date_field('start_date') ; ?>">
	                        <?php the_field('start_date') ; ?>
                        </time>
                        <p class="project-cta__article__teasing">
	                        <?php the_field( 'teasing'); ?>
                        </p>
                        <a class="link read-more project-cta__article__link" href="<?= get_permalink() ?>">
                            Voir le projet
                            <span class="visually-hidden"> <?php the_title(); ?></span>
                        </a>
                    </article>
	            <?php endwhile; else: ?>
                    <p><?= __('Il n\'y a pas encore de projets', 'fr') ?></p>
	            <?php endif; ?>
            </div>
            <div class="center">
                <a class="btn dark-btn project-cta__btn" href="/projets">
		            <?= __('Tous les  projets', 'fr'); ?>
                </a>
            </div>
            
        </section>
       


<?php get_footer(); ?>