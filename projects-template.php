<?php
/*
 * Template Name: Projects
 */?>
<?php get_header(); ?>
    <section class="project-cta cta" aria-labelledby="project-cta__title">
        <div class="wrap bloc">
            <h2 class="cta__title project-cta__title" id="project-cta__title" role="heading" aria-level="2">
				<?= __('Nos Projets', 'fr') ?>
            </h2>
            <div class="project-cta__container">
				<?php
				$projets = new WP_Query();
				$projets->query([
					'post_type' => 'projets',
					'showposts' => '-1'
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
        </div>
    </section>

<?php get_footer(); ?>