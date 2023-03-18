<?php
if ( have_posts() ):while(have_posts()):the_post();?>
<div class="card m-5">

    <div class="car-body m-3 d-flex justify-content-center">
    <?php if(has_post_thumbnail()):?>
    <img src="<?php the_post_thumbnail_url("blog-large")?>" alt="" style="width:400px; height: 250px; padding:10px 0;">
<?php endif;?>
<div class="blog-content m-2">
<h4 class="text-capitalize"><?php the_title();?></h4>

<?php the_excerpt()?>
<a href="<?php the_permalink()?>" class="btn btn-primary">Read more</a>
</div>
</div>
</div>
<?php endwhile;else:endif;?>
 