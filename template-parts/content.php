<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package station19
 */


		
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
		$classenews = "mgfilm".$i;
		?>			
			<div class="col-12 col-md-6 col-xl-4" style="padding:25px">
				
				<div class="newsboxall <?php echo $classenews;?>">
					<a href="<?php echo get_permalink(); ?>">
					<div class="dirbox" style="background-image:url(<?php echo $image[0]; ?>)">
						
					</div>
					<div class="newsex">
						<div class="w-100">
							<h6><?php the_field('post_excerpt'); ?></h6>
						</div>
					</div>
					</a>
				</div>
			</div>



