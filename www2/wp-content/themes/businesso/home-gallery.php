<!----------Gallery/Portfolio------------------>
<?php $businesso_option=theme_default_data(); 
$portfolio_options = wp_parse_args(  get_option( 'businesso_option', array() ), $businesso_option );
if($portfolio_options['enable_home_portfolio'] == 1 ) { ?>
<section class="services-section">
  <div class="container">
    <div class="text-center animate" data-anim-type="zoomIn" data-anim-delay="400">
      <h1 class="heading animate fadeInUp"><?php echo $portfolio_options['portfolio_title_one']; ?></h1>
	  <div class="pagetitle-separator animate fadeInRight"></div>
    </div>
    <div class="clearfix"></div>
     <div class="row">
	 <div id="gallery">
	 <?php if($portfolio_options['upload_image_one'] !='') { ?>
       <div class="col-md-4 col-sm-6 animate" data-anim-type="zoomIn" data-anim-delay="400">
			<div class="home-gallery-col">
			  <div class="home-gallery-img">
				   <img src="<?php echo esc_url($portfolio_options['upload_image_one']); ?>" class="img-responsive">
				    <div class="gallery-showcase-overlay">
				     <div class="gallery-showcase-overlay-inner">
					  <div class="gallery-showcase-icons">
					    <a class="photobox_a" href="<?php echo esc_url($portfolio_options['upload_image_one']); ?>"  title="<?php echo $portfolio_options['portfolio_image_one_title']; ?>"><i class="fa fa-search-plus"></i>
						<img title="<?php echo $portfolio_options['portfolio_image_one_title']; ?>" src="<?php echo esc_url($portfolio_options['upload_image_one']); ?>" style="display:none;" />
						</a>
						<a href="<?php echo esc_url($portfolio_options['portfolio_image_one_link']); ?>"<?php if( $portfolio_options['portfolio_new_tab'] ==1 ) { echo "target='_blank'"; } ?>><i class="fa fa-link"></i></a>
					 </div>
				    </div> 
				  </div>
				 </div>
		    </div>
		 </div>
		 <?php } ?>
		 
		 <?php if($portfolio_options['upload_image_two'] !='') { ?>
		  <div class="col-md-4 col-sm-6 animate" data-anim-type="zoomIn" data-anim-delay="400">
			<div class="home-gallery-col">
			  <div class="home-gallery-img">
				   <img src="<?php echo esc_url($portfolio_options['upload_image_two']); ?>" class="img-responsive">
				    <div class="gallery-showcase-overlay">
				     <div class="gallery-showcase-overlay-inner">
					  <div class="gallery-showcase-icons">
					     <a class="photobox_a" href="<?php echo esc_url($portfolio_options['upload_image_two']); ?>"  title="<?php echo $portfolio_options['portfolio_image_two_title']; ?>"><i class="fa fa-search-plus"></i>
						 <img title="<?php echo $portfolio_options['portfolio_image_two_title']; ?>" src="<?php echo esc_url($portfolio_options['upload_image_two']); ?>" style="display:none;" />
						 </a>
						<a href="<?php echo esc_url($portfolio_options['portfolio_image_two_link']); ?>"<?php if( $portfolio_options['portfolio_two_new_tab'] ==1 ) { echo "target='_blank'"; } ?>><i class="fa fa-link"></i></a>
					 </div>
				    </div> 
				  </div>
				 </div>
		     </div>
		  </div>
		  <?php } ?>
		 
		 <?php if($portfolio_options['upload_image_three'] !='') { ?>
		  <div class="col-md-4 col-sm-6 animate" data-anim-type="zoomIn" data-anim-delay="400">
			<div class="home-gallery-col">
			  <div class="home-gallery-img">
				   <img src="<?php echo esc_url($portfolio_options['upload_image_three']); ?>" class="img-responsive">
				    <div class="gallery-showcase-overlay">
				     <div class="gallery-showcase-overlay-inner">
					  <div class="gallery-showcase-icons">
					     <a class="photobox_a" href="<?php echo esc_url($portfolio_options['upload_image_three']); ?>" title="<?php echo $portfolio_options['portfolio_image_three_title']; ?>"><i class="fa fa-search-plus"></i>
						 <img title="<?php echo $portfolio_options['portfolio_image_three_title']; ?>" src="<?php echo esc_url($portfolio_options['upload_image_three']); ?>" style="display:none;" />
						 </a>
						<a href="<?php echo esc_url($portfolio_options['portfolio_image_three_link']); ?>"<?php if( $portfolio_options['portfolio_three_new_tab'] ==1 ) { echo "target='_blank'"; } ?>><i class="fa fa-link"></i></a>
					 </div>
				    </div> 
				  </div>
				 </div>
		    </div>
		  </div>
		  <?php } ?>
		  </div>
     </div>
    </div>
</section>
<!----------/Gallery/Portfolio------------------>
<?php } ?>