<?php get_header(); ?>
<!--------/Header--------------->
<?php asiathemes_breadcrumbs(); ?>
<div class="clearfix"></div>

<div class="error-section">		
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="error_404">
					<div class="text-center"><i class="fa fa-exclamation-circle"></i></div>
					<h1><?php _e('404','businesso');?></h1>
					<h4><?php _e('Oops! Page not found','businesso');?></h4>
					<p><?php _e('We are sorry, but the page you are looking for doesnt exist.','businesso');?></p>
					<a href="<?php echo esc_html(site_url());?>" class="main-btn btn-more text-center"><?php _e('Go Back','businesso');?></a>
				</div>
			</div>
		</div>			
	</div>
</div>

<?php get_footer(); ?>