<?php 
$config = array(
	'thumbnails' => [
		array(
			'size_name' => 'banner-d',
			'width' => 2408,
			'height' => 1240,
			'crop' => 'true'
		),
	],
	'generate_placeholder_images' => "true",
	'menus' => [
		
		array(
			'menu_name' => 'Topics Menu',
			'menu_slug' => 'topics-menu',
		),

	],
	'custom_templates' => [
		
		array(
			'template_name' => 'Site Front Page',
			'file_name' => 'site-front-page.php',
		),
		
	]
);


// Thumbnails
$thumbnails_code = '';
$thumbnails = @$config['thumbnails'];
if($thumbnails){
	foreach($thumbnails as $thumbnail){
		$thumbnails_code.="add_image_size( '".$thumbnail['size_name']."', ".$thumbnail['width'].", ".$thumbnail['height'].", ".$thumbnail['crop']." ); \n";

		// generate placeholder images
		if($config['generate_placeholder_images'] == true){
			generate_image($thumbnail['size_name'], $thumbnail['width'], $thumbnail['height'], '#f1f0fd');
		}
	}

	echo '<pre>';
	echo $thumbnails_code;
	echo '</pre>';
}


// Menus
$menus_code = '';
$menus = @$config['menus'];
if($menus){
	$menus_code.="register_nav_menus( \n
	array( \n";
	
	foreach($menus as $menu){
		$menus_code.="		'".$menu['menu_slug']."' => __( '".$menu['menu_name']."', 'amd' ), \n";
	}
	
	$menus_code.="	) \n
); \n";

	echo '<hr/>';

	echo '<pre>';
	echo $menus_code;
	echo '</pre>';
}



// Custom Templates
$custom_templates = @$config['custom_templates'];
if($custom_templates){
	echo '<hr/>';
	foreach($custom_templates as $custom_template){
		$template_code = 
'<?php
/*
*  Template Name: '.$custom_template['template_name'].'
*/
?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<section id="content" class="clearfix">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-title"><?php the_title();?></h1>

				<div class="page-content">
					<?php get_thumb("featured-1200x400", "featured-image", ""); ?>

					<?php the_content();?>
				</div>
				<!-- /.page-content -->
			</div>
		</div>
	</div>
</section>
<!-- #content ends -->

<?php endwhile; endif; ?>

<?php get_footer(); ?>
';	
		$template_file_name = $custom_template['file_name'];
		file_put_contents("generated_files/".$template_file_name, $template_code);

		echo '<pre>';
		echo "File generated: ".$template_file_name."\n";
		echo '</pre>';
	}
}



// Place all generated code in one snippet file
$generated_code = "";
if(!empty($thumbnails_code)){
	$generated_code .= $thumbnails_code."\n\n\n";
}
if(!empty($menus_code)){
	$generated_code .= $menus_code."\n\n\n";;
}

if (!file_exists('generated_files')) {
	mkdir("generated_files");
}
file_put_contents("generated_files/snippets.php", $generated_code);





// Helper Functions
function generate_image($name, $width, $height, $color_hex){
	$im = imagecreatetruecolor($width, $height);

	// sets background color
	list($r, $g, $b) = sscanf($color_hex, "#%02x%02x%02x");
	$color = imagecolorallocate($im, $r, $g, $b);


	// generate image
	imagefill($im, 0, 0, $color);
	imagejpeg($im, "generated_files/".$name.'.jpg');
	imagedestroy($im);
}
