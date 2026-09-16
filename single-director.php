<?php

get_header(); ?>
<script>
	var menua = "nav-dir";
</script>
<section class="directorsind" id="main" role="main">

	<?php if( have_rows('main_grid') ):?>
	<div class="dirgrid">

			<div class="row no-gutters">
				<div class="col-12 col-md-6 col-xl-4">
							<div class="dirboxall mgfilm0">
								<div class="dirbox" style="background-image:url(<?php the_field('director_card'); ?>)">
									
								</div>


							</div>
						</div>
				<?php
				$iz = 0;
				$i=1;
					while ( have_rows('main_grid') ) : the_row();
							$classedir = "mgfilm".$i;
							
						?>
						<div class="col-12 col-md-6 col-xl-4">
							<div class="dirboxall clickvideo1 <?php echo $classedir;?>" data-client='<?php echo esc_html(get_sub_field('client')); ?>' data-titvid="<?php echo esc_html(get_sub_field("title"));?>" data-ind="<?php echo $iz;?>'" data-vimeoif="<?php the_sub_field('media_id'); ?>">
								<div class="dirbox" style="background-image:url(<?php the_sub_field('image'); ?>)">
									
								</div>
								<div class="dirboxoverlay">
					
					</div>
								<div class="dirdata d-flex align-items-center">
									<div class="w-100">
										<h3 class="w-100 text-center"><?php the_sub_field('client'); ?></h3>
										<h4 class="w-100 text-center">"<?php the_sub_field('title'); ?>"</h4>
									</div>
								</div>
							</div>
						</div>
						<?php
						$carrimg0 .= '<div style="display:none" class="carvids carvid'.$iz.'" data-client="'.esc_html(get_sub_field("client")).'" data-titvid="'.esc_html(get_sub_field("title")).'" data-vimeoif="'.get_sub_field('media_id').'"></div>';
					if($i==2){$i=0;}else{$i++;}
					$iz++;
					endwhile;
				?>
				<div class="listvid">
					<?php echo $carrimg0;?>
				</div>
			</div>
	</div>
	<?php endif; ?>
	<div class="dirba" id="accordion">
		<div class="container-fluid">
			<ul class="menudirba w-100 text-center list-inline list-unstyled">
				<li class="list-inline-item clickdir collapsed" id="dirmenubio" role="button" tabindex="0" data-toggle="collapse" data-target="#dirbio" aria-expanded="true" aria-controls="dirbio">BIO</li>
				<?php if( have_rows('bigorna-trocar') ){?><li  class="list-inline-item">|</li>
				<li  class="list-inline-item clickdir collapsed" id="dirmenuarc" role="button" tabindex="0" data-toggle="collapse" data-target="#dirarch" aria-expanded="true" aria-controls="dirarch">BONUS</li><?php }?>
			</ul>
			<div class="row dirbio dirslide collapse" id="dirbio" data-parent="#accordion" data-clickdir="#dirmenubio">
				<div class="col-md-8 mx-auto">
					<div class="dirbiopic"><img src="<?php the_field("bio_pic");?>" alt="<?php the_title_attribute(); ?>"></div><?php the_field("bio");?>
				</div>
			</div>
			<?php if( have_rows('bigorna-trocar') ):?>
			<div class="row no-gutters dirarch dirslide collapse" id="dirarch" data-parent="#accordion" data-clickdir="#dirmenuarc">
			<?php
					$iz = 0;
						while ( have_rows('archive') ) : the_row();
								$classedir = "mgarc".$iz;
								
							?>
				<div class="col-3 col-md-3">
					<div class="dirboxall clickvideo1 <?php echo $classedir;?>" data-client='<?php echo esc_html(get_sub_field('client')); ?>' data-titvid="<?php echo esc_html(get_sub_field("title"));?>" data-ind="<?php echo $iz;?>'" data-vimeoif="<?php the_sub_field('media_id'); ?>">
						<div class="dirbox" style="background-image:url(<?php the_sub_field('image'); ?>)">
							
						</div>
						<div class="dirarc text-center">
							<div class="w-100">
								<h5 class="w-100 text-center"><span class="font-weight-bold"><?php the_sub_field('client'); ?></span> | "<?php the_sub_field('title'); ?>"</h5>
							</div>
						</div>
					</div>
				</div>
				<?php
						
						$carrimg1 .= '<div style="display:none" class="carvids carvid'.$iz.'" data-client="'.esc_html(get_sub_field("client")).'" data-titvid="'.esc_html(get_sub_field("title")).'" data-vimeoif="'.get_sub_field('media_id').'"></div>';
						$iz++;
						endwhile;
					?>
				<div class="listvid">
						<?php echo $carrimg1;?>
					</div>
			</div>
			<?php endif; ?>
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
	<div id="closevid" class="align-self-start" role="button" tabindex="0" aria-label="Fechar">
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
				<div class="col-md-10 mx-auto">
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
				<span id="clientdata"  class="font-weight-bold"></span> | "<span id="titledata"  class="font-weight-normal"></span>" | <span class="font-weight-bold"><?php the_title();?></span>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>