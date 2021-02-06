<?php get_header(); ?>
<div class="mh-content-section clearfix">
	<div class="mh-container">
		<div id="main-content">
			<?php mh_elegance_lite_before_page_content(); ?>
        	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php get_template_part('content'); ?>
			<?php endwhile; ?>
			<?php mh_elegance_lite_pagination(); ?>
			<?php else : ?>
				<?php get_template_part('content', 'none'); ?>
			<?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>