<?php
/*
Template Name: News
*/
?>
 
<?php
$numposts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish'");
if (0 < $numposts) $numposts = number_format($numposts);
?>
 
<h2>Historial de Artículos</h2>
<p>A continuación muestro un listado con todos los post publicados hasta la fecha.</p>
 
<ul id="archive-list">
<?php
$myposts = get_posts('numberposts=-1&');
foreach($myposts as $post) : ?>
<li><?php the_time('m/d/y') ?>: <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php endforeach; ?>
</ul>