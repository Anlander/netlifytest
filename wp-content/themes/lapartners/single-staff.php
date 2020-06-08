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
		<div class="right-container staff-right">
			<div class="single-staff-container">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
					<h1 class="staff-heading"><?php the_title(); ?></h1>
					<p class="staff-title"><?php the_field('title'); ?></p>

					<p><a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></p>
					<p>Phone: <?php the_field('phone_direct'); ?><br/>
						Cell: <?php the_field('phone'); ?></p>

						<hr/>
						<h2>Experience</h2>
						<p><?php the_field('experience'); ?></p>

						<div class="info-box">

							<div class="row">

	
								<?php if( have_rows('careers_repeater') ): ?>
																		
									<div class="col-sm-6">
										<h2>Career</h2>

										<?php while( have_rows('careers_repeater') ): the_row(); ?>
												<div class="info-item">
													<?php the_sub_field('career_item'); ?>
													<?php the_sub_field('career_years'); ?>
												</div>
										<?php endwhile; ?>
									</div>

								<?php endif; ?>
								
								<?php if( have_rows('education_repeater') ): ?>	

									<div class="col-sm-6">
										<h2>Education</h2>

										<?php while( have_rows('education_repeater') ): the_row(); ?>
											<div class="info-item">
												<?php the_sub_field('education_item'); ?>
												<?php the_sub_field('education_years'); ?>
											</div>
										<?php endwhile; ?>

									</div>

								<?php endif; ?>

								<?php if( have_rows('languages_repeater') ): ?>

									<div class="col-sm-6">
										<h2>Languages</h2>

										<?php while( have_rows('languages_repeater') ): the_row(); ?>
											<div class="info-item">
												<?php the_sub_field('language_item'); ?>
											</div>
										<?php endwhile; ?>
									</div>

								<?php endif; ?>	

								<?php if( have_rows('memberships_repeater') ): ?>

									<div class="col-sm-6">
										<h2>Membership</h2>
										
										<?php while( have_rows('memberships_repeater') ): the_row(); ?>
											<div class="info-item">
												<?php the_sub_field('membership_item'); ?>
											</div>
										<?php endwhile; ?>
									</div>
											
								<?php endif; ?>
						</div>
					</div>

					<?php endwhile; endif; ?>
				</div>
				<div class="single-staff-img-container">
					<img src="<?php the_field('image'); ?>" class="img-responsive" />
				</div>

	<?php get_footer(); ?>