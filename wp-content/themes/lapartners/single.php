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

				<?php wp_nav_menu( array( 'theme_location' => 'left-menu', 'container_class' => 'first-card-menu-container', 'menu_class' => 'ul-left-menu' ) ); ?>

			</div>
		</div>
		<div class="right-container">
			<div class="header-container">
				<?php if ( has_post_thumbnail() ) { ?>
					<?php the_post_thumbnail('page-header', array('class' => 'img-responsive')); ?>
				<?php } else { ?>
					<img src="<?php echo get_template_directory_uri(); ?>/img/page_header_placement.jpg" class="img-responsive" />
				<?php } ?>
			</div>
			<div class="text-container">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<h1><?php the_title(); ?></h1>
					<p><?php the_content(); ?></p>
				<?php endwhile; endif; ?>
				<div class="row prev-next-container">
					<div class="col-sm-6">
						<?php previous_post_link(); ?>
					</div>
					<div class="col-sm-6 text-right">
						<?php next_post_link(); ?>
					</div>
                </div>
			</div>

<?php get_footer(); ?>