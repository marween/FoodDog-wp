<?php
/**
 * The template for displaying category
 */

get_header();?>

<h2 class="text-center alert alert-secondary text-uppercase"><?php single_cat_title(); ?></h2>

<div class ="mx-auto container">
	<div class="d-flex flex-wrap">
		<div class ="px-4 col-lg-8 col-sm-12">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="row py-4 bot-line">
					
					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail('thumbnail'); ?>   
					<?php endif; ?>

					<div class="content pl-4 w-75">
						<p class="text-warning f-75 text-uppercase"><?php single_cat_title(); ?> </p>
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
		<div class ='col-lg-4 col-sm-12'>
			<?php if( is_active_sidebar( 'zone-widgets-4' ) ):
				dynamic_sidebar( 'zone-widgets-4' );
			endif;?>
		</div>
	</div>
</div>

<?php get_footer(); ?>

