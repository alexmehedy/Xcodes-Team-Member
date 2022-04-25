<?php
//dynamic css write here

?>

<style media="screen">
  .section-team .single-person:hover{
    background: <?php echo get_option('color_picker');?> !important;
  }
  .section-team .single-person:hover .person-image{
    border: 4px dashed <?php echo get_option('hover_border_color');?> !important;
  }
</style>
