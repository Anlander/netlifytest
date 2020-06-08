<footer style="margin-top: 70px;" class="text-center">
	<?php if ( is_active_sidebar( 'footer' ) ) : ?>
		<?php dynamic_sidebar( 'footer' ); ?>
	<?php endif; ?>
	<div class="row">
		<div class="col-sm-12">
			<?php wp_nav_menu( array( 'theme_location' => 'small-menu', 'container_class' => 'small-menu-container', 'menu_class' => 'ul-small-menu' ) ); ?>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>