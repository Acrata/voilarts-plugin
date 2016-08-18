<?php
/*
Title: Text Fields
Order: 10
Tab: Common
Sub Tab: Basic
Setting: voilarts_settings
Flow: Demo Workflow
*/
?>

<div class="piklist-demo-highlight">
  <?php _e('Text fields are at the core of most forms, and easily created with Piklist. Tooltip help can be added to any field with one line of code.', 'piklist-demo');?>
</div>

<h3>Mis sets plug</h3>
<?php

  piklist('field', array(
    'type' => 'group'
    ,'field' => 'slides'
    ,'add_more' => true
    ,'label' => __('Slide Images', 'voilarts')
    ,'description' => __('Add the slides for the slideshow.  You can add as many slides as you want, and they can be drag-and-dropped into the order that you would like them to appear.', 'voilarts')
    ,'fields'  => array(
      array(
        'type' => 'file'
        ,'field' => 'image'
        ,'label' => __('Slides', 'voilarts')
        ,'columns' => 12
        ,'validate' => array(
          array(
            'type' => 'limit'
            ,'options' => array(
              'min' => 1
              ,'max' => 1
            )
          )
        )
      )
      ,array(
        'type' => 'text'
        ,'field' => 'url'
        ,'label' => __('URL', 'voilarts')
        ,'columns' => 12
      )
      ,array(
        'type' => 'text'
        ,'field' => 'caption'
        ,'label' => __('Caption', 'voilarts')
        ,'columns' => 12
      )
    )
  ));

  piklist('field', array(
    'type' => 'text'
    ,'field' => 'text'
    ,'label' => __('Text', 'voilarts')
    ,'help' => __('You can easily add tooltips to your fields with the help parameter.', 'voilarts')
    ,'attributes' => array(
      'class' => 'regular-text'
    )
  ));

  piklist('field', array(
    'type' => 'textarea'
    ,'field' => 'demo_textarea_large'
    ,'label' => __('Area de texto', 'voilarts')
    ,'description' => 'class="large-text code" rows="10" columns="50"'
    ,'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
    ,'attributes' => array(
      'rows' => 10
      ,'cols' => 50
      ,'class' => 'large-text'
    )
  ));

piklist('field', array(
    'type' => 'radio',
    'add_more' => true,
    'field' => 'my_select',
    'label' => 'My select',
    'choices' => array(
      'first' => 'Primera Choice',
      'second' => 'Second Choice',
      'third' => 'Third Choice'
    )
  ));

  piklist('shared/code-locater', array(
    'location' => __FILE__
    ,'type' => 'Settings Section'
  ));
