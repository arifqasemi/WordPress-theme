<?php get_header();?>



<div class="container">

<?php if(has_post_thumbnail()):?>
    <img src="<?php the_post_thumbnail_url("blog-large")?>" alt="" style="width:900px; height: 300px; padding:10px 0;">
<?php endif;?>

<?php get_template_part("includes/section","blogcontent");?>


</div>








<?php get_footer();?>