<div class="side-articles">
	<h3>Articles</h3>
	<?php foreach( $feed->get_items(0, 5) as $item):?>   
    <div class="item">
         <a href="<?php echo $item->get_permalink(); ?>" target="_blank">
             <?php echo html_entity_decode($item->get_title()); ?>
          </a>
         	<div class="CityDisplay">
                 <?php $description = $item->get_description()?>
                 <?php 
                  if (strlen($description)< 50){
                  	echo $description;
                  }else {
                  	echo substr($description,0,50).'...';
                  }
                 ?>
         </div>
          <div class="date"><?php echo $item->get_date()?></div>
     </div>
    <?endforeach;?>
</div>
