<?php
/* 
Template Name: Directors
*/
get_header(); 
$items = [];

if ( have_rows('first_column') ) :
    while ( have_rows('first_column') ) : the_row();
        $d = get_sub_field('director'); // deixa o ACF formatar normalmente

        if (!empty($d)) {
            if (is_object($d) && isset($d->ID)) {
                // Post Object (WP_Post)
                $post_id = (int) $d->ID;
            } elseif (is_array($d) && isset($d['ID'])) {
                // Algumas configs podem retornar array com chave ID
                $post_id = (int) $d['ID'];
            } else {
                // Já é um ID numérico
                $post_id = (int) $d;
            }

            if ($post_id > 0) {
                $items[] = $post_id;
            }
        }
    endwhile;

    // (Opcional) resetar o ponteiro do repeater se ele for usado depois
    if (function_exists('reset_rows')) {
        reset_rows('first_column');
    }
endif;

// 2) Calcula a divisão nas três colunas
$colu1 = $colu2 = $colu3 = [];
$total = count($items);

if ($total > 0) {
    $base  = intdiv($total, 3);
    $resto = $total % 3;

    $qtd1 = $base;
    $qtd2 = $base;
    $qtd3 = $base;

    if ($resto === 1) {
        $qtd2++;
    } elseif ($resto === 2) {
        $qtd1++;
        $qtd2++;
    }

    // 3) Fatia mantendo a ordem: preenche $colu1, depois $colu2, depois $colu3
    $i = 0;
    $colu1 = array_slice($items, $i, $qtd1); $i += $qtd1;
    $colu2 = array_slice($items, $i, $qtd2); $i += $qtd2;
    $colu3 = array_slice($items, $i, $qtd3);
}

// 4) Render helpers
function render_col($arr) {
    foreach ($arr as $post_id) {
        // título cru + maiúsculas com suporte a acentos
        $title = get_post_field('post_title', $post_id);
        $title = $title !== null ? mb_strtoupper($title, 'UTF-8') : '';

        echo '<div class="lpdiv w-100 text-center text-lg-left">';
        echo    '<a href="' . esc_url(get_permalink($post_id)) . '" class="animaletras after">'
                    . esc_html($title) .
                '</a>';
        echo '</div>';
    }
}
?>

<style>
.bodyclass{
	margin-top:0 !important;
}
</style>
<script>
	var menua = "nav-dir";
</script>
<section class="directors  vidallmob" id="main" role="main">
	<div class="dircont  d-flex align-items-center section" id="directors"> 
		<div class="dirlist">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12" id="visualgrid">
						<div class="row d-flex justify-content-center align-items-start grid-adjust1" >
							<div class="col-12 col-lg">
								<div class="d-flex justify-content-center justify-content-xl-end">
									<div class="list-unstyled lp px-4">
										<?php render_col($colu1); ?>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg">
								<div class="d-flex justify-content-center">
									<div class="list-unstyled lp px-4">
										<?php render_col($colu2); ?>
									</div>
								</div>
							</div>

							<div class="col-12 col-lg">
								<div class="d-flex justify-content-center justify-content-xl-start">
									<div class="list-unstyled lp px-4">
										<?php render_col($colu3); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footland footerdown footdir">
		<div class="social">
			<div class="text-center"><a href="<?php the_field('facebook', 6328); ?>" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a></div>
			<div class="text-center"> <a href="<?php the_field('instagram', 6328); ?>" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a></div>
			<div class="text-center"> <a href="<?php the_field('twitter', 6328); ?>" target="_blank" aria-label="X (Twitter)"><i class="fa-brands fa-x-twitter"></i></a></div>
			<div class="text-center"> <a href="<?php the_field('nmsdc', 6328); ?>" target="_blank" aria-label="NMSDC"><img src="https://cdn.stationfilm.com/wp-content/uploads/2023/03/27163724/NMSDC.png" style="max-height:16px" alt=""></a></div>
			
		</div>
				<div class="copyright">© <?=date('Y')?> station film. all rights reserved.</div>

	</div>
</section>

<?php get_footer(); ?>
