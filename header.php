<!DOCTYPE html>
<html lang="en"><!-- Seleccionar lenguaje -->
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="<?php echo bloginfo('description'); ?>">
    <!-- Global site tag (gtag.js) - Google Analytics -->


    <title>
      <?php if (is_home () ) { echo ''; //colocar texto descriptivo 
        }elseif ( is_category() ) { single_cat_title(); echo ' | ' ; echo bloginfo('name'); 
          }elseif (is_single() || is_page()) { single_post_title(); echo ' | ' ; echo bloginfo('name'); 
            }else { wp_title('',true); 
          } 
      ?>
    </title>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" type="image/x-icon">


     <?php wp_head(); ?>
  </head>

  <body>

    <nav id="menu" class="navbar navbar-expand-lg sticky-top align-items-center">  <!-- navbar-togglable navbar-expand-lg -->


        <div class="container-fluid px-2 px-md-5">

          <a class="navbar-brand" href="<?php echo home_url('/'); ?>">

            <img src="<?php echo get_template_directory_uri(); ?>/img/"
            class="d-inline-block align-top img-fluid" id="logo" alt="" title="">

          </a>


          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

              <i class="fa fa-bars"></i>

          </button>


          <div class="collapse navbar-collapse py-5 py-md-2" id="navbarNav">



            <?php				

            $args = array(

              'theme_location' => 'lower-bar',

              'depth' => 2,

              'container'	=> false,

              'menu_class' => 'navbar-nav navbar-nav mx-auto mx-md-0 ml-0 ml-md-auto text-center text-md-right',

              'menu_id' => 'menu-nav',  

              'add_li_class'  => 'nav-item mx-2 fw-500',

              'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',

              'walker' => new BootstrapNavMenuWalker());

               wp_nav_menu($args);

            ?>

            

          </div>



        </div>


    </nav> <!-- Menú de navegación -->