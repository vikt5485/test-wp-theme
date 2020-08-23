
<?php 
$post_count = 0;
// the query
$wpb_all_query = new WP_Query(array('post_type'=>'projects', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
 
<?php if ( $wpb_all_query->have_posts() ) : ?>

<section id="projects" class="fade_in">
    <h1>Projekter</h1>
 
    <!-- the loop -->
    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
    

    <a href="<?php the_permalink(); ?>">
                <article class="project" style="background: <?php 
                $main_color = get_field("color");
                $lighter_color = color_luminance(get_field("color"), 0.3);
                $post_count++;
                
                echo "linear-gradient(
                    315deg,
                    {$main_color} 0%,
                    {$lighter_color} 100%
                  )";
                ?>;">
                    <figure>
                        
                        <img src="<?php
                        $image = get_field('main_image');
                        echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    </figure>
                    <div class="overlay">
                        <div class="overlay_bg" style="background: <?php 
                            $main_color = get_field("color");
                            $lighter_color = color_luminance(get_field("color"), 0.3);
                
                            echo "linear-gradient(
                                315deg,
                                {$main_color} 0%,
                                {$lighter_color} 100%
                            )";
                            ?>;"></div>
                        <div class="overlay_content">
                            <h2><?php the_title(); ?></h2>
                            <p><?php the_field("short"); ?></p>
                        </div>
                    </div>
                </article>
            </a>



    <?php endwhile; ?>
    <!-- end of the loop -->
 
</section>
 
    <?php wp_reset_postdata(); ?>
 
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


<?php if($post_count % 2): ?>
    <style type="text/css">
        #projects > a:last-of-type {
            transform: translateX(50%);
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