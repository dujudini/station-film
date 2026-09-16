<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package station19
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://cdn.stationfilm.com/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />	
	<link rel="stylesheet" href="https://use.typekit.net/htc1mya.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class('bodyclass'); ?>>
<a class="skip-link screen-reader-text" href="#main">Pular para o conteúdo</a>
<nav class="navbar navbar-light fixed-top navbar-expand-lg">
    <div class="container-fluid" >
        <a href="<?php echo "//$_SERVER[HTTP_HOST]";?>" class="navbar-brand">
			<img class="img-fluid logo-white" src="https://cdn.stationfilm.com/wp-content/uploads/2025/08/15180220/station-white.png" alt="Station Film" width="211" height="42">
			<img class="img-fluid logo-black" src="https://stationfilm.com/wp-content/uploads/2019/04/logo.png" alt="Station Film" width="211" height="42">
		</a>
        <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbar9" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar9">
            <ul class="navbar-nav ml-auto" style="text-transform:uppercase;font-weight:bold">
                <li class="nav-item">
                    <a class="nav-link nav-dir" href="/directors">Directors</a>
                </li>
				
				<li class="nav-item">
                    <a class="nav-link nav-soc" href="/social">Social</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link nav-film" href="/originals">Originals</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link nav-news" href="/news">News</a>
                </li>	
				<li class="nav-item">
                    <a class="nav-link nav-contact" href="/contact">Contact</a>
                </li>
				
            </ul>
        </div>
    </div>
</nav>

