<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package station19
 */

?>



<?php wp_footer(); ?>
<script src="https://cdn.stationfilm.com/js/jwplayer/jwplayer.js"> </script>
<script>jwplayer.key="FPjpLU/STmOAUTnuBCLJur/H+kYnimBCfeDP3ubv1hI=";</script>
<script src="https://cdn.stationfilm.com/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.stationfilm.com/js/hammer.min.js"></script>


<script>

	function isScrolledIntoView(elem) {
  var docViewTop = $(window).scrollTop();
  var docViewBottom = docViewTop + $(window).height();

  var elemTop = $(elem).offset().top;
  var elemBottom = elemTop + $(elem).height();

  return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}
function intervalo(i){
$(".char"+i).addClass("d-flex justify-content-center");	
}


	jQuery(document).ready(function(){
		$(".animaletras").each(function() {
			const $link = $(this);
			const texto = $link.text().trim();
			$link.empty(); // limpa o conteúdo

			// cria um span para cada letra
			for (let i = 0; i < texto.length; i++) {
			  const ch = $("<span>").text(texto[i]);
			  ch.css("color", "transparent"); // invisível no início
			  $link.append(ch);
			}

			const $spans = $link.find("span");
			let i = 0;
			const timer = setInterval(() => {
			  $spans.eq(i).css("color", "black"); // revela letra
			  i++;
			  if (i >= $spans.length) clearInterval(timer);
			}, 60); // velocidade (ms) por letra
		});
		if($('#swipe').length){
		var myElement = document.getElementById('swipe');
			// create a simple instance
			// by default, it only adds horizontal recognizers
			var mc = new Hammer(myElement);

			// listen to events...
			mc.on("swipeleft", function(ev) {
				if(ev.pointerType!="mouse"){
					var linkn = $(".nextclick").find("a").attr("href");
					if(linkn != null){
						window.location.href=linkn;
					}
				}
			});
			mc.on("swiperight", function(ev) {
				if(ev.pointerType!="mouse"){
					var linkp =$(".prevclick").find("a").attr("href");
					if(linkp != null){
						window.location.href=linkp;
					}
				}
			});
		}
		if($('.modalvideo').length){
		var myElement1 = document.getElementsByClassName('modalvideo')[0];
			// create a simple instance
			// by default, it only adds horizontal recognizers
			var mc1 = new Hammer(myElement1);

			// listen to events...
			mc1.on("swipeleft", function(ev) {
				if(ev.pointerType!="mouse"){
					$("#vidnext").trigger("click");
				}
			});
			mc1.on("swiperight", function(ev) {
				if(ev.pointerType!="mouse"){
					$("#vidprev").trigger("click");

				}
			});
		}
		if(menua != "front"){
			$('.'+menua).addClass('active');
		}

		$(".clickhome").click(function(e){	
			var edata = $(".n2-ss-slide-active").find(".alldata");
			console.log(edata.data("vimeoif"));
			_N2.r('#n2-ss-7', function () {
				_N2['#n2-ss-7'].pauseAutoplay();
			});

			var vimeoif = edata.data('vimeoif');
			var titd = edata.data('titvid');
			var clid = edata.data('client');
			var dird = edata.data('dir');

			
			var ifram = '<iframe class="embed-responsive-item" src="https://cdn.jwplayer.com/players/'+vimeoif+'-cNcjpdh7.html"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>'
			//$('#vimeoif').html(ifram);
			var playerInstance = jwplayer("vimeoif");
			playerInstance.setup({
			  playlist: 'https://cdn.jwplayer.com/v2/media/'+vimeoif,
			  width: "100%",
			  aspectratio: "16:9",
			  stretching: "fill",
			  autostart: 'true',
			});

			$('#titledata').text(titd);
			$('#clientdata').text(clid);
			$('#dirdata').html(dird);
			
			$('.modalvideo').css("display","flex");
		});
		
		$("body").on( "click", "#closevidhome",function(){
			$('#vimeoif').html("");
			$('.modalvideo').css("display","none");
			_N2.r('#n2-ss-7', function () {
				_N2['#n2-ss-7'].startAutoplay();
				var slider = _N2['#n2-ss-7'];
				slider.next();
			});

		});
		$("body").on( "click", "#closevidsoc",function(){
			$('#vimeoif').html("");
			$('.modalvideosoc').css("display","none");
			$("body").removeClass("modal-open");
		});
		$(".videoback").hover(
			function() {
				var tvideo = $( this ).data("video");
				document.getElementById(tvideo).play();
			}, function() {
				var tvideo = $( this ).data("video");
				document.getElementById(tvideo).pause();
				document.getElementById(tvideo).currentTime = 0;
			}
		);
		$('.clickvideopost').click(function(e){	
				e.preventDefault();
				var vratio = $(this).data("ratio");
				var vimeoif = $(this).data('vimeoif');
				var playerInstance = jwplayer("vimeoifnews");
				playerInstance.setup({
				  playlist: 'https://cdn.jwplayer.com/v2/media/'+vimeoif,
				  width: "100%",
				  aspectratio: vratio,
				  stretching: "fill",
				  autostart: 'true',
				});
					
		});

		$("body").on( "click", ".prevs", function(){
			var idz = $(".n2-ss-slider").attr('id');
			_N2.r('#n2-ss-7', function(){
				var slider = _N2['#n2-ss-7'];
				slider.previous();
			});
		});
		$("body").on( "click", ".nexts",function(){
			var idz = $(".n2-ss-slider").attr('id');
			_N2.r('#n2-ss-7', function(){
				var slider = _N2['#n2-ss-7'];
				slider.next();
			});
		});
		$( ".aboutclick" ).click(function() {
			$( ".aboutshow" ).slideToggle( "fast", function() {
				   $('html, body').animate({ scrollTop: $("body")[0].scrollHeight }, "slow");     
			});
		});
		//$('.collapse').on('show.bs.collapse', function () {
		//	$(".clickdir").removeClass('active');
		//	$($(this).data('clickdir')).addClass('active');
		//});
		//$('.collapse').on('hide.bs.collapse', function () {
		//	$(".clickdir").removeClass('active');
		//	$($(this).data('clickdir')).removeClass('active');
		//});
		// $('.collapse').on('shown.bs.collapse', function () {
		//	$('html, body').animate({ scrollTop: $("body")[0].scrollHeight }, "slow");       
		// });
		 $('.clickvideo1').click(function(e){	
				e.preventDefault();
				var numb = parseInt($(this).data('ind'));
				var vimeoif = $(this).data('vimeoif');
				if($(this).data('news')==true){
					var listvid = $('.listvidall').html();
					var lct = $('.listvidall').children("div").length;
					var datanews = true;
				}else{
					var listvid = $(this).parents(".row").find('.listvid').html();
					var lct = $(this).parents(".row").find('.listvid').children("div").length;
					var datanews = false;
				}
				
				var titd = $(this).data('titvid');
				var clid = $(this).data('client');
				var dird = $(this).data('dir');
				$("#vidif").html(listvid);
				$('#vidif .carvids').removeClass('ativovid');
				$('#vidif .carvid'+numb).addClass('ativovid');
				
				var ifram = '<iframe class="embed-responsive-item" src="https://cdn.jwplayer.com/players/'+vimeoif+'-cNcjpdh7.html"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>'
				//$('#vimeoif').html(ifram);
				var playerInstance = jwplayer("vimeoif");
				playerInstance.setup({
				  playlist: 'https://cdn.jwplayer.com/v2/media/'+vimeoif,
				  width: "100%",
				  aspectratio: "16:9",
				  stretching: "fill",
				  autostart: 'true',
				  mute: 'false'
				});
				if(lct>1){
					playerInstance.on('complete', function(){
						$("#vidnext" ).trigger( "click" );
					});
					$(".arrowsvid").show();
				}else{
					$(".arrowsvid").hide();
				}
				$('#titledata').text(titd);
				$('#clientdata').text(clid);
				$('#dirdata').html(dird);
				
				$('.modalvideo').css("display","flex");
			});
		 $('.clickimage1').click(function(e){	
				e.preventDefault();
				var numb = parseInt($(this).data('ind'));
				var imageif = $(this).data('imageif');
				var listvid = $(this).parents(".row").find('.listvid').html();	
				var titd = $(this).data('titimg');
				$("#vidif1").html(listvid);
				$('.carvids1').removeClass('ativoimg');
				$('.carvid1'+numb).addClass('ativoimg');
				var ifram = '<img src="'+imageif+'" style="max-height:100%">';
				$('#vimeoif1').html(ifram);
				$('#titledata1').text(titd);
				$('.modalimg').css("display","flex");
			});

		 $('#vidnext').click(function(e){	
			e.preventDefault();
			var atual = $('.ativovid');
			if (atual.next("div").length) {
				var proxi = atual.next("div");
			}else{
				var proxi = $("#vidif div").first("div");
			}

			atual.removeClass('ativovid');
			proxi.addClass('ativovid');
			var titd = proxi.data('titvid');
			var clid = proxi.data('client');
			var dird = proxi.data('dir');
			var vimeoif = proxi.data('vimeoif');
			var ifram = '<iframe class="embed-responsive-item" src="https://cdn.jwplayer.com/players/'+vimeoif+'-cNcjpdh7.html"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>'
			//$('#vimeoif').html(ifram);

			var playerInstance = jwplayer("vimeoif");
				playerInstance.setup({
				  playlist: 'https://cdn.jwplayer.com/v2/media/'+vimeoif,
				  width: "100%",
				  aspectratio: "16:9",
				  stretching: "fill",
				  autostart: 'true',
				   mute: 'false'
				});
				playerInstance.on('complete', function(){
						$("#vidnext" ).trigger( "click" );
					});
			$('#titledata').text(titd);
			$('#clientdata').text(clid);
			$('#dirdata').html(dird);

		});
		$('#vidprev').click(function(e){	
			e.preventDefault();
			var atual = $('.ativovid');
			if (atual.prev("div").length) {
				var proxi = atual.prev("div");
			}else{
				var proxi = $("#vidif div").last("div");
			}
			atual.removeClass('ativovid');
			proxi.addClass('ativovid');
			var titd = proxi.data('titvid');
			var clid = proxi.data('client');
			var dird = proxi.data('dir');
			var vimeoif = proxi.data('vimeoif');
			var ifram = '<iframe class="embed-responsive-item" src="https://cdn.jwplayer.com/players/'+vimeoif+'-cNcjpdh7.html" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>'
			//$('#vimeoif').html(ifram);
			var playerInstance = jwplayer("vimeoif");
				playerInstance.setup({
				  playlist: 'https://cdn.jwplayer.com/v2/media/'+vimeoif,
				  width: "100%",
				  aspectratio: "16:9",
				  stretching: "fill",
				  autostart: 'true',
				   mute: 'false'
				});
				playerInstance.on('complete', function(){
						$("#vidnext" ).trigger( "click" );
					});
			$('#titledata').text(titd);
			$('#clientdata').text(clid);
			$('#dirdata').html(dird);
		});	
		$('#vidnext1').click(function(e){	
			e.preventDefault();
			var atual = $('.ativoimg');
			if (atual.next("div").length) {
				var proxi = atual.next("div");
			}else{
				var proxi = $("#vidif1 div").first("div");
			}
			
			atual.removeClass('ativoimg');
			proxi.addClass('ativoimg');
			var titd = proxi.data('titimg');
			var imageif = proxi.data('imageif');
				var ifram = '<img src="'+imageif+'" style="max-height:100%">';
			$('#vimeoif1').html(ifram);
			$('#titledata1').text(titd);

		});
		$('#vidprev1').click(function(e){	
			e.preventDefault();
			var atual = $('.ativoimg');
			if (atual.prev("div").length) {
				var proxi = atual.prev("div");
			}else{
				var proxi = $("#vidif1 div").last("div");
			}
			atual.removeClass('ativoimg');
			proxi.addClass('ativoimg');
			var titd = proxi.data('titimg');
			var imageif = proxi.data('imageif');
			var ifram = '<img src="'+imageif+'" style="max-height:100%">';
			$('#vimeoif1').html(ifram);
			$('#titledata1').text(titd);
		});	
		$("body").on( "click", "#closevid",function(){
			$('#vimeoif').html("");
			$('.modalvideo').css("display","none");
		});
		$("body").on( "click", "#closevid1",function(){
			$('#imageif').html("");
			$('.modalimg').css("display","none");
		});
		const preloader = $(".preloader");

		setTimeout(() => {
			preloader.css({
				"opacity": "0",
				"transition": "opacity 1s ease-in-out"
			});
			setTimeout(() => {
				preloader.css("display", "none");
			}, 1000); // Fade-out duration
		}, 3000); // Tempo total da animação
		$(".seta").addClass("active");
		// Acessibilidade: elementos com role="button" (divs/li's usados como
		// toggle, ex: accordion de diretor) não recebem ativação por teclado
		// de graça — Enter/Espaço precisam disparar o mesmo clique.
		$("body").on("keydown", '[role="button"]', function(e){
			if (e.key === "Enter" || e.key === " ") {
				e.preventDefault();
				$(this).trigger("click");
			}
		});
		$("body").on( "click", ".clicksocvideo",function(){
			const el = $(this);
			const vimeoif = el.data("vimeoif");
			const ratio   = el.data("ratio"); // ex: "9:16", "16:9", etc.
			const clid    = el.data("client");
			const dird    = el.data("dir");

			const videofile = "https://cdn.jwplayer.com/manifests/" + vimeoif + ".m3u8";
			console.log(vimeoif);
			// Mostra modal antes de medir
			$("body").addClass("modal-open");
			$(".modalvideosoc").css("display","block");

			const $box = $(".video-box"); // wrapper do player
			sizeVideoBox($box, ratio);

			// Configura o JW ocupando 100% da caixa já dimensionada
			const player = jwplayer("vimeoif");
			player.setup({
			  file: videofile,
			  width: "100%",
			  height: "100%",
			  stretching: "exactfit", // mantém proporção (a caixa já está no ratio do vídeo)
			  autostart: true
			});

			$(".clientdata").text(clid);
			$(".dirdataz").html(dird);
			
			
			// Redimensiona ao mudar viewport (sem reconfigurar o player)
			$(window).off("resize.videobox").on("resize.videobox", () => {
			  onResize(() => sizeVideoBox($box, ratio));
			});
		});
	});
</script>
</body>
</html>
