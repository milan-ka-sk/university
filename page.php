<?php  get_header();

    while (have_posts()){
        the_post();
?>
 

 <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php the_title() ?></h1>
      <div class="page-banner__intro">
        <p>TODO</p>
      </div>
    </div>  
  </div>

  <div class="container container--narrow page-section">

  <?php 
  $theParentID = wp_get_post_parent_ID(get_the_ID());
/* if parent id = 0, there is no parent*/
  if (wp_get_post_parent_ID(get_the_ID())) {?>
    <div class="metabox metabox--position-up metabox--with-home-link">
      <p><a class="metabox__blog-home-link" href="<?php echo get_permalink($theParentID) ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theParentID) ?></a> <span class="metabox__main"><?php the_title() ?></span></p>
    </div>
    <?php   }
?>
    <?php
    // if there are no pages (falsy value) this page is not a parent
    $test = get_pages(array(
      'child_of' => get_the_ID()
    ));

    // only show if the current page is a parent or a child
    // dont show if the page is neither a parent nor a child
  if($theParentID or $test){ 
    ?>
    <div class="page-links">
      <h2 class="page-links__title"><a href="<?php echo get_permalink($theParentID) ?>"><?php echo get_the_title($theParentID) ?></a></h2>
      <ul class="min-list">
        <!-- <li class="current_page_item"><a href="#">Our History</a></li>
        <li><a href="#">Our Goals</a></li> -->

        <?php 
          if($theParentID){
            //this page has a parent -- the site is a child
            $motherID =  $theParentID;
          } else{
            //this page has no parent -- it is top level
            $motherID =  get_the_ID();
          }

          wp_list_pages(array(
            'title_li' => NULL,
            'child_of' => $motherID,
            'sort_column' =>  'menu_order' // 
          ));
        ?>
      </ul>
    </div>  

    <?php
   }
    ?>

    <div class="generic-content">
    <?php the_content() ?>
    </div>

  </div>


<?php
    }
    get_footer();
?>

