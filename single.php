<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

get_header(); ?>

  <!-- Header area -->
  <div class="header-area">
    <div class="row middle-xs">
      <!-- Project name -->
      <div class="col-xs-8 col-sm-6">
        <div class="client-info-area mb2">
          <h1 class="client-name"><?php the_title(); ?></h1>
          <h2 class="project-name mt0 txt--400"><?php the_field( 'project_name' ); ?></h2>
        </div>
      </div>

      <!-- Project logo -->
      <div class="col-xs-4 col-sm-6">
        <?php if ( get_field( 'client_logo' ) ) {
          $logo = get_field( 'client_logo' ); ?>

          <div class="client-logo-area mb2">
            <img class="client-logo" src="<?php echo $logo['sizes']['medium']; ?>" alt="<?php the_title(); ?>" />
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

  <!-- Content area -->
  <div class="content-area">
    <?php /* Phases */
    if ( have_rows( 'project_phases' ) ) { ?>
      <div class="project-phases">
        <?php // loop through rows
        while ( have_rows( 'project_phases' ) ): the_row(); ?>
          <div class="project-phase mb3">
            <h3 class="phase-title h2 mt0"><?php the_sub_field( 'phase_title' ); ?></h3>

            <div class="project-rounds">
              <?php /* Date */
              $date = DateTime::createFromFormat( 'Ymd', get_sub_field( 'phase_date' ) ); ?>
              <div class="round-date mb1">
                <span class="txt--light txt--small"><?php echo $date->format( 'F j, Y' ); ?></span>
              </div>

              <?php /* Rounds */
              if ( have_rows( 'phase_rounds' ) ):
                // set a counter to use for round numbers
                $round_num = 1;

                // loop through rows
                while ( have_rows( 'phase_rounds' ) ): the_row(); ?>
                  <div class="project-round mb2">
                    <h4 class="round-number h3 mt0">Round <?php echo $round_num; ?></h4>

                    <?php /* Content */
                    if ( get_sub_field( 'round_content' ) ) {
                      echo wpautop( get_sub_field( 'round_content' ) );
                    } ?>
                  </div>

                  <?php // increment the counter
                  $round_num++;
                endwhile;
              endif; ?>
          </div>
        <?php endwhile; ?>
      </div>
    <?php } ?>
  </div>

<?php get_footer(); ?>
