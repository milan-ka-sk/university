<?php 
    while (have_posts()){
        the_post();
?>
<h2> Page: 
     <?php  the_title(); ?> 
</h2>
<div>
    <?php the_content() ?>
</div>
<?php
    }
?>

