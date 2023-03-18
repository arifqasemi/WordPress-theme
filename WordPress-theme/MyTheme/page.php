<?php get_header();?>



<div class="container">
    <div class="row">

    <div class="col-lg-9 mt-5">
<h4><?php the_title();?></h4>
<?php get_template_part("includes/section","content");?>
</div>

<div class="col-lg-3 mt-5">
<?php if ( is_active_sidebar( 'page-sidebar' ) ) : ?>
        <div class="page-sidebar" >
           <?php dynamic_sidebar( 'page-sidebar' ); ?>
        </div>
    <?php endif; ?>
    </div>
</div>
<?php   get_search_form(); ?>

</div>







<?php get_footer();?>