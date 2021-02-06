<?php
$businesso_options=theme_default_data(); 
$home_latest_post_option = wp_parse_args(  get_option( 'businesso_option', array() ), $businesso_options );
if($home_latest_post_option['home_blog_enabled'] == 1 ) { ?>
<section class="home-blog-section">
	<div class="container">
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="text-center animate" data-anim-type="zoomIn" data-anim-delay="300">
				 <h1 class="heading animate fadeInUp"><?php echo $home_latest_post_option['blog_title_one'];?></h1>
				  <div class="pagetitle-separator animate fadeInRight"></div>
				</div>
			</div>
		</div>
		<!-- /Section Title -->		
				
<!-- Item Scroll -->
	 <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="home-blog">
	  <div class="row">
	    <div class="col-md-12">
			<ul class="course-scroll-btn">
				<li><a class="course-prev" href="#home-blog" data-slide="prev"></a></li>
				<li><a class="course-next" href="#home-blog" data-slide="next"></a></li>    
			</ul>
		</div>
	   </div>
	   
		<div class="carousel-inner animate" data-anim-type="fadeInUp" data-anim-delay="800">
		<?php get_template_part('blog','content'); ?>			
		</div>			
		</div>
		<!-- /Item Scroll -->
	</div>
</section>
<?php } ?>
<!----latest-news-close---->
<div class="clearfix"></div>