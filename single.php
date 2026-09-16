<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package station19
 */

get_header(); 

$prev = get_permalink(get_adjacent_post(false,'',false));
$next = get_permalink(get_adjacent_post(false,'',true));
$post_id = get_field('director', false, false);
$post_dir = get_field('director');
$iz=0;
$ttitle[] = '<span class="newsbread"><a href="'.site_url().'/news">News</a></span>';
if( $post_id ){
	$ttitle[] = '<span class="newsbread newsdiry"><a href="'.get_the_permalink($post_id).'">'.strtoupper(get_the_title($post_id)).'</a></span>';
}
if( get_field('otags') != "" ){
	$ttitle[] = '<span class="newsbread">'.strtoupper(get_field('otags')).'</span>';
}
function checkn($number){ 
    if($number % 2 == 0){ 
        echo "geven";
    } 
    else{ 
        echo "godd";
    } 
} 
?>
<script>
	var menua = "nav-news";
</script>
<section class="newsind" id="main" role="main">
	<div class="d-flex d-md-none">
		<div class="w-100" style="padding-bottom: 30px;">
			<div id="closesec">
				<a href="/news" style="float: right;" aria-label="Fechar"><img src="<?php bloginfo('template_url'); ?>/img/close.png" alt=""></a>
			</div>
		</div>
	</div>
	<div class="container-fluid" id="swipe">
		<div class="row">
			<div class="col-12 col-md-8 mx-auto">
				<h1 class="text-center">
					<span><?php echo implode(" | ",$ttitle);?></span>
				</h1>
			</div>
		</div>
		
		<div class="row">
			<div class="col-1">
				<div class="h-100 d-flex prevclick align-items-center justify-content-end">
					<a href="<?php echo $prev; ?>" id="prevclick" aria-label="Notícia anterior"><img src="<?php bloginfo('template_url'); ?>/img/prev.png" alt="" class="pull-right" style="max-height:40px"></a>
				</div>
			</div>
			<div class="col-12 col-md-8 mx-auto">
				<div class="newssub">
			
				<?php the_field('sub-title'); ?>

		</div>
				<div style="display: flex;align-items: center;justify-content: center;">
                      
					<?php
						$images = get_field('iframe_image');

						if( $images ){
							$imgbg = $images;
						}else{
							$imgbg1 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
							$imgbg = $imgbg1[0];
						}
						$iframe = get_field('iframe_embed');

						if( $iframe ){?>
							
						<div class="news-dest w-100">
							<div class=" borderimage embed-responsive embed-responsive-16by9 clickvideopost"  data-vimeoif="<?php echo substr(get_field('iframe_embed'), 0, 8); ?>" data-ratio="16:9" id="vimeoifnews" style="background-repeat: no-repeat; background: url('<?php echo $imgbg;?>') no-repeat center center;background-size:cover" >

							</div>
						</div>
							<?php
							$carrimg0 .= '<div style="display:none" class="carvids carvid'.$iz.'" data-client=""  data-titvid="'.htmlspecialchars(get_field("iframe_title")).'" data-vimeoif="'.substr(get_field('iframe_embed'), 0, 8).'"></div>';
							?>


					<?php	
						}else{?>
							<div class=" news-dest embed-responsive embed-responsive-16by9" style="background-repeat: no-repeat; background: url('<?php echo $imgbg;?>') no-repeat center center;background-size:cover">
								
							</div>
					<?php		
						}
					?>
						

				</div>
			</div>
			<div class="col-1">
				<div class="d-flex h-100">
					<div class="d-flex align-self-start justify-content-start">
						<a href="/news" aria-label="Fechar"><img src="<?php bloginfo('template_url'); ?>/img/close.png" alt="" class="img-responsive" style="max-height:20px;margin-top:-50px"></a>
					</div>
					<div class="d-flex align-self-center nextclick justify-content-start">
						<a href="<?php echo $next; ?>" id="nextclick" aria-label="Próxima notícia"><img src="<?php bloginfo('template_url'); ?>/img/next.png" alt="" class="img-responsive" style="max-height:40px"></a>
					</div>
				</div>
			</div>
		</div>
	
		<div class="row">
			<div class="col-12 col-md-8 mx-auto text-justify news-text">
				
				<?php the_field("news_text"); ?>
			</div>			
		</div>
		<?php
			if( have_rows('bonus_video_content') ):
			?>
			<div class="row morep">
				<div class="col-12 col-md-8 mx-auto">
					<h3 class="decorated"><span><?php if(get_field("more_title")){the_field("more_title");}else{echo "More";} ?></span></h3>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-8 mx-auto">
					<div class="row">

			<?php
					// loop through the rows of data
					while ( have_rows('bonus_video_content') ) : the_row();
					$iz++;
					$title = get_sub_field('bonus_video_content_title');
					$bonusimage = get_sub_field('bonus_video_content_image');
					$videoid = get_sub_field('bonus_video_content_video_id');
					?>
					<div class="col-12 col-md-6 <?php echo checkn($i);?>">
									<?php echo '<div class="newsboxall clickvideo1" data-ind="'.$iz.'" data-titvid="'.htmlentities($title).'"  data-client=""  data-vimeoif="'.substr($videoid, 0, 8).'" data-news="true">';?>
										<div class="dirbox" style="background-size: cover; background-position:center; background-repeat: no-repeat; background-image:url(<?php echo $bonusimage; ?>)">
											
										</div>
										<div class="newinsex">
											<div class="w-100">
												<h6><?php echo $title;?></h6>
											</div>
										</div>
									</div>
								</div>
						<?php
						$carrimg0 .= '<div style="display:none" class="carvids carvid'.$iz.'" data-client="" data-titvid="'.htmlentities($title).'" data-vimeoif="'.substr($videoid, 0, 8).'"></div>';

								
								
								$i++;
					endwhile;
?>
					
				</div>
			</div>
		</div>

	<?php	endif;
		
			$images = get_field('gallery');

			if( $images ): 
			$iz1 = 0;
		?>
		<div class="row galleryp">
			<div class="col-12 col-md-8 mx-auto">
				<h3 class="decorated"><span>Gallery</span></h3>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-8 mx-auto">
				<div class="row">
	<?php 
					foreach( $images as $image ):


							
							$bonusimage = $image['sizes']['large'];
							$bonusimage1 = $image['url'];
							$title = $image['caption'];
								?>
								
								<div class="col-12 col-md-6  <?php echo checkn($i);?>">
									<?php echo '<div class="newsboxall clickimage1" data-ind="'.$iz1.'" data-titimg="'.htmlentities($title).'"  data-imageif="'.$bonusimage1.'">';?>
										<div class="dirbox borderimage" style="background-size: cover; background-position:center; background-repeat: no-repeat; background-image:url(<?php echo $bonusimage; ?>)">
											
										</div>
										<div class="newinsex">
											<div class="w-100">
												<p></p>
											</div>
										</div>
									</div>
								</div>

					<?php
							$carrimg1 .= '<div style="display:none" class="carvids1 carvid1'.$iz1.'" data-titimg="'.htmlentities($title).'" data-imageif="'.$bonusimage1.'"></div>';
							$iz1++;
							$i++;
					endforeach;
					?>
					<div class="listvid">
					<?php echo $carrimg1;?>
					</div>
				</div>
			</div>
		</div>
<?php
 endif; 
 ?>
		
		
		
		
		
		<?php
		$currentID = get_the_ID();
		$args = array(
						'posts_per_page'	=> 3,
						'post_type'		=> 'post',
						'meta_key'		=> 'director',
						'meta_value'	=> $post_id,
						'post__not_in' => array($currentID)
					);
		$the_query = new WP_Query( $args );

		?>
		<?php if( $the_query->have_posts() || get_field('press')): ?>
			<div class="row relatedp">
				<div class="col-12 col-md-8 mx-auto">
					<h3 class="decorated"><span>RELATED PRESS</span></h3>
				</div>
			</div>

			<div class="row relatedpress">
				<div class="col-12 col-md-8 mx-auto">
					<?php if(get_field('press')){?>
						<ul class="" style="padding-left: 0;list-style: none;margin-bottom: 0;">
						
						
						<li class=""><?php the_field('press'); ?></li>
						
					</ul>
				<?php }else{
					while( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<p>
							<a href="<?php the_permalink(); ?>">
								
								<?php 
									$newstiti = explode(" > ",get_the_title());
									$newstiti[0] = "<b>".$newstiti[0]."</b>";
									echo implode(" > ",$newstiti);
								?>
							</a>
						</p>
					<?php endwhile; 
					}?>
				</div>
			</div>
		<?php endif; ?>


		<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>

		
	</div>
	<div class="listvid listvidall">
	<?php echo $carrimg0;?>
	</div>

</section>
	<div class="footerdowno">
		<div class="social">
			<div class="text-center"><a href="<?php the_field('facebook', 6328); ?>" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a></div>
			<div class="text-center"> <a href="<?php the_field('instagram', 6328); ?>" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a></div>
			<div class="text-center"> <a href="<?php the_field('twitter', 6328); ?>" target="_blank" aria-label="X (Twitter)"><i class="fa-brands fa-x-twitter"></i></a></div>
			<div class="text-center"> <a href="<?php the_field('nmsdc', 6328); ?>" target="_blank" aria-label="NMSDC"><img src="https://cdn.stationfilm.com/wp-content/uploads/2023/03/27163724/NMSDC.png" style="max-height:16px" alt=""></a></div>

		</div>
				<div class="copyright">© <?=date('Y')?> station film. all rights reserved.</div>

	</div>
<div class="modalvideo align-items-center brancomodal">
	<div id="closevid" role="button" tabindex="0" aria-label="Fechar">
				<img src="<?php bloginfo('template_url'); ?>/img/close.png" alt="">
			</div>
	<div class="row bigorna">
		<div class="col-1 d-none d-md-flex align-items-center justify-content-center">
			<div class="arrowsvid" id="dOnly">
				<a href="#" id="vidprev" aria-label="Anterior"><img src="<?php bloginfo('template_url'); ?>/img/prev.png" alt="" class="img-responsive" style="max-height:100%"></a>
			</div>
		</div>
		<div class="col-12 col-md-10 d-flex align-items-center justify-content-center">
			<div class="row w-100">
				<div class="col-12 col-md-10 mx-auto">
				<div class="embed-responsive embed-responsive-16by9"  id="vimeoif">
					
				</div>
				</div>	
			</div>
			<div id="vidif">

			</div>
		</div>

		<div class="col-1 d-none d-md-flex align-items-center justify-content-center">
			<div class="arrowsvid align-self-center">
				
				<a href="#" id="vidnext" aria-label="Próximo"><img src="<?php bloginfo('template_url'); ?>/img/next.png" alt="" class="img-responsive" style="max-height:100%"></a>

			</div>
		</div>
		<div class="col-12">
			<div id='vidtit' class='text-center w-100'>
				<span id="titledata"  class="font-weight-normal"></span>
			</div>
		</div>
	</div>

</div>
<div class="modalimg align-items-center brancomodal">
	<div id="closevid1" role="button" tabindex="0" aria-label="Fechar">
		<img src="<?php bloginfo('template_url'); ?>/img/close.png" alt="">
	</div>
	<div class="row bigorna">
		<div class="col-1 d-none d-md-flex align-items-center justify-content-center">
			<div class="arrowsvid">
				<a href="#" id="vidprev1" aria-label="Anterior"><img src="<?php bloginfo('template_url'); ?>/img/prev.png" alt="" class="img-responsive" style="max-height:100%"></a>
			</div>
		</div>
		<div class="col-12 col-md-10 d-flex align-items-center justify-content-center">
			<div class="row w-100">
				<div class="col-12 col-md-10 mx-auto text-center" style="max-height:80vh" id="vimeoif1">
				
				</div>	
			</div>
			<div id="vidif1">

			</div>
		</div>

		<div class="col-1 d-none d-md-flex align-items-center justify-content-center">
			<div class="arrowsvid align-self-center">
				
				<a href="#" id="vidnext1" aria-label="Próximo"><img src="<?php bloginfo('template_url'); ?>/img/next.png" alt="" class="img-responsive" style="max-height:100%"></a>
				
			</div>
		</div>
		<div class="col-12">
			<div id='vidtit1' class='text-center w-100'>
				<span id="titledata1"  class="font-weight-normal"></span>
			</div>
		</div>
	</div>
</div>
<?php

get_footer();
