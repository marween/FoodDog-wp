<?php ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset= "<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Crimson+Text|Open+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/dist/styles.css">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
    <h1 class='text-center crimson '><a href="<?php echo home_url()?>" class='text-dark'><?php bloginfo('name'); ?></a></h1> 

	<?php wp_nav_menu( array( 
		'container'       => 'nav',
		'theme_location' 	=> 'main-menu', 
		'menu_class' 		=> 'nav justify-content-center text-uppercase' 
	)); ?>


	