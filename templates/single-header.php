<?php
/**
 * Template part for the single post header area
 *
 * @package _s
 */
?>

<div class="header-area">
  <div class="row middle-xs">
    <!-- Project name -->
    <div class="col-xs-6 col-sm-7 col-md-8 col-lg-9">
      <div class="client-info-area mb2">
        <h1 class="client-name"><?php the_title(); ?></h1>
        <h2 class="project-name mt0 txt--400"><?php the_field( 'project_name' ); ?></h2>
      </div>
    </div>

    <!-- Project logo -->
    <div class="col-xs-6 col-sm-5 col-md-4 col-lg-3">
      <?php if ( get_field( 'client_logo' ) ) {
        $logo = get_field( 'client_logo' ); ?>

        <div class="client-logo-area mb2">
          <img class="client-logo" src="<?php echo $logo['sizes']['medium']; ?>" alt="<?php the_title(); ?>" />
        </div>
      <?php } ?>
    </div>
  </div>
</div>