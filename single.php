<?php get_header();?>

<main>
<?php get_template_part("includes/section", "projectcontent"); ?>

</main>
<?php
$previous_post_url = get_permalink( get_adjacent_post(false,'',false)->ID );
$next_post_url = get_permalink( get_adjacent_post(false,'',true)->ID );
?>

<footer>
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
</footer>


<?php get_footer();?>