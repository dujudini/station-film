<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package station19
 */

get_header();
?>
<style>
@font-face {
    font-family: 'VCR';
    src: url('//stationfilm.com/wp-content/themes/station19/fonts/vcr_osd_mono-webfont.woff2') format('woff2'),
         url('//stationfilm.com/wp-content/themes/station19/fonts/vcr_osd_mono-webfont.woff') format('woff');
    font-weight: normal;
    font-style: normal;

}
    body {
        background: url('https://stationfilm.com/wp-content/uploads/2019/07/poster.jpg');
        background-size: cover;
    }
.bodyclass{
	margin-top:0;
	font-family:"VCR";
}
h1{
	font-size:4em;
}
.navbar{
	display:none;
}

body,html,.e404,.t404 {
    width:	100vw;
    height: 100vh;
	height: calc(var(--vh, 1vh) * 100);
    margin: 0;
	position:absolute;
	top:0;
	overflow:hidden;


}
#videoBG {
    position:fixed;
    z-index: -1;
}
@media (min-aspect-ratio: 16/9) {
    #videoBG {
        width:100%;
        height: auto;
    }
}
@media (max-aspect-ratio: 16/9) {
    #videoBG { 
        width:auto;
        height: 100%;
    }
}

.h3{
	position:absolute;
	bottom:15%;
		z-index: 2
}
.h3 a, .h3 a:visited,.h3 a:hover {
	color:#fff;
	text-decoration:underline;
}
h3{
	padding:30px;
	background-color:#000;
	color:#fff;
	margin:0 auto;
}
.h5{
	position:absolute;
	top:5%;
	right:5%;
}
h5{
	color:#33ff54;
	margin:0 auto;
	font-size:5rem;
}
.logo{
	margin: 30px 0 0 30px
}
@media (max-width: 767px) {
    #videoBG {
        display: none;
    }

	h3{
		font-size: 1rem;
	}
	h5{
		font-size: 3rem;
	}
	.logo{width:100vw;
		height: 100vh;
		margin: 0;
		z-index:0;
		position:relative;
		top:40%;
		text-align:center
	}
	.logo img {max-width:90%;height:auto;}
	
}
</style>
<section class="e404" id="main" role="main">
	<video id="videoBG" poster="https://stationfilm.com/wp-content/uploads/2019/07/poster.jpg" autoplay muted loop aria-hidden="true" tabindex="-1">
            <source src="https://stationfilm.com/wp-content/uploads/2019/07/tv-noisy.mp4" type="video/mp4">
    </video>
	<div class="t404">
		<div class="h3 w-100 d-flex justify-content-center">
			<h3 class="text-center">Weak or No Signal<br><a href="https://stationfilm.com">Try Another Channel ?</a></h3>
		</div>
		<div class="h5">
			<h5>404</h5>
		</div>
		<div class="logo">
			<a href="https://stationfilm.com"><img src="https://stationfilm.com/wp-content/uploads/2019/07/logo-tp.png" style="max-width:200px;" alt="Station Film"></a>
		</div>
	</div>
</section>

	
<?php
get_footer();
