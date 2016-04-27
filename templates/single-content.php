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
        <div class="project-phase project-phases__phase">
          <h3 class="phase-title h2 project-phase__title mt0 mb2"><?php the_sub_field( 'phase_title' ); ?></h3>

          <?php // set repeater to variable
          $repeater = get_sub_field( 'phase_rounds' );

          // check if array exists
          if ( $repeater ) {
            // set a round number
            $round = 1;

            // add round number to $repeater rows
            // hat-tip: http://goo.gl/ZcRik0
            foreach ( $repeater as &$row ) {
              $row['round_number'] = $round;
              $round++;
            }

            // reverse the array
            $repeater = array_reverse( $repeater ); ?>

            <div class="project-rounds">
              <?php // loop through rows
              foreach ( $repeater as $row ) { ?>
                <div class="project-round mb2">
                  <?php /* Date */
                  if ( $row['round_date'] ) {
                    $date = DateTime::createFromFormat( 'Ymd', $row['round_date'] ); ?>

                    <div class="round-date">
                      <span class="txt-light txt-small"><?php echo $date->format( 'F j, Y' ); ?></span>
                    </div>
                  <?php } ?>

                  <h4 class="round-number h3 project-round__title">Round <?php echo str_pad( $row['round_number'], 2, '0', STR_PAD_LEFT ); ?></h4>

                  <?php /* Content */
                  if ( $row['round_content'] ) {
                    echo wpautop( $row['round_content'] );
                  } ?>
                </div>
              <?php } ?>
            </div>
          <?php } ?>
        </div>
      <?php endwhile; ?>
    </div>
  <?php } ?>
</div>