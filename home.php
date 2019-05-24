<?php
/**
 * The main template file
 */

get_header(); ?>

<div class=" mx-auto container">
	<div class="d-flex flex-wrap">
		<div class ="px-4 col-lg-8 col-sm-12">
			<div ><h5 class="block-title">Featured Post</h5></div>
			<?php $args = array(
				'posts_per_page' => 5,
				'meta_key' => 'meta-checkbox',
				'meta_value' => 'yes'
			);
			$featured = new WP_Query($args);

			if ($featured->have_posts()): while($featured->have_posts()): $featured->the_post(); ?>
				<div class='d-flex py-4'>
					<?php if (has_post_thumbnail()) : ?>
						<figure><?php the_post_thumbnail('medium'); ?> </figure>

						<?php endif; ?>
					<div class='content pl-4'>
						<p class="text-warning f-75 text-uppercase"><?php the_category(' '); ?></p>
						<h3>
							<a href="<?php the_permalink(); ?>"class="font-weight-bold text-uppercase text-dark"> 
							<?php the_title(); ?></a>
						</h3>
						<p><?php the_excerpt();?></p>
						
					</div>
				</div>
					<?php endwhile; else: endif; ?>
			<div>
				<h5 class="block-title">lastest Post</h5>
			</div>
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

		<div class ='col-lg-4 col-sm-12'>
			<?php if( is_active_sidebar( 'zone-widgets-4' ) ):
				dynamic_sidebar( 'zone-widgets-4' );
			endif;?>
		</div>
	</div>
</div>

<?php 
get_footer();
?>


