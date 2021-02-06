<?php get_header(); 
asiathemes_breadcrumbs(); ?> 
 <!-----Blog Section------>
<section class="blog-section">
  <div class="container">
     <div class="row">
<div class="<?php if( is_active_sidebar('sidebar-data')) { echo "col-md-9"; }  else { echo "col-md-12"; } ?>">				
			<?php if ( have_posts() ) :  
				while(have_posts()) :
					the_post();
			?>
				<div class="blog-area">
				<div class="blog-post-img">
				<?php $default_thumb=array('class'=>"img-responsive");
							if(has_post_thumbnail()) { ?>
					<a href="<?php the_permalink(); ?>"><?php	the_post_thumbnail('',$default_thumb); ?></a>
					<?php } ?>
				</div>
				<div class="blog-post-detail">
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><i class="fa fa-user"></i> <?php the_author(); ?></a>
						&nbsp;&nbsp;<a href="#"><i class="fa fa-tag"></i> <?php the_tags('','businesso'); ?></a>
						<a href="#"><i class="fa fa-comment"></i><?php comments_popup_link( '0', '1', '%', '', '-'); ?></</a>
				<div class="blog-post-date"><span class="date"><?php echo get_the_date('j'); ?><small><?php echo get_the_date('M'); ?></small></span>
					</div>		
				</div>
				<div class="clear"></div>
				   <div class="blog-post-title">
					<div class="blog-post-title-wrapper">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php the_excerpt( __( 'More' , 'businesso' ) ); ?>		
						<div class="btn-left-area">
					      <a href="<?php the_permalink(); ?>" class="main-btn btn-more btn-left"><?php _e('More','businesso'); ?></a>
					  </div>
					</div>
				</div>	
			</div> 
				<?php endwhile; ?>
				<?php else : ?>
				<h2><?php _e( "Ooops!!... Post Not Found", 'businesso' ); ?></h2>
			<div class="">
			<p><?php
			_e( "Sorry, but nothing matched your search criteria. Please try again with some different keywords.", 'businesso' ); ?>
			</p>
			<?php get_search_form(); ?>
			</div><!-- .blog_con_mn -->
			<?php endif; ?>
				<!--/.blog-item-->		
			<!---Blog pagination-->
				<?php asiathemes_navigation(); ?>
			
		</div><!--/.col-sm-8-->
	
<!--------Sidebar-------------->
<?php get_sidebar(); ?>  
<!-------/Sidebar--------------->		
	</div>
</div>
</section>   
    
<!-------------Footer------------>
<?php get_footer(); ?>
<!--/copyright-->

</div> <!-- /main-wrapper -->