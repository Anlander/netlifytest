<?php 
/* 
Template name: Förstasida
*/
?>
<?php get_header(); ?>
<section id="cards">

	<div class="outer-card-container">

		<div class="card-container">
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

		<?php if( have_rows('cards_repeater') ): ?>
		
			<?php while( have_rows('cards_repeater') ): the_row(); ?>
				<div class="card-container" style="background: url(<?php the_sub_field('card_image'); ?>) top center no-repeat;">
					<div class="card-inner">
						<div class="card-info">
							<div class="heading-container">
								<h2><?php the_sub_field('card_title'); ?></h2>
							</div>
							<div class="excerpt-container">
								<p><?php the_sub_field('card_ingress'); ?></p>
								<?php if( get_sub_field('card_linktext') ) { ?>
								<a class="button" href="<?php the_sub_field('card_link'); ?>"><?php the_sub_field('card_linktext'); ?></a>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
					
		<?php endif; ?>
	</div>
</section>

<section>
	<div class="heading-container">
		<h1>Signed by LA PARTNERS</h1>
	</div>

	<div class="container">
		<div id="news">
			<?php query_posts( 'category_name=nyheter&posts_per_page=3' ); ?>
			<?php while ( have_posts() ) : the_post(); ?>
				
				<div class="news-container">
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
						<a class="button" href="<?php the_permalink(); ?>">Read more »</a>
					</div>
				</div>

			<?php endwhile; ?>

			<div class="more-news">
				<a class="button" href="<?php bloginfo('url'); ?>/category/nyheter">More from signed</a>
			</div>
		</div>
	</div>
</section>

<?php get_footer('frontpage'); ?>