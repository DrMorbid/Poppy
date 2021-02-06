<div class="row blog-item" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<div class="blog-page-section animate" data-anim-type="fadeInUp" data-anim-delay="400">
		 <?php
					if(have_posts()) :
					while(have_posts()) :
							the_post(); ?>
		     <div class="blog-area">
				<div class="blog-post-img">
				<?php $default_thumb=array('class'=>"img-responsive");
							if(has_post_thumbnail()) { ?>
					<a href="<?php the_permalink(); ?>"><?php	the_post_thumbnail('',$default_thumb); ?></a>
					<?php } ?>
				</div>
				<div class="blog-post-detail">
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><i class="fa fa-user"></i> <?php the_author(); ?></a>
						 &nbsp;<a href="#"><i class="fa fa-tag"></i><?php the_tags('', ', '); ?></a>
						 &nbsp;<a href="#"><i class="fa fa-comment"></i><?php comments_popup_link( '0', '1', '%', '', '-'); ?></</a>
				<div class="blog-post-date"><span class="date"><?php echo get_the_date('j'); ?><small><?php echo get_the_date('M'); ?></small></span>
					</div>		
				</div>
				<div class="clear"></div>
				   <div class="blog-post-title">
					<div class="blog-post-title-wrapper">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php the_excerpt( __( 'More' , 'businesso' ) ); wp_link_pages( array( 'before' => '<div class="blog-pagination animate" data-anim-type="fadeInLeft">' . __( 'Pages:', 'businesso' ), 'after' => '</div>' ) ); ?>		
						<div class="btn-left-area">
					      <a href="<?php the_permalink(); ?>" class="main-btn btn-more btn-left"><?php _e('More','businesso');?></a>
					  </div>
					</div>
				</div>	
			</div> 
<?php endwhile; endif; ?>			
	</div>
</div>