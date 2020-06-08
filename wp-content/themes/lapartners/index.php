<?php get_header(); ?>

<section id="content">

	<div class="content-container">

		<div class="left-container">
			<div class="logo-container">
				<a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo_vertical.png" class="img-responsive" /></a>
			</div>
			<div class="first-info">
				<div class="medium-screen-logo">
					<a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/lap_symbol.png" class="img-responsive" /></a>
				</div>

				<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'first-card-menu-container', 'menu_class' => 'ul-left-menu' ) ); ?>

			</div>
		</div>
		<div id="archive" class="right-container">
			<div class="heading-container">
				<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
			</div>
			<!-- KORTEN HÄR -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="archive-container">
					<div class="img-container">
						<?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail( 'news-img-frontpage', array('class' => 'img-responsive') ); ?>
						<?php } else { ?>
						<img src="<?php echo get_template_directory_uri(); ?>/img/news_images_placement.jpg" class="img-responsive" />
						<?php } ?>


						<span class="date-title">
							<span class="month-title">
								<?php
								foreach (get_categories() as $category){
									echo $category->name;
									echo ' | ';
								} 
								?>
							</span>
						</span>
					</div>
					<div class="text-container">
						<h2><a href="<?php the_permalink(); ?>" title="Länk till <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<p><?php the_excerpt(); ?></p>

					</div>
					<div class="button-container">
						<a class="button" href="<?php the_permalink(); ?>">Läs mer »</a>
					</div>
				</div>
			<?php endwhile; endif; ?>

			<footer class="text-center">
				<?php if ( is_active_sidebar( 'footer' ) ) : ?>
					<?php dynamic_sidebar( 'footer' ); ?>
				<?php endif; ?>
			</footer>
		</div>
	</div>
</section>

<?php get_footer(); ?>


