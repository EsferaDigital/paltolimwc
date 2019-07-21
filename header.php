<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="<?php paltolim_custom_meta_description(); ?>">
  <?php wp_head();?>
</head>
<body <?php body_class('hola'); ?>>
  <?php get_template_part('parts-template/header-custom'); ?>
  <header id="Header" class="Header">
    <section class="Header-container">
      <?php
        get_template_part('parts-template/header-logo');
        get_template_part('parts-template/header-menu');
      ?>
    </section>
    <?php
      if(is_home() || is_front_page()):?>
        <div class="Text-home-header">
          <h2>Transporte de palta hass del campo a la ciudad.</h2>
          <h3>Sin Intermediarios</h3>
          <small>Uniendo a los grandes productores con las pymes chilenas</small>
        </div>
      <?php else:
        echo '';
      endif;
    ?>
  </header>
    <?php
    if(is_home() || is_front_page()):?>
    <section class="Under-header">
      <?php
      if(is_active_sidebar('sidebar_under-header')):
        dynamic_sidebar('sidebar_under-header');
      else:
        echo '<p><small>Aquí puedes agregar un widget personalizado, hazlo desde tu wp-admin.</small></p>';
      endif;?>
    </section>
    <?php
    else:?>
    <section class="Under-header Under-header-active">
      <?php
      if(is_active_sidebar('sidebar_under-header')):
        dynamic_sidebar('sidebar_under-header');
      else:
        echo '<p><small>Aquí puedes agregar un widget personalizado, hazlo desde tu wp-admin.</small></p>';
      endif;?>
    </section>
    <?php endif; ?>
  <div class="Container-central">
