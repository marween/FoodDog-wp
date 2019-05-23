<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 */

get_header(); ?>


<div class ="container px-4">
	<h5>Featured Post</h5>
	<?php
	$args = array(
		'posts_per_page' => 5,
		'meta_key' => 'meta-checkbox',
		'meta_value' => 'yes'
	);
	$featured = new WP_Query($args);

	if ($featured->have_posts()): while($featured->have_posts()): $featured->the_post(); ?>
		<div class='d-flex py-4'>
			<?php if (has_post_thumbnail()) : ?>
			<figure><?php the_post_thumbnail('medium'); ?> </figure>
			
			<?php
		endif; ?>
		<div class='content pl-4'>
			<p class="text-warning f-75 text-uppercase"><?php the_category(' '); ?></p>
			<h3><a href="<?php the_permalink(); ?>"  class="font-weight-bold text-uppercase text-dark"> <?php the_title(); ?></a></h3>
			<p ><?php the_excerpt();?></p>
		</div>
		
		</div>
	<?php endwhile; else:
endif;
?>
<h5>lastest Post</h5>
<div class ="d-flex flex-wrap">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<div class="column py-4 w-50 pr-4">
			<div class="content">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail('medium'); ?>   
				<?php endif; ?>
				<p class="text-warning f-75 text-uppercase"><?php the_category(''); ?> </p>
				<a href="<?php the_permalink() ?>">
					<h5 class="font-weight-bold text-uppercase text-dark"><?php the_title();?></h5>
				</a>
				<div class="cg f-75"><?php the_excerpt(); ?></div>
			</div>
		</div>

	<?php endwhile ;
	the_posts_pagination( array(
		'mid_size'  => 2,
		'prev_text' => __( '<' ),
		'next_text' => __( '>' ),
		'screen_reader_text' => __('&nbsp;'),
	));
	else: ?>
		<p>Sorry, no posts matched your criteria.</p>

	<?php endif; ?>
</div>
</div>


<?php 
get_footer();
?>


