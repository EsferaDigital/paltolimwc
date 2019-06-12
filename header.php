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
  <header class="Header">
    <section class="Header-container">
      <?php
        get_template_part('parts-template/header-logo');
        get_template_part('parts-template/header-menu');
      ?>
    </section>
  </header>
  <div class="Container-central">