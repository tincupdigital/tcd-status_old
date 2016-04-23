<?php
/**
 * ACF fields export file
 *
 * @package _s
 */

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_post-fields',
    'title' => 'Post Fields',
    'fields' => array (
      array (
        'key' => 'field_56fada9e225a4',
        'label' => 'Client Logo',
        'name' => 'client_logo',
        'type' => 'image',
        'instructions' => 'Upload the client\'s logo here.',
        'required' => 1,
        'save_format' => 'object',
        'preview_size' => 'thumbnail',
        'library' => 'all',
      ),
      array (
        'key' => 'field_56fada8966a2a',
        'label' => 'Project Name',
        'name' => 'project_name',
        'type' => 'text',
        'instructions' => 'Enter the name of the project.',
        'required' => 1,
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_56fadad4225a6',
        'label' => 'Project Phases',
        'name' => 'project_phases',
        'type' => 'repeater',
        'instructions' => 'Add a project phase by clicking "Add Phase" below.',
        'required' => 1,
        'sub_fields' => array (
          array (
            'key' => 'field_56fadc492d29b',
            'label' => 'Phase Title',
            'name' => 'phase_title',
            'type' => 'text',
            'instructions' => 'Enter a title for the project phase.',
            'required' => 1,
            'column_width' => '',
            'default_value' => '',
            'placeholder' => 'e.g. "Site Architecture"',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_56fadd981f41a',
            'label' => 'Phase Rounds',
            'name' => 'phase_rounds',
            'type' => 'repeater',
            'instructions' => 'Add a phase round by clicking "Add Round" below.',
            'required' => 1,
            'column_width' => '',
            'sub_fields' => array (
              array (
                'key' => 'field_571bc5b86f69d',
                'label' => 'Round Date',
                'name' => 'round_date',
                'type' => 'date_picker',
                'instructions' => 'Select a date to be displayed for this phase in the project. If this is the second or third round of a phase, change the date to display the date the phase was updated.',
                'required' => 1,
                'column_width' => '',
                'date_format' => 'yymmdd',
                'display_format' => 'mm/dd/yy',
                'first_day' => 0,
              ),
              array (
                'key' => 'field_56fade331f41b',
                'label' => 'Round Content',
                'name' => 'round_content',
                'type' => 'wysiwyg',
                'instructions' => 'Enter the content for this round. This would generally be a list of links, but can be anything you\'d like.',
                'required' => 1,
                'column_width' => '',
                'default_value' => '',
                'toolbar' => 'basic',
                'media_upload' => 'yes',
              ),
              array (
                'key' => 'field_571bd02b1a2b2',
                'label' => 'Round Selected',
                'name' => 'round_selected',
                'type' => 'true_false',
                'instructions' => 'Check this box if this is the round that was selected by the client.',
                'column_width' => '',
                'message' => '',
                'default_value' => 0,
              ),
            ),
            'row_min' => 1,
            'row_limit' => '',
            'layout' => 'row',
            'button_label' => 'Add Round',
          ),
        ),
        'row_min' => 1,
        'row_limit' => '',
        'layout' => 'row',
        'button_label' => 'Add Phase',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'post',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'no_box',
      'hide_on_screen' => array (
        0 => 'the_content',
      ),
    ),
    'menu_order' => 0,
  ));
}
