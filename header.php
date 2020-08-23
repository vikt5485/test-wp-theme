<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Bebas+Neue|Montserrat&amp;display=swap" rel="stylesheet">

    <?php if(is_front_page()): ?>
        <title><?php the_title();?></title>
    <?php else: ?>
        <title><?php echo "Projekt | " . get_the_title();?></title>
    <?php endif; ?>



    <?php wp_head();?>
</head>
<body>

<header>
    <a href="<?php echo get_site_url();?>">
        <div class="">
            <h1>VIKTOR KJELDAL</h1>
            <p>multimediedesigner |&nbsp;portfolio</p>
        </div>
    </a>
    <?php if(is_front_page()): ?>
        echo '<style type="text/css">
        body header {
            height: 100vh!important;
        }
        </style>';
        <nav>
            <a href="#projects" class="color_change" style="animation-delay: 0.5s;">projekter</a>
            <a href="#about" class="color_change" style="animation-delay: 1s;">om mig</a>
            <a href="#contact" class="color_change" style="animation-delay: 1.5s;">kontakt</a>
        </nav>

    <?php endif; ?>
</header>