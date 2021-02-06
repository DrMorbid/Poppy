<?php get_header(); ?>	
<!--------/Header--------------->
<div class="clearfix"></div>
<!-- Page Title Section -->
<?php asiathemes_breadcrumbs(); ?>
<!-- /Page Title Section -->
<!----Blog-Section----->
<section class="blog-section">
  <div class="container">
     <div class="row">
	 <!----Blog Area---->
	    <div class="<?php if( is_active_sidebar('sidebar-data')) { echo "col-md-9"; }  else { echo "col-md-12"; } ?>">
		 <?php get_template_part('post','content');
			   
			   $pagi = new asiathemes_pagination();
					$pagi->asiathemes_page(); ?> 			
		</div>
		<!-----Right Sidebar----->
		<?php get_sidebar();?> 	
	 </div>
  </div>
</section>

<div class="clearfix"></div>
<!-----Footer----->
<?php get_footer(); ?>