<div class="project_body">
<section class="project_wrap">
    <article class="project_content">
        <h1><?php the_title(); ?></h1>
        <p class="small"><?php the_field("project_type");?></p>
        <p><?php the_field("long") ?></p>
        <figure class="mobile_img">
            <img src="<?php
                        $image = get_field('secondary_image');
                        echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
        </figure>
        <?php if(get_field("project_type") == "Gruppeprojekt"): ?>
        <p>Ansvarsområder</p>
        <ul><?php 
            $responsibility = get_field("responsibilities");
            $responsibility = '<li>'.str_replace(array("\r","\n\n","\n"),array('',"\n","</li>\n<li>"),trim($responsibility,"\n\r")).'</li>';
            $responsibility = strip_tags($responsibility, "<li>");

            echo $responsibility;
            ?></ul>
        <?php endif; ?>
        <a href="<?php the_field("github_url") ?>" target="_blank">Github
                    repository </a><span>👾</span><br><br>
        <a href="<?php the_field("project_url") ?>" target="_blank" class="button">Besøg hjemmeside her</a>
    </article>

    <?php
        $previous_post_url = get_permalink( get_adjacent_post(false,'',false)->ID );
        $next_post_url = get_permalink( get_adjacent_post(false,'',true)->ID );
    ?>


    <div class="arrows">
    <?php if($previous_post_url != get_permalink()): ?>
    <a href="<?php echo $previous_post_url ?>">
        <div class="prev">
        <?php echo wp_get_attachment_image(48) ?>
        
       
        </div>
    </a>
    <?php endif; ?>
    <?php if($next_post_url != get_permalink()): ?>
    <a href="<?php echo $next_post_url ?>">
        <div class="next">
        <?php echo wp_get_attachment_image(49) ?>
           
        </div>
    </a>
    <?php endif; ?>
    </div>
</section>
</div>

<?php if($previous_post_url == get_permalink()): ?>
    <style type="text/css">
        .project_body .project_wrap .arrows {
            justify-content: flex-end;
        }
        </style>
<?php endif; ?>


<?php if(!is_front_page()): ?>
        <style type="text/css">
        body {
            background: <?php 
                $main_color = get_field("color");
                $lighter_color = color_luminance(get_field("color"), 0.3);
                
                echo "linear-gradient(
                    315deg,
                    {$main_color} 0%,
                    {$lighter_color} 100%
                  )";
                ?>;
        }
        </style>
<?php endif; ?>


<?php 

function color_luminance( $hex, $percent ) {
	
	// validate hex string
	
	$hex = preg_replace( '/[^0-9a-f]/i', '', $hex );
	$new_hex = '#';
	
	if ( strlen( $hex ) < 6 ) {
		$hex = $hex[0] + $hex[0] + $hex[1] + $hex[1] + $hex[2] + $hex[2];
	}
	
	// convert to decimal and change luminosity
	for ($i = 0; $i < 3; $i++) {
		$dec = hexdec( substr( $hex, $i*2, 2 ) );
		$dec = min( max( 0, $dec + $dec * $percent ), 255 ); 
		$new_hex .= str_pad( dechex( $dec ) , 2, 0, STR_PAD_LEFT );
	}		
	
	return $new_hex;
}

?>