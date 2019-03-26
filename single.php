<?php 
    while (have_posts()){
        the_post();
?>
<h2> Post: 
     <?php  the_title(); ?> 
</h2>
<div>
    <?php the_content() ?>
</div>
<?php
    }
?>

