<?php
/**
 * Template Name: Front Page Template
 *
 * Home com carrossel próprio (substitui o antigo SmartSlider3):
 * - só mantém 1 vídeo de fundo vivo por vez (o do slide ativo)
 * - usa media ID do JWPlayer (streaming adaptativo) em vez de link MP4 fixo
 * - reaproveita o padrão de swipe (Hammer.js) e texto letra-por-letra já usados no tema
 *
 * Estrutura de conteúdo esperada: ACF Repeater "hero_slide" nesta página,
 * com os sub-campos:
 *   jw_media_id_preview  (texto)       - ID do clipe curto (fundo, loop, mudo)
 *   jw_media_id_full     (texto)       - ID do vídeo completo (modal)
 *   client_name          (texto)
 *   title                (texto)
 *   director             (post object) - título do post = nome do diretor
 *
 * Troca de slide: quando o vídeo de fundo termina (evento "complete" do
 * JWPlayer) ou ao clicar/swipe nas laterais — sem temporizador fixo.
 */
get_header(); ?>
<style>
.bodyclass{
	margin-top:0!important;
}
.footland {
    position: absolute;
    bottom: 0;
    z-index: 4;
}

/* ---------- Hero custom ---------- */
.hero-custom {
	position: relative;
	width: 100%;
	height: 100vh;
	overflow: hidden;
	background: #000;
}
.hero-slide {
	position: absolute;
	inset: 0;
	transform: translateX(100%);
	visibility: hidden;
	transition: transform .6s ease-in-out;
	will-change: transform;
	z-index: 1;
}
.hero-slide.is-active {
	transform: translateX(0);
	visibility: visible;
	z-index: 2;
}
.hero-slide-video-mount,
.hero-slide-video-mount video {
	position: absolute;
	inset: 0;
	width: 100%;
	height: 100%;
	object-fit: cover;
}
.hero-slide-video-mount { z-index: 1; }

.hero-slide-overlay {
	position: absolute;
	inset: 0;
	z-index: 3;
	color: #fff;
}
.hero-play-btn {
	position: absolute;
	inset: 0;
	display: flex;
	align-items: center;
	justify-content: center;
	padding: 20px;
	cursor: pointer;
	font-size: 48px;
	z-index: 8;
	opacity: 0;
	transition: opacity .5s linear;
}
.hero-slide:hover .hero-play-btn { opacity: 1; }

.hero-slide-title {
	position: absolute !important;
	bottom: 12vh !important;
	left: 5% !important;
	font-size: 18px !important;
	text-transform: uppercase;
	z-index: 10;
}
.hero-slide-title span {
	font-size: 125%;
}
.hero-slide-director {
	position: absolute !important;
	bottom: 15vh !important;
	left: 5% !important;
	font-size: 18px !important;
	text-transform: uppercase;
	z-index: 10;
}
.hero-slide-director a {
	color: #fff;
	text-decoration: none;
	font-size: 200%;
}
.hero-slide-director a:hover {
	color: #fddf0a;
}
@media screen and (max-width: 768px) {
	.hero-slide-title {
		bottom: 15vh !important;
		font-size: 12px !important;
	}
	.hero-slide-director {
		bottom: 18vh !important;
		font-size: 14px !important;
	}
}

.hero-prev, .hero-next {
	position: absolute;
	top: 0; bottom: 30vh;
	width: 15vw;
	z-index: 5;
	cursor: pointer;
}
.hero-prev { left: 0; }
.hero-next { right: 0; bottom: 0; }

</style>
<script>
	var menua = "front";
</script>
<div class="preloader">
  <div class="logo-container">
    <div class="mask">
      <img src="https://cdn.stationfilm.com/wp-content/uploads/2025/08/16230829/landing-logo.png" alt="Logo Esquerda" class="logo">
    </div>
    <img src="https://cdn.stationfilm.com/wp-content/uploads/2025/08/16230833/landing-arrow.png" alt="Logo Seta" class="seta">
  </div>
</div>

<main id="main" class="vidall">
	<div class="vidcont section" id="film">
		<div class="hero-custom" id="heroCustom">
			<div class="hero-prev prevs" id="heroPrev">&nbsp;</div>
			<div class="hero-next nexts" id="heroNext">&nbsp;</div>

			<?php
			if ( have_rows('hero_slide') ):
				$i = 0;
				while ( have_rows('hero_slide') ): the_row();

					$preview_id   = get_sub_field('jw_media_id_preview');
					$full_id      = get_sub_field('jw_media_id_full');
					$client_name  = get_sub_field('client_name');
					$title        = get_sub_field('title');

					$director      = get_sub_field('director');
					$director_post = $director ? ( is_object($director) ? $director : get_post($director) ) : null;
					$director_name = $director_post ? get_the_title($director_post) : '';
					$director_link = $director_post ? get_permalink($director_post) : '#';
					?>
					<div class="hero-slide<?php echo $i === 0 ? ' is-active' : ''; ?>"
						 data-index="<?php echo esc_attr($i); ?>"
						 data-preview="<?php echo esc_attr($preview_id); ?>"
						 data-full="<?php echo esc_attr($full_id); ?>"
						 data-client="<?php echo esc_attr($client_name); ?>"
						 data-title="<?php echo esc_attr($title); ?>"
						 data-director="<?php echo esc_attr($director_name); ?>">

						<div class="hero-slide-video-mount"></div>

						<div class="hero-slide-overlay">
							<div class="hero-play-btn" role="button" tabindex="0" aria-label="Assistir vídeo completo">▷</div>
							<div class="hero-slide-director">
								<a href="<?php echo esc_url($director_link); ?>"><?php echo esc_html($director_name); ?></a>
							</div>
							<div class="hero-slide-title animaletras-hero">
								<?php echo esc_html(strtoupper($client_name . ' > ' . $title)); ?>
							</div>
						</div>
					</div>
					<?php
					$i++;
				endwhile;
			endif;
			?>
		</div>
	</div>
	<div class="footland footerdowno">
		<div class="social">
			<div class="text-center"><a href="<?php the_field('facebook', 6328); ?>" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a></div>
			<div class="text-center"> <a href="<?php the_field('instagram', 6328); ?>" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a></div>
			<div class="text-center"> <a href="<?php the_field('twitter', 6328); ?>" target="_blank" aria-label="X (Twitter)"><i class="fa-brands fa-x-twitter"></i></a></div>
			<div class="text-center"> <a href="<?php the_field('nmsdc', 6328); ?>" target="_blank" aria-label="NMSDC"><img src="https://cdn.stationfilm.com/wp-content/uploads/2023/03/27163724/NMSDC.png" style="max-height:16px" alt=""></a></div>
		</div>
		<div class="copyright">© <?=date('Y')?> station film. all rights reserved.</div>
	</div>
</main>

<div class="modalvideo align-items-center brancomodal">
	<div id="closevidhome" role="button" tabindex="0" aria-label="Fechar">
		<img src="<?php bloginfo('template_url'); ?>/img/close.png" alt="">
	</div>
	<div class="row bigorna">
		<div class="col-md-1 d-flex align-items-center justify-content-center">
			<div class="arrowsvid" id="dOnly" style="display:none">
				<a href="#" id="vidprev" aria-label="Anterior"><img src="<?php bloginfo('template_url'); ?>/img/prev.png" alt="" class="img-responsive" style="max-height:100%"></a>
			</div>
		</div>
		<div class="col-md-10 d-flex align-items-center justify-content-center">
			<div class="row w-100">
				<div class="col-md-10 mx-auto">
				<div class="embed-responsive embed-responsive-16by9" id="vimeoif">

				</div>
				</div>
			</div>

			<div id="vidif">

			</div>
		</div>

		<div class="col-md-1 d-flex align-items-center justify-content-center">
			<div class="arrowsvid align-self-center" style="display:none">

				<a href="#" id="vidnext" aria-label="Próximo"><img src="<?php bloginfo('template_url'); ?>/img/next.png" alt="" class="img-responsive" style="max-height:100%"></a>

			</div>
		</div>
		<div class="col-12">

			<div id='vidtit' class='text-center w-100'>
				<span id="clientdata" class="font-weight-bold"></span> | "<span id="titledata" class="font-weight-normal"></span>" | <span id="dirdata" class="font-weight-bold"></span>
			</div>
		</div>
	</div>

</div>

<script>
// footer.php tem handlers globais herdados do SmartSlider (ex: fechar modal)
// que chamam _N2.r(...) esperando o slider antigo (#n2-ss-7). Essa página não
// carrega mais o SmartSlider, então _N2 nem existe — este stub evita que esses
// handlers quebrem com "ReferenceError: _N2 is not defined" ao interagir com
// o modal. Não faz nada além de engolir a chamada com segurança.
window._N2 = window._N2 || { r: function () {} };

document.addEventListener('DOMContentLoaded', function () {
	var container = document.getElementById('heroCustom');
	if (!container) return;

	var slides = Array.prototype.slice.call(container.querySelectorAll('.hero-slide'));
	if (!slides.length) return;

	// randomiza a ordem de exibição a cada visita (Fisher-Yates), sem mexer no DOM
	for (var s = slides.length - 1; s > 0; s--) {
		var r = Math.floor(Math.random() * (s + 1));
		var tmp = slides[s];
		slides[s] = slides[r];
		slides[r] = tmp;
	}
	// troca o slide ativo sem animar — desliga a transição, aplica, força reflow,
	// religa. Sem isso, o slide renderizado pelo PHP desliza pra fora e o
	// sorteado desliza pra dentro visivelmente no carregamento da página.
	slides.forEach(function (slide) {
		slide.style.transition = 'none';
		slide.classList.remove('is-active');
	});
	slides[0].classList.add('is-active');
	void container.offsetWidth; // força reflow antes de religar a transição
	slides.forEach(function (slide) { slide.style.transition = ''; });

	var activeIndex = 0;
	var activePlayerMounted = false;

	// Fade escalonado por letra (replica o SplitText do slider antigo:
	// duração 0.8s, stagger 0.05s, ease-out — dispara uma vez quando o
	// slide entra, sem repetir e sem efeito de "digitação").
	function splitLetters(el) {
		if (!el) return;
		var text = el.textContent.trim();
		el.textContent = '';
		var spans = text.split('').map(function (ch) {
			var span = document.createElement('span');
			// espaço normal dentro de um span inline-block é colapsado pelo
			// navegador (renderiza com largura zero) — usa nbsp pra manter o espaço visível
			span.textContent = ch === ' ' ? ' ' : ch;
			span.style.display = 'inline-block';
			span.style.opacity = '0';
			span.style.transition = 'opacity .8s cubic-bezier(0.215, 0.61, 0.355, 1)';
			el.appendChild(span);
			return span;
		});
		// força um reflow antes de aplicar o estado final, senão o navegador
		// não anima a transição (spans já nasceriam com opacity 0 aplicado)
		void el.offsetWidth;
		spans.forEach(function (span, i) {
			span.style.transitionDelay = (i * 0.05) + 's';
			span.style.opacity = '1';
		});
	}

	function animateSlideText(slide) {
		splitLetters(slide.querySelector('.hero-slide-title'));
		var dirLink = slide.querySelector('.hero-slide-director a');
		if (dirLink) splitLetters(dirLink);
	}

	var playerCounter = 0;

	function mountPreview(slide) {
		var mount = slide.querySelector('.hero-slide-video-mount');
		var mediaId = slide.getAttribute('data-preview');
		if (!mount || !mediaId || typeof jwplayer === 'undefined') return;

		// sempre um elemento novo, nunca reaproveita id/div de uma montagem
		// anterior — evitar isso é o que causava o player voltar pausado
		// na segunda vez que o slide reaparecia.
		mount.innerHTML = '';
		var el = document.createElement('div');
		el.id = 'heroBgPlayer-' + (playerCounter++);
		mount.appendChild(el);

		try {
			var player = jwplayer(el.id).setup({
				playlist: 'https://cdn.jwplayer.com/v2/media/' + mediaId,
				mute: true,
				autostart: true,
				repeat: false, // não loopa: ao terminar, avança pro próximo slide
				controls: false,
				stretching: 'fill',
				width: '100%',
				height: '100%'
			});
			player.on('ready', function () {
				player.play(); // reforça o autoplay numa instância recém-criada
			});
			player.on('complete', nextSlide);
			mount.dataset.playerId = el.id;
			activePlayerMounted = true;
		} catch (e) {
			console.warn('hero-slider: falha ao montar preview JW', e);
		}
	}

	function unmountPreview(slide) {
		var mount = slide.querySelector('.hero-slide-video-mount');
		if (!mount) return;
		var playerId = mount.dataset.playerId;
		if (playerId && typeof jwplayer !== 'undefined') {
			try { jwplayer(playerId).remove(); } catch (e) {}
		}
		mount.innerHTML = ''; // destrói o elemento inteiro, não só o id
		delete mount.dataset.playerId;
	}

	var TRANSITION_MS = 600; // precisa bater com a duration do CSS (.hero-slide)
	var isTransitioning = false;

	// direction: 'next' desliza a entrada vindo da direita (saída pela esquerda),
	// 'prev' faz o inverso — vindo da esquerda, saindo pela direita.
	function goTo(index, direction) {
		if (isTransitioning) return; // ignora clique/complete duplicado até a transição atual acabar
		var targetIndex = (index + slides.length) % slides.length;
		if (targetIndex === activeIndex && activePlayerMounted) return;

		isTransitioning = true;
		var current = slides[activeIndex];
		var next = slides[targetIndex];
		var incomingFrom = direction === 'prev' ? '-100%' : '100%';
		var outgoingTo = direction === 'prev' ? '100%' : '-100%';

		// posiciona o próximo fora da tela, do lado certo, sem animar isso
		next.style.transition = 'none';
		next.style.transform = 'translateX(' + incomingFrom + ')';
		next.style.visibility = 'visible';
		next.style.zIndex = '2';
		void next.offsetWidth; // força reflow antes de religar a transição
		next.style.transition = '';

		mountPreview(next);
		animateSlideText(next);

		requestAnimationFrame(function () {
			current.style.transform = 'translateX(' + outgoingTo + ')';
			next.style.transform = 'translateX(0)';
		});

		activeIndex = targetIndex;

		setTimeout(function () {
			unmountPreview(current);
			current.classList.remove('is-active');
			current.style.visibility = 'hidden';
			current.style.zIndex = '1';
			// devolve pro estado neutro (fora da tela à direita), sem animar
			current.style.transition = 'none';
			current.style.transform = 'translateX(100%)';
			void current.offsetWidth;
			current.style.transition = '';

			next.classList.add('is-active');
			isTransitioning = false;
		}, TRANSITION_MS);
	}

	function nextSlide() { goTo(activeIndex + 1, 'next'); }
	function prevSlide() { goTo(activeIndex - 1, 'prev'); }

	function getActivePreviewPlayer() {
		var mount = slides[activeIndex].querySelector('.hero-slide-video-mount');
		var playerId = mount && mount.dataset.playerId;
		if (!playerId || typeof jwplayer === 'undefined') return null;
		try { return jwplayer(playerId); } catch (e) { return null; }
	}

	// init primeiro slide
	mountPreview(slides[activeIndex]);
	animateSlideText(slides[activeIndex]);

	// setas
	var prevBtn = document.getElementById('heroPrev');
	var nextBtn = document.getElementById('heroNext');
	if (prevBtn) prevBtn.addEventListener('click', prevSlide);
	if (nextBtn) nextBtn.addEventListener('click', nextSlide);

	// swipe (Hammer.js já carregado globalmente via footer.php)
	if (typeof Hammer !== 'undefined') {
		var mc = new Hammer(container);
		mc.on('swipeleft', function (ev) {
			if (ev.pointerType !== 'mouse') nextSlide();
		});
		mc.on('swiperight', function (ev) {
			if (ev.pointerType !== 'mouse') prevSlide();
		});
	}

	// abrir modal com vídeo completo (reaproveita o modal original da home:
	// .modalvideo.brancomodal, #vimeoif, #titledata, #clientdata, #dirdata)
	function openFullVideoModal() {
		var slide = slides[activeIndex];
		var fullId = slide.getAttribute('data-full');
		if (!fullId || typeof jwplayer === 'undefined') return;

		var bgPlayer = getActivePreviewPlayer();
		if (bgPlayer) { try { bgPlayer.pause(); } catch (e) {} }

		try { jwplayer('vimeoif').remove(); } catch (e) {}
		try {
			jwplayer('vimeoif').setup({
				playlist: 'https://cdn.jwplayer.com/v2/media/' + fullId,
				width: '100%',
				aspectratio: '16:9',
				stretching: 'fill',
				autostart: true
			});
		} catch (err) {
			console.warn('hero-slider: falha ao montar player do modal', err);
		}

		document.getElementById('clientdata').textContent = slide.getAttribute('data-client') || '';
		document.getElementById('titledata').textContent = slide.getAttribute('data-title') || '';
		document.getElementById('dirdata').textContent = slide.getAttribute('data-director') || '';
		document.querySelector('.modalvideo').style.display = 'flex';
	}

	// Enter/Espaço em elementos role="button" já são convertidos em "click"
	// pelo bridge global de acessibilidade em footer.php — só precisa ouvir click.
	container.addEventListener('click', function (e) {
		if (e.target.closest('.hero-play-btn')) openFullVideoModal();
	});

	function closeFullVideoModal() {
		document.querySelector('.modalvideo').style.display = 'none';
		document.getElementById('vimeoif').innerHTML = '';
		try { jwplayer('vimeoif').remove(); } catch (e) {}

		var bgPlayer = getActivePreviewPlayer();
		if (bgPlayer) { try { bgPlayer.play(); } catch (e) {} }
	}

	document.getElementById('closevidhome').addEventListener('click', closeFullVideoModal);
});
</script>

<?php get_footer(); ?>
