<?php
if ( have_posts() ):while(have_posts()):the_post();?>
<div class="text-capitalize">
    <h3><?php the_title()?></h3>

</div>
<ul>
    <li>
     Color:<?php the_field('color')?>

    </li>
    <li>
     Registration:<?php the_field('registration')?>

    </li>
</ul>
<?php the_content()?>

<?php
$post_date = get_the_date();
echo "This post was published on " . $post_date;
?>

<?php endwhile;else:endif;?>