<?php get_header(); ?>
<div class="mh-content-section">
	<div class="mh-container clearfix">
		<div id="main-content"><?php
			if (have_posts()) :
				while (have_posts()) : the_post();
					get_template_part('content', 'single');
					mh_elegance_lite_postnav();
					echo '<div class="separator separator-margin"></div>';
					comments_template();
				endwhile;
			endif; ?>
		</div>
        <?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>