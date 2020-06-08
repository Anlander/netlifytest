<!DOCTYPE html>
<html lang="sv">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

      <section class="menu">
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'menu-container', 'menu_class' => 'ul-menu' ) ); ?>
      </section>

      <section>
        <div class="container-fluid info-container">
          <div class="row">
            <div class="col-xs-12">
              <div class="menu-button-container pull-right">
                <button class="c-hamburger c-hamburger--htx pull-right">
                  <span>toggle menu</span>
                </button>
              </div>
              <div class="lang-container pull-right">
                <a href="http://lapartners.se"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/swe_flag.jpg" alt="Swedish site"/></a>
              </div>
            </div>
          </div>
        </div>
      </section>