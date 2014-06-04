<script>
//jQuery('span#rating<?php echo $id?> input ').rating();
</script>
<div  id="rating_info_<?=$id?>">
<?php 
        if ( $rating = FeedbackRating::model()->findByAttributes(array('feedback_id'=>$id)))
                {       
                        echo "Rating: <strong>" . $rating->vote_average ."</strong>";
                        echo " " . $rating->vote_count . " votes";
                        $current_rating = $rating->vote_average;
                        
                }else {
                	$current_rating = 0;
                }
                
        $feedback = Feedback::model()->findByPk($id);        
?>
        </div>

<?php

if(isset($update)){
	$cs=Yii::app()->clientScript;
	$cs->scriptMap=array(
	'jquery.js'=>false,
	'jquery.rating.js'=>false,
	'jquery.metadata.js'=>false,
	); 
}elseif($loop>0){
	$cs=Yii::app()->clientScript;
	$cs->scriptMap=array(
	'jquery.js'=>false,
	'jquery.rating.js'=>false,
	'jquery.metadata.js'=>false,
	); 
}
?>
<?php // rating

        $readonly = false;
        if ($feedback->homeowner_id == Yii::app()->user->getId()){
        	$readonly = true;
        }
        
        $this->widget('CStarRating',array(
    'name'=>'rating'.$id, // an unique name
		'htmlOptions'=>array('class'=>'cstarrating'),
        'starCount'=>10,
        'readOnly'=>$readonly,
        'resetText'=>'',
        'value'=>round($current_rating,0), // this makes the widget shows the current rating rounded to //closest number(1,2,3,4,5,6,7,8,9 or 10)
        
    'callback'=>' // updates the div with the new rating info, displays a message for 5 seconds and makes the //widget readonly
        function(){
        var base_url = $("#base_url").val();
                url = base_url+"/contractorajax/ratefeedback";
                        jQuery.getJSON(url, {id: '.$id.', val: $(this).val()}, function(data) {
                                if (data.status == "success"){
                                        $("#rating_success_'.$id.'").html(data.div);
                                        $("#rating_success_'.$id.'").fadeIn("slow");               
                                        var pause = setTimeout("$(\"#rating_success_'.$id.'\").fadeOut(\"slow\")",5000);
                                        $("#rating_info_'.$id.'").html(data.info);
                                        $("input[id*='.$id.'_]").rating("readOnly",true);
                                        }
                                });}'
                        ));
						
?>

<div id="rating_success_<?=$id;?>" style="display:none"></div>