<div id="block-<?php print $block->module .'-'. $block->delta ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <fieldset class="block-inner">
      <?php print render($title_prefix); ?>
    <?php if ($block->subject): ?>
      <legend class="block-title"<?php print $title_attributes; ?>><?php print $block->subject ?></legend>
    <?php endif;?>
      <?php print render($title_suffix); ?>
		
		<div class="content clearfix" <?php print $content_attributes; ?>>
		  <?php print $content; ?>
		</div>

  </fieldset>
</div> <!-- /block-inner /block -->