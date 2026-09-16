<?php
/* 
Template Name: CREATED BY
*/
get_header(); ?>
<script>
	var menua = "nav-film";
</script>
<section class="news vidallmob" id="main" role="main">
	<div class="container-fluid">
		<div class="row">
	   <?php 
	   $iz=0;
	   $i=0;
		while ( have_rows('film_tv') ) : the_row();
			$client = get_sub_field('client');
			$title = get_sub_field('title');
			$videoid = get_sub_field('video_id');
			$image = get_sub_field('image');
			$director = get_sub_field('director');
			$mores = get_sub_field('more_section');
			$post_id = get_sub_field('director', false, false);
			if($iz==0){$classedir = "branco mgfilm".$i;}
			else{
				$classedir = "mgfilm".$i;
			}
			if($mores==true){
				$more = get_sub_field('more');
			?>
			<div class="col-12 col-md-6 col-xl-4" style="padding:10px">
				<a class="viewmorea" href="<?php echo get_the_permalink($more);?>">
				<div class="dirboxall <?php echo $classedir;?>">
					<div class="dirbox" style="background-image:url(<?php the_sub_field('image'); ?>)">
						
					</div>
					<div class="dirboxoverlay">
					
					</div>
					<div class="createdata1 d-flex justify-content-start align-items-end">
						<div class="p-3">
							<h4 class="w-100"><?php echo $title;?></h4>
							<h5 class="w-100" style="text-transform:uppercase"><?php echo $client;?></h5>
							<h6 class="w-100"><?php if( get_sub_field('extra_caption')){echo get_sub_field('extra_caption').' | ';} echo get_the_title($director); ?></h6>
						</div>
					</div>
				</div>
				</a>
			</div>

		<?php
			}else{
		?>	
		
			<div class="col-12 col-md-6 col-xl-4">
				<div class="dirboxall clickvideo1 <?php echo $classedir;?>" data-client='<?php the_sub_field('client'); ?>' data-titvid="<?php echo htmlentities(get_sub_field("title"));?>" data-ind="<?php echo $iz;?>'" data-vimeoif="<?php the_sub_field('video_id'); ?>" data-dir='<?php echo '<a href="'.get_the_permalink($post_id).'">'.strtoupper(get_the_title($post_id)).'</a>';?>'>
					<div class="dirbox" style="background-image:url(<?php the_sub_field('image'); ?>)">
						
					</div>
					<div class="dirboxoverlay">
					
					</div>
					<div class="createdata1 d-flex justify-content-start align-items-end">
						<div class="p-3">
							<h4 class="w-100"><?php echo $title;?></h4>
							<h5 class="w-100" style="text-transform:uppercase"><?php echo $client;?></h5>
							<h6 class="w-100"><?php if( get_sub_field('extra_caption')){echo get_sub_field('extra_caption').' | ';} echo get_the_title($director); ?></h6>
						</div>
					</div>
				</div>
			</div>



		<?php
			}
		$carrimg1 .= '<div style="display:none" class="carvids carvid'.$iz.'" data-client="'.get_sub_field("client").'" data-titvid="'.get_sub_field("title").'" data-vimeoif="'.get_sub_field('video_id').'" data-dir="'.get_the_title($director).'"></div>';

		if($i==2){$i=0;}else{$i++;}
		$iz++;
		endwhile;
		?>
		<div class="listvid">
					<?php echo $carrimg1;?>
				</div>
		</div>
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
		<div class="col-1 d-flex align-items-center justify-content-center">
			<div class="arrowsvid" id="dOnly">
				<a href="#" id="vidprev" aria-label="Anterior"><img src="<?php bloginfo('template_url'); ?>/img/prev.png" alt="" class="img-responsive" style="max-height:100%"></a>
			</div>
		</div>
		<div class="col-10 d-flex align-items-center justify-content-center">
			<div class="row w-100">
				<div class="col-10 mx-auto">
				<div class="embed-responsive embed-responsive-16by9"  id="vimeoif">
					
				</div>
				</div>	
			</div>
			
			<div id="vidif">

			</div>
		</div>
	
		<div class="col-1 d-flex align-items-center justify-content-center">
			<div class="arrowsvid align-self-center">
				
				<a href="#" id="vidnext" aria-label="Próximo"><img src="<?php bloginfo('template_url'); ?>/img/next.png" alt="" class="img-responsive" style="max-height:100%"></a>
				
			</div>
		</div>
		<div class="col-12">
			
			<div id='vidtit' class='text-center w-100'>
				<span id="clientdata"  class="font-weight-bold"></span> | "<span id="titledata"  class="font-weight-normal"></span>" | <span id="dirdata" class="font-weight-bold"></span>
			</div>
		</div>
	</div>
	
</div>

<?php

get_footer();
