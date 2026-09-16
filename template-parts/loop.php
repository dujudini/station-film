 <?php
    $prod_arch_args = array(
                    'paged' => get_query_var( 'paged' ),
                    );
    $prod_arch_query = new WP_Query( $prod_arch_args );

    if( $prod_arch_query->have_posts() ) {
        while( $prod_arch_query->have_posts() ) {
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
		$classenews = "mgnews".$i;
		?>			
			<div class="col-12 col-md-4">
				
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


		<?php
		if($i==2){$i=0;}else{$i++;}
        }
        wp_reset_postdata();
    }
    ?>