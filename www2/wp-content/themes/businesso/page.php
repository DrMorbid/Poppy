<?php get_header(); ?>
<!--------/Header--------------->
<div class="clearfix"></div>
<!-- Page Title Section -->
<?php asiathemes_breadcrumbs(); ?>
<!-- /Page Title Section -->
<!---------Blog-Section------------------------------>
<section class="blog-section">
  <div class="container">
     <div class="row">
	 <!---------Blog Area------------->
	    <div class="<?php if( is_active_sidebar('sidebar-data')) { echo "col-md-9"; }  else { echo "col-md-12"; } ?>">
		 <div class="blog-page-section">
		  <div class="blog-area animate" data-anim-type="fadeInUp" data-anim-delay="400">
				<div class="blog-post-img">
				<?php the_post(); 
								$default_img = array('class' => "img-responsive");
								if(has_post_thumbnail()) :?>
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('',$default_img); ?></a>
					<?php endif; ?>
				</div>
				<div class="blog-post-detail">
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><i class="fa fa-user"></i> <?php the_author(); ?></a>
						&nbsp;&nbsp; <a href="#"><i class="fa fa-tag"></i><?php the_tags('','businesso'); ?></a>
						&nbsp;&nbsp;<a href="#"><i class="fa fa-comment"></i><?php comments_popup_link( '0', '1', '%', '', '-'); ?></a>
				<div class="blog-post-date"><span class="date"><?php echo get_the_date('j'); ?><small><?php echo get_the_date('M'); ?></small></span>
					</div>		
				</div>
				<div class="clear"></div>
				   <div class="blog-post-title">
					<div class="blog-post-title-wrapper">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p><?php the_content(); ?><p>
					   
					</div>
				</div>	
             </div>
			 
		<!----comment Section-------->
			<?php comments_template( '', true );?>
			</div>
			 </div>		 
  <!-----Right Sidebar------------>
		<?php get_sidebar(); ?>
			
		 </div>
  </div>	
</section>

<div class="clearfix"></div>
<?php get_footer(); ?>	
</div><!-- /Close of wrapper -->  
</body>
</html>