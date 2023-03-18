<style>
    /* Style the comments section */
#comments {
  margin-top: 40px;
  padding: 20px;
  background-color: #f2f2f2;
}

/* Style the comment form */
#commentform {
  margin-top: 20px;
  padding: 20px;
  background-color: #f9f9f9;
}

#commentform label {
  display: block;
  margin-bottom: 10px;
}

#commentform input[type="text"],
#commentform input[type="email"],
#commentform textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
}

#commentform input[type="submit"] {
  background-color: #0073aa;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

</style>



<?php
if ( have_posts() ):while(have_posts()):the_post();?>
<div class="text-capitalize">
    <h3><?php the_title()?></h3>

</div>
<?php
$post_date = get_the_date();
echo "This post was published on " . $post_date;
?>
<?php the_content()?>

<?php
$author_name = get_the_author();
echo "This post was written by " . $author_name;
?>

<div class="container mt-5">
<?php comments_template()?>
</div>
<?php endwhile;else:endif;?>
 