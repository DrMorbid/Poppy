<?php
/**
* @Theme Name	:	Businesso
* @file         :	home-slider.php
* @package      :	Businesso
* @author       :	asiathemes
* @license      :	license.txt
* @filesource   :	wp-content/themes/businesso/home-slider.php
*/
?>
<!-- Slider Section -->	
<?php 
$businesso_options=theme_default_data(); 
$slider_setting = wp_parse_args(  get_option( 'businesso_option', array() ), $businesso_options ); 
if($slider_setting['home_banner_enabled'] == 1 ) {
?>
<!-- Slider Section -->
 <div class="main-slider">		
	<div id="home-slider" class="carousel <?php echo $slider_setting['slider_options']; ?> " data-ride="carousel" <?php if($slider_setting['slider_transition_delay'] != '') { ?> data-interval="<?php echo $slider_setting['slider_transition_delay']; } ?>">
	
		<div class="carousel-inner" role="listbox">
			<div class="item active">
			<?php if($slider_setting['slider_image_one'] !='') { ?>
			<img src="<?php echo esc_url($slider_setting['slider_image_one']); ?>" class="img-responsive" alt="<?php echo esc_attr($slider_setting['slider_image_title_one']); ?>">
			<?php } ?>
                  <div class="carousel-caption">
				  <?php if($slider_setting['slider_image_title_one'] !='') { ?>
                    <h1 data-animation="animated zoomInLeft"><?php echo esc_attr($slider_setting['slider_image_title_one']); ?>.</h1>
					<?php } ?>
					<?php if($slider_setting['slider_image_description_one'] !='') { ?>
                    <p data-animation="animated bounceInLeft"><?php echo esc_attr($slider_setting['slider_image_description_one']); ?>.</p>
					<?php } ?>
					<?php if($slider_setting['slider_button_text'] !='') { ?>
                            <a data-animation="animated zoomInUp" class="main-btn btn-1 btn-1b" href="<?php if($slider_setting['slider_image_link'] !='') { echo esc_url($slider_setting['slider_image_link']); } ?>" <?php if($slider_setting['slider_button_tab'] ==1) { echo "target='_blank'"; } ?> ><?php echo esc_attr($slider_setting['slider_button_text']) ?></a>
							<?php } ?>
                </div>			
			</div>
			<div class="item">
			<?php if($slider_setting['slider_image_two'] !='') { ?>
			<img src="<?php echo esc_url($slider_setting['slider_image_two']); ?>" class="img-responsive" alt="<?php echo esc_attr($slider_setting['slider_image_title_two']); ?>">
			<?php } ?>
                  <div class="carousel-caption">
				  <?php if($slider_setting['slider_image_title_two'] !='') { ?>
                    <h1 data-animation="animated zoomInLeft"><?php echo esc_attr($slider_setting['slider_image_title_two']); ?>.</h1>
					<?php } ?>
					<?php if($slider_setting['slider_image_description_two'] !='') { ?>
                    <p data-animation="animated bounceInLeft"><?php echo esc_attr($slider_setting['slider_image_description_two']); ?>.</p>
					<?php } ?>
					<?php if($slider_setting['slider_button_text'] !='') { ?>
                            <a data-animation="animated zoomInUp" class="main-btn btn-1 btn-1b" href="<?php if($slider_setting['slider_image_link'] !='') { echo esc_url($slider_setting['slider_image_link']); } ?>" <?php if($slider_setting['slider_button_tab'] ==1) { echo "target='_blank'"; } ?> ><?php echo esc_attr($slider_setting['slider_button_text']) ?></a>
							<?php } ?>
                </div>			
			</div>
			<div class="item">
			<?php if($slider_setting['slider_image_three'] !='') { ?>
			<img src="<?php echo esc_url($slider_setting['slider_image_three']); ?>" class="img-responsive" alt="<?php echo esc_attr($slider_setting['slider_image_title_three']); ?>">
			<?php } ?>
                  <div class="carousel-caption">
				  <?php if($slider_setting['slider_image_title_three'] !='') { ?>
                    <h1 data-animation="animated zoomInLeft"><?php echo esc_attr($slider_setting['slider_image_title_three']); ?>.</h1>
					<?php } ?>
					<?php if($slider_setting['slider_image_description_three'] !='') { ?>
                    <p data-animation="animated bounceInLeft"><?php echo esc_attr($slider_setting['slider_image_description_three']); ?>.</p>
					<?php } ?>
					<?php if($slider_setting['slider_button_text'] !='') { ?>
                            <a data-animation="animated zoomInUp" class="main-btn btn-1 btn-1b" href="<?php if($slider_setting['slider_image_link'] !='') { echo esc_url($slider_setting['slider_image_link']); } ?>" <?php if($slider_setting['slider_button_tab'] ==1) { echo "target='_blank'"; } ?> ><?php echo esc_attr($slider_setting['slider_button_text']) ?></a>
							<?php } ?>
                </div>			
			</div>
	    </div>
		 <ul class="carou-direction-nav">
				<li><a class="carou-prev" href="#home-slider" data-slide="prev"></a></li>
				<li><a class="carou-next" href="#home-slider" data-slide="next"></a></li>
		</ul>
     </div>
</div>
<!-- /Slider Section -->
<?php } ?>