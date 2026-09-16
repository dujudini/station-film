<?php 
      $title          = get_the_title($post_id);
      $permalink      = get_permalink($post_id);
		$thumb_url = get_the_post_thumbnail_url($post_id, 'full');
      // ACF fields -----------------------------------------------------
      $caption       = get_field('caption', $post_id) ?: '';
      $fullvid       = get_field('full_video_id', $post_id) ?: '';
      $type           = get_field('type', $post_id) ?: 'image';             // image|video
      $image_url      = $type === 'image' ? (get_field('image', $post_id) ?: '') : '';
      $clip_url       = $type === 'video' ? (get_field('clip',  $post_id) ?: '') : '';
      $ratio_str      = get_field('ratio', $post_id) ?: '16:9';
      $ratio_pt       = ratio_to_padding($ratio_str, '56.25');

      // Novos campos ---------------------------------------------------
      $media_grid_w   = (int) (get_field('media_grid_width', $post_id) ?? 50); // % da linha p/ área da mídia
      $inner_media_w  = (int) (get_field('grid_width',       $post_id) ?? 100); // % dentro da área da mídia
      $alignment      = get_field('alignment', $post_id) ?: 'left'; // left|center|right (dentro da área)
      $display        = (string) (get_field('display',  $post_id) ?? '1'); // '1' (midia esq) | '2' (midia dir)
      $text_position  = get_field('text_position',  $post_id) ?: 'left';   // left|center|right (no bloco texto)
      $text_alignment = get_field('text_alignment', $post_id) ?: 'left';   // CSS text-align

      $text_grid_w    = max(0, 100 - $media_grid_w); // % restante da linha para o texto

      // classes e vars -------------------------------------------------
      $row_dir_class  = ($display === '2') ? 'media-right' : 'media-left'; // 1=midia esq, 2=midia dir
      $justify_media  = map_flex_justify($alignment);
      $justify_text   = map_flex_justify($text_position);

      // strings % para CSS vars
      $media_grid_w_str  = $media_grid_w . '%';
      $text_grid_w_str   = $text_grid_w . '%';
      $inner_media_w_str = $inner_media_w . '%';
    ?>
      <article class="social-row <?php echo esc_attr($row_dir_class); ?>"
               style="--media-area-w: <?php echo esc_attr($media_grid_w_str); ?>;
                      --text-area-w:  <?php echo esc_attr($text_grid_w_str); ?>;
                      --media-box-w:  <?php echo esc_attr($inner_media_w_str); ?>;
                      --justify-media: <?php echo esc_attr($justify_media); ?>;
                      --justify-text:  <?php echo esc_attr($justify_text); ?>;
                      --text-align:    <?php echo esc_attr($text_alignment); ?>;
                      --ratio:         <?php echo esc_attr($ratio_pt); ?>%;">
        <!-- ÁREA DA MÍDIA (largura = media_grid_width%) -->
        <div class="rail-media">
          <!-- Caixa da mídia (largura = grid_width% dentro da área) -->
          <div class="media-box clicksocvideo" data-vimeoif="<?=$fullvid;?>" data-ratio="<?=$ratio_str;?>" data-client="<?php echo esc_html($title); ?>" data-dir="<?php echo esc_html($caption); ?>">
            <figure class="social-media">
              <?php if ($type === 'image' && $image_url): ?>
                <img class="social-img" src="<?php echo esc_url($image_url); ?>"
                     alt="" loading="lazy" decoding="async">
              <?php elseif ($type === 'video' && $clip_url): ?>
                <video class="social-vid"
                       data-src="<?php echo esc_url($clip_url); ?>"
                       muted playsinline webkit-playsinline loop
                       preload="none"
                       aria-hidden="true" tabindex="-1"
					   <?php if ($thumb_url): ?>
           poster="<?php echo esc_url($thumb_url); ?>"
         <?php endif; ?>></video>
              <?php endif; ?>
            </figure>
          </div>
        </div>

        <!-- ÁREA DO TEXTO (largura = 100% - media_grid_width%) -->
        <div class="rail-text">
          <div class="text-inner clicksocvideo" data-vimeoif="<?=$fullvid;?>" data-ratio="<?=$ratio_str;?>" data-client="<?php echo esc_html($title); ?>" data-dir="<?php echo esc_html($caption); ?>">
            <h3 class="social-title">
              <?php echo esc_html($title); ?>
            </h3>
            <?php if ($caption): ?>
              <div class="social-director"><?php echo esc_html($caption); ?></div>
            <?php endif; ?>
          </div>
        </div>
      </article>