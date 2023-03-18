<?php get_header();?>



<div class="container">
<div class="row">
<style>
    .pagination a,
.pagination span {
    display: inline-block;
    padding: 5px 10px;
    margin: 0 5px;
    border: 1px solid #ccc;
    color: #333;
    text-decoration: none;
    
}
.pagination .current {
    background-color: #333;
    color: #fff;
    border-color: #333;
}
.pagination .prev,
.pagination .next {
    display: inline-block;
    padding: 5px 10px;
    margin: 0 5px;
    border: 1px solid #ccc;
    color: #333;
    text-decoration: none;
}

.pagination .prev:hover,
.pagination .next:hover {
    background-color: #333;
    color: #fff;
    border-color: #333;
}
</style>
<div class="col-lg-9">
<?php get_template_part("includes/section","archive");?>
</div>
<div class="col-lg-3 mt-5">
<?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
        <div class="page-sidebar" >
           <?php dynamic_sidebar( 'blog-sidebar' ); ?>
        </div>
    <?php endif; ?>
    </div>
</div>

<?php
global $wp_query;
$total_pages = ceil( $wp_query->found_posts / get_option('posts_per_page') );
$current_page = max( 1, get_query_var('paged') );
?>

<div class="pagination">
    <?php
    echo paginate_links(array(
        'base' => get_pagenum_link(1) . '%_%',
        'format' => 'page/%#%',
        'current' => $current_page,
        'total' => $total_pages,
        'prev_text' => 'Previuse',
        'next_text' => 'Next',
    ));
    ?>

</div>






<?php get_footer();?>