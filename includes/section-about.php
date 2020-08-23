<section id="about" class="fade_in">
    <div id="about_wrap">
        <div>
            <h1><?php the_field("about_header") ?></h1>
            <img src="<?php
                        $image = get_field('about_image');
                        echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" id="desk_img">
            <p><?php the_field("about_text") ?></p>
            <ul><?php 
            $experienceP = get_field("experience_text");
            $experienceP = '<li>'.str_replace(array("\r","\n\n","\n"),array('',"\n","</li>\n<li>"),trim($experienceP,"\n\r")).'</li>';
            $experienceP = strip_tags($experienceP, "<li>");


            echo $experienceP;
            
            
            
            ?></ul>

            <a href="<?php the_field("cv") ?>" target="_blank" class="button">Se CV her</a>
        </div>
        <img src="<?php
                        $image = get_field('about_image');
                        echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" id="mob_img">
    </div>
</section>
