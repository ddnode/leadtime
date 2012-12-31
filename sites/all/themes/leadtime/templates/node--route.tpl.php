<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>">
	<div class="node-inner">
    
    <?php if (!$page): ?>
      <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>

    <?php print $user_picture; ?>
		    
    <?php if ($display_submitted): ?>
      <span class="submitted"><?php print $date; ?> — <?php print $name; ?></span>
    <?php endif; ?>

  	<div class="content">
  	  <?php 
  	    // We hide the comments and links now so that we can render them later.
        $schedule = array();
        foreach ($content['field_schedule']['#items'] as $item) {
          $schedules[] = node_load($item['target_id']);
        }
       ?>
      <div class="route-top clearfix">
        <div class="simple-schedules">
          <div class="schedule-summary">简单（参考）行程</div>
          <?php foreach ($schedules as $day => $schedule): ?>
            <div class="schedule-title">第<?php print $day + 1; ?>天 <?php print $schedule->title; ?></div>
          <?php endforeach; ?>
        </div>
        <?php print render($content['field_image']); ?>
      </div>
      <div class="route-middle clearfix">
        <?php print render($content['field_tour_feature']); ?>
        <?php print render($content['field_map_image']); ?>
      </div>
      <ul id="tabs" class="clearfix">
        <li data-tab="fee">行程费用</li>
        <li data-tab="standard">服务标准</li>
        <li data-tab="qa">常见问题</li>
        <li data-tab="feedback">在线问答</li>
      </ul>
      <div id="tabs-content">
        <div data-tab="fee" class="tab-content">
          <table>
            <tr>
              <th>日期</th>
              <th>行程安排</th>
            </tr>
            <?php foreach ($schedules as $day => $schedule): ?>
              <tr>
                <td>第<?php print $day + 1; ?>天</td>
                <td><?php print $schedule->title; ?></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
        <div data-tab="standard" class="tab-content"></div>
        <div data-tab="qa" class="tab-content"></div>
        <div data-tab="feedback" class="tab-content"></div>
      </div>
  	</div>
  	
    <?php if (!empty($content['links']['terms'])): ?>
      <div class="terms"><?php print render($content['links']['terms']); ?></div>
    <?php endif;?>
  	
    <?php if (!empty($content['links'])): ?>
	    <div class="links"><?php print render($content['links']); ?></div>
	  <?php endif; ?>
        
	</div> <!-- /node-inner -->
</div> <!-- /node-->

<?php print render($content['comments']); ?>
<script type="text/javascript">
  jQuery.fn.tabs = function(control){
    var element = jQuery(this);
    control = jQuery(control);

    element.delegate("li", "click", function(){
      // Retrieve tab name
      var tabName = jQuery(this).attr("data-tab");

      // Fire custom event on tab click
      element.trigger("change.tabs", tabName);
    });

    // Bind to custom event
    element.bind("change.tabs", function(e, tabName){
      element.find("li").removeClass("active");
      element.find(">[data-tab='" + tabName + "']").addClass("active");
    });

    element.bind("change.tabs", function(e, tabName){
      control.find(">[data-tab]").removeClass("active");
      control.find(">[data-tab='" + tabName + "']").addClass("active");
    });

    // Activate first tab
    var firstName = element.find("li:first").attr("data-tab");
    element.trigger("change.tabs", firstName);

    return this;
  };
</script>

<script type="text/javascript">
  jQuery(function($){
    $("#tabs").tabs("#tabs-content");
  })
</script>