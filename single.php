<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

get_header(); ?>

  <?php /* Header Area */
  get_template_part( 'templates/single', 'header' ); ?>

  <?php /* Content Area */
  get_template_part( 'templates/single', 'content' ); ?>

<?php get_footer(); ?>
