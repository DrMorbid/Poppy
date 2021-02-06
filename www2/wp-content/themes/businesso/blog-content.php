<?php
$businesso_options=theme_default_data(); 
$home_latest_post_option = wp_parse_args(  get_option( 'businesso_option', array() ), $businesso_options );
		global $i; $norecord=1;
					$k=1;
				$count_posts= esc_attr($home_latest_post_option['post_display_count']);
				if(have_posts()) :
				$args = array('post_type' => 'post' ,'posts_per_page'=>$count_posts, 'post__not_in'=>get_option('sticky_posts'));
				$blog_default = new WP_Query($args);
				while($blog_default->have_posts()):
					$blog_default->the_post();?>
		  <div class="item <?php if($k==1){echo 'active';} ?>">
		    <div class="col-md-4 col-sm-6 col-xs-12 pull-left">
			   <div class="blog-area">
				<div class="blog-post-img">
					
					<?php $default_img = array('class' => "img-responsive");
						if(has_post_thumbnail()) : ?>
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('',$default_img);?> 
						</a>
						<?php endif; ?>
				</div>
				<div class="blog-post-detail">
					<div class="col-md-9">
						<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><i class="fa fa-user"></i><?php echo get_the_author(); ?> </a>
						<?php $tag_list = get_the_tag_list( '', __( ', ', 'businesso' ) );
						if ( $tag_list ) {	?>
						&nbsp;&nbsp; <a href="#"><i class="fa fa-tag"></i><?php echo $tag_list ; ?></a>
						<?php } ?>
						&nbsp;&nbsp;<a href="#"><i class="fa fa-comment"></i><?php comments_popup_link( '0', '1', '%', '', '-'); ?></a></div>
				<div class="blog-post-date"><span class="date"><?php echo get_the_date('j'); ?><small><?php echo get_the_date('M'); ?></small></span>
					</div>		
				</div>
				<div class="clear"></div>
				   <div class="home-blog-title">
					<div class="home-blog-title-wrapper">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php the_excerpt( __( 'More' , 'businesso' ) ); ?>										
						<div class="btn-left-area">
						  <a href="<?php the_permalink(); ?>" class="main-btn btn-more btn-left"><?php _e('More','businesso'); ?></a>
					  </div>
				</div>	
			  </div> 
	        </div>
		 </div>	
        </div>	
			<?php $k++;  endwhile; endif;  ?>