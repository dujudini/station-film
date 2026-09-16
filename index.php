<?php
get_header();
?>
<script>
  var menua = "nav-news";
</script>
<section class="news vidallmob" id="main" role="main">
  <div class="container-fluid">
    <div class="row">
      <?php 
      if ( have_posts() ) {
          $i = 0;
          while ( have_posts() ) {
              the_post();
              include(locate_template('/template-parts/content.php')); 
              if ($i==2){ $i=0; } else { $i++; }
          }
      }
      ?>
      <!-- Sentinela para o IntersectionObserver -->
      <div id="infinite-sentinel" class="col-12" aria-hidden="true"></div>
    </div>
  </div>
</section>
<?php
get_footer();
