
<style>
    .gform_button {
    background-color: black;
    border:none;
    width: 100%;
    color:white;
    border-radius:5px;
    padding:8px;
}

</style>

<?php get_header();?>



<div class="container">

<?php if(has_post_thumbnail()):?>
    <img src="<?php the_post_thumbnail_url("blog-large")?>" class="img-thumbnail img-fluid mt-5" alt="" style="width:900px; height: 350px; padding:10px 0;">
<?php endif;?>

<?php get_template_part("includes/section","car");?>





<?php $images = get_field('gallery');

if( $images ): ?>

    <div id="gallery" class="mt-5 ">
      <h5>Image gallery</h5>
        <?php foreach( $images as $image ): ?>
          <a href="<?php echo esc_url($image['url']); ?>" >
            <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid img-thumbnail" style="height:100px;" alt="<?php echo esc_attr($image['alt']); ?>" />
            </a>
        <?php endforeach; ?>

    </div>

<?php endif; ?>
 <?php get_template_part('includes/form','inquiry');?>
</div>



<?php get_footer();?>