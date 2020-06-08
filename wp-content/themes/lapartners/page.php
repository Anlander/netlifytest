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
			

				<div class="staff-big-container">

					<?php
					$page_id = get_the_ID();
					$i = 0;
					$args = array( 'post_type' => 'staff', 'posts_per_page' => 2000 );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); 
						$posts = get_field('relation_contact');

						if( $posts ): ?>
							<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
								<?php if ( $page_id === $p ): ?>
									<?php if ( $i < 1 ): ?>
										<div class="contact-heading">
											<h3 class="">Kontakt</h3>
										</div>
									<?php endif; ?>
									<?php $i++ ?>
									
									<div class="staff-container">
										<h2><a href="<?php the_permalink(); ?>" class="button"><?php the_field('firstname'); ?><br/><?php the_field('lastname'); ?></a></h2>
										<p class="staff-title"><?php the_field('title'); ?></p>
										<div class="staff-info-container">
											<p><a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></p>
											<p>Tel: <?php the_field('phone_direct'); ?><br/>
												Mobil: <?php the_field('phone'); ?></p>
										</div>
										<div class="staff-img-container">
											<img src="<?php the_field('thumb_image'); ?>" class="img-responsive" />
										</div>
									</div>


								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
					  
					<?php endwhile; ?>
				</div>
			</div>

<?php get_footer(); ?>