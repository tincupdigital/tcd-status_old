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

          <div class="project-rounds">
            <?php /* Rounds */
            if ( have_rows( 'phase_rounds' ) ):
              // set a counter to use for round numbers
              $round_num = 1;

              // loop through rows
              while ( have_rows( 'phase_rounds' ) ): the_row(); ?>
                <div class="project-round mb2">
                  <?php /* Date */
                  if ( get_sub_field( 'round_date' ) ) {
                    $date = DateTime::createFromFormat( 'Ymd', get_sub_field( 'round_date' ) ); ?>

                    <div class="round-date">
                      <span class="txt-light txt-small"><?php echo $date->format( 'F j, Y' ); ?></span>
                    </div>
                  <?php } ?>

                  <?php /* Round Title */
                  // set up the round title using $round_num variable
                  $r_ttl = '<span>Round ' . str_pad($round_num, 2, '0', STR_PAD_LEFT) . '</span>';

                  if ( get_sub_field( 'round_selected' ) ) {
                    $r_ttl .= '<span class="round-selected project-round__check">&#10004;</span>';
                  } ?>

                  <h4 class="round-number h3 project-round__title"><?php echo $r_ttl; ?></h4>

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
        </div>
      <?php endwhile; ?>
    </div>
  <?php } ?>
</div>