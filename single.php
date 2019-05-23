<?php
/**
 * The template for displaying category
 */

get_header();?>

<div class ="container">
	<?php the_category(''); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="py-1 bot-line">

		<h5 class="font-weight-bold text-uppercase text-dark text-center"><?php the_title();?></h5>
		
		<?php if ( has_post_thumbnail() ) : ?>
	   			<?php the_post_thumbnail('medium', array('class'=>' d-block mx-auto w-100 ofc')); ?>   
		<?php endif; ?>

		<div class="content text-justify">
			<div class="cg f-75"><?php the_content(); ?></div>
		</div>

	</div>
		
		<?php comments_template(); ?>
		
	<?php endwhile ;
	
	 else: ?>
	<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>

</div>

<?php get_footer(); ?>