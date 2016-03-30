<?php
/**
 * Template part for the single post content area
 *
 * @package _s
 */
?>

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
                  <h4 class="round-number h3 mt0">Round <?php echo str_pad($round_num, 2, '0', STR_PAD_LEFT); ?></h4>

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