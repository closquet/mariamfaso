

<?php get_header(); ?>
		<section class="content__articles">
            <h2 class="page-title">Single</h2>
						
			<?php if(have_posts()): while(have_posts()): the_post();?>
				<article class="post">
					<h3 class="post__title"><?php the_title();?></h3>
					<figure class="post__thumb">
						<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						}?>
					</figure>
					<p class="post__date">Publié le <time class="post__time" datetime="<?php the_time('c');?>"><?php the_time('l j F Y');?></time>.</p>
					<div class="post__excerpt">
						<?php the_content();?>
                        <div>
							<p>Races&nbsp;: <?php ec_the_terms(', ', '<span class="post__term post__greed--:type">', '</span>', 'project_places'); ?></p>
                        </div>
                        <div>
                            <p>
                                Âge&nbsp;: <?php the_field( 'age');?> an(s)
                            </p>
                        </div>
					</div>
				</article>
			<?php endwhile; else: ?>
				<p class="content__empty">Il n'y a pas d'articles à afficher.</p>
			<?php endif;?>
		</section>
<?php get_footer(); ?>