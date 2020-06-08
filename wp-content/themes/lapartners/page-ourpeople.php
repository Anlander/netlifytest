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
		<div id="staffs" class="right-container">
			<div class="heading-container">
				<h1>Our people</h1>
			</div>
			<!-- KORTEN HÄR -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="staff-container">
					<h2><a href="<?php the_permalink(); ?>" class="button"><?php the_field('firstname'); ?><br/><?php the_field('lastname'); ?></a></h2>
					<p class="staff-title"><?php the_field('title'); ?></p>
					<div class="staff-info-container">
						<p><a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></p>
						<p>Phone: <?php the_field('phone_direct'); ?><br/>
						Cell: <?php the_field('phone'); ?></p>
					</div>
					<div class="staff-img-container">
						<img src="<?php the_field('thumb_image'); ?>" class="img-responsive" />
					</div>
				</div>
			<?php endwhile; endif; ?>

<?php get_footer(); ?>


