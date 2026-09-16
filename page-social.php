<?php

get_header(); ?>
<script>
	var menua = "nav-soc";
</script>
<style>

.modalvideo { display: none; position:fixed}

.video-box {
  /* Dimensões são definidas via JS para casar com o ratio do vídeo */
  overflow: hidden;      /* garante que nada extrapole */
  margin-left: auto;     /* centralizar quando a largura reduzir por conta da altura */
  margin-right: auto;
}

#vimeoif,
#vimeoif.jwplayer {
  width: 100% !important;
  height: 100% !important;
}

/* garante que o vídeo obedeça à caixa sem distorcer */
#vimeoif.jwplayer .jw-media video {
  width: 100% !important;
  height: 100% !important;
  object-fit: contain; /* a caixa já está no MESMO ratio do vídeo -> não haverá barras */
}

/* zera qualquer padding interno do layout "aspect" do JW */
#vimeoif.jwplayer .jw-aspect { padding-top: 0 !important; }
.infinite-loader {
  width: 100%;
  text-align: center;
  padding: 16px 0;
  opacity: .7;
  font-size: 14px;
}

</style>
<?php

// query ---------------------------------------------------------------
// >>> ADIÇÃO: paginação real
$paged = max(1, get_query_var('paged') ?: get_query_var('page') ?: 1);

$q = new WP_Query([
  'post_type'      => 'socials', // ou 'social' se o seu CPT for singular
  'posts_per_page' => 4,
  'post_status'    => 'publish',
  'orderby'        => ['menu_order' => 'ASC', 'date' => 'DESC'],
  'no_found_rows'  => false,     // <<< mudou de true para false para habilitar max_num_pages
  'fields'         => 'ids',
  'paged'          => $paged,    // <<< ADIÇÃO
]);
?>

<?php if ($q->have_posts()): ?>
  <section class="socials-wrap" id="main" role="main">
    <?php foreach ($q->posts as $post_id):
		include(locate_template('/template-parts/content-social.php')); 
    endforeach; wp_reset_postdata(); ?>

    <!-- >>> ADIÇÃO: Sentinela do IntersectionObserver -->
    <div id="infinite-sentinel-socials" aria-hidden="true"></div>
  </section>
<?php endif; ?>

<div class="modalvideosoc brancomodal">
  <div id="closevidsoc">
    <img src="<?php bloginfo('template_url'); ?>/img/close.png" alt="Fechar">
  </div>

  <div class="container-fluid">
	 <div class="row" style="max-height:10vh;height:10vh;">
			<div class="col-12">
			</div>
	 </div>
    <div class="row" style="max-height:80vh;height:80vh;">
      <div class="col-12 d-flex flex-column align-items-center justify-content-center">
        <div class="video-box d-flex flex-column align-items-center justify-content-center">
          <div id="vimeoif"></div>
		  <div id="vidtit" class="d-block d-lg-none text-left w-100">
			  <span id="clientdata" class="font-weight-bold clientdata"></span><br>
			  <span id="dirdata" class="dirdataz"></span>
			</div>
        </div>
      </div>
	  
    </div>

    <div class="row d-none d-lg-block" style="max-height:10vh;height:10vh;">
      <div class="col-12 ">
        <div id="vidtit" class="text-center w-100">
          <span id="clientdata" class="font-weight-bold clientdata"></span> | 
          <span id="dirdata" class="dirdataz"></span>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
function parseRatio(r) {
  // "16:9" -> {w:16, h:9}
  if (!r || typeof r !== "string" || !r.includes(":")) return { w:16, h:9 };
  const [w, h] = r.split(":").map(Number);
  return { w: w || 16, h: h || 9 };
}

// largura de conteúdo da coluna (clientWidth - paddings)
function contentWidth(el) {
  const cs = window.getComputedStyle(el);
  const pl = parseFloat(cs.paddingLeft)  || 0;
  const pr = parseFloat(cs.paddingRight) || 0;
  return el.clientWidth - pl - pr;
}

function sizeVideoBox($box, ratioStr) {
  const { w, h } = parseRatio(ratioStr);

  // limite vertical (80vh) e, se existir, limite pela altura do pai
  const parentEl = $box.parent()[0];
  const maxH = Math.min(window.innerHeight * 0.8, $box.parent().innerHeight() || Infinity);

  // largura útil: conteúdo da coluna (sem padding) e também não maior que a viewport
  const availWCol = contentWidth(parentEl);
  const availW    = Math.min(availWCol, window.innerWidth);

  // altura que teria ocupando 100% da largura disponível
  const heightByWidth = availW * (h / w);

  let finalW, finalH;
  if (heightByWidth <= maxH) {
    // cabe na altura -> largura 100% da coluna (como antes)
    finalW = availW;
    finalH = heightByWidth;
  } else {
    // limita pela altura e ajusta largura mantendo proporção,
    // sem ultrapassar a largura útil da coluna
    finalH = maxH;
    finalW = Math.min(finalH * (w / h), availW);
  }

  $box.css({
    width:  Math.floor(finalW) + "px",
    height: Math.floor(finalH) + "px"
  });
}

// throttler simples para resize
let resizeTick = null;
function onResize(fn) {
  if (resizeTick) return;
  resizeTick = requestAnimationFrame(() => {
    resizeTick = null;
    fn();
  });
}

</script>
<?php
// >>> ADIÇÃO: enqueue do script do infinite e configs
wp_enqueue_script(
  'infinite-socials',
  get_stylesheet_directory_uri() . '/js/infinite-socials.js',
  [],
  '1.0.0',
  true
);
wp_localize_script('infinite-socials', 'InfiniteSocials', [
  'restUrl'   => esc_url_raw( rest_url('my/v1/infinite-socials') ),
  'container' => '.socials-wrap',
  'sentinel'  => '#infinite-sentinel-socials',
  'nextPaged' => ($paged < (int) $q->max_num_pages) ? $paged + 1 : null,
  'maxPages'  => (int) $q->max_num_pages,
]);

get_footer();
