<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>

<urlset
        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
                http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">


        <url>
	        <loc><?php echo CHtml::encode($this->createAbsoluteUrl('/home')); ?></loc>
	        <changefreq>weekly</changefreq>
	        <priority>0.5</priority>
	    </url>
        
        <?php if (count($cities)>0):?>
         <?php foreach($cities as $k=>$v):?>
         <?php $city = str_replace('/', '', $v->RewriteUrl)?>
           <url>
		        <loc><?php echo  CHtml::encode($this->createAbsoluteUrl('contractor/find',array('city'=>$city))); ?></loc>
		        <changefreq>weekly</changefreq>
		        <priority>0.5</priority>
		   </url>
		<?php endforeach;?>
		<?php endif;?>
		
		  <?php if (count($projects)>0):?>
         <?php foreach($projects as $k=>$v):?>
           <url>
		        <loc><?php echo CHtml::encode($this->createAbsoluteUrl('contractor/find',array('project'=>$v->ProjectTypeId,'n'=>Yii::app()->Ini->slugstring($v->Name)))); ?></loc>
		        <changefreq>weekly</changefreq>
		        <priority>0.5</priority>
		   </url>
		<?php endforeach;?>
		<?php endif;?>
		
		  <?php if (count($contractors)>0):?>
         <?php foreach($contractors as $k=>$v):?>
           <url>
		        <loc><?php echo CHtml::encode($this->createAbsoluteUrl('contractor/profile',array('user'=>$v->Username))); ?></loc>
		        <changefreq>weekly</changefreq>
		        <priority>0.5</priority>
		   </url>
		<?php endforeach;?>
		<?php endif;?>
		
	    <url>
	        <loc><?php echo CHtml::encode($this->createAbsoluteUrl('/home/how-it-works')); ?></loc>
	        <changefreq>weekly</changefreq>
	        <priority>0.5</priority>
        </url>
        
       <url>
	        <loc><?php echo CHtml::encode($this->createAbsoluteUrl('/project/post')); ?></loc>
	        <changefreq>weekly</changefreq>
	        <priority>0.5</priority>
        </url>
       
       <url>
	        <loc><?php echo CHtml::encode($this->createAbsoluteUrl('/project/find')); ?></loc>
	        <changefreq>weekly</changefreq>
	        <priority>0.5</priority>
        </url>
       
       <url>
	        <loc><?php echo CHtml::encode($this->createAbsoluteUrl('/contractor/find')); ?></loc>
	        <changefreq>weekly</changefreq>
	        <priority>0.5</priority>
        </url>
        
        <url>
	        <loc><?php echo CHtml::encode($this->createAbsoluteUrl('/referral')); ?></loc>
	        <changefreq>weekly</changefreq>
	        <priority>0.5</priority>
        </url>
       
        <url>
	        <loc><?php echo CHtml::encode($this->createAbsoluteUrl('/questions')); ?></loc>
	        <changefreq>weekly</changefreq>
	        <priority>0.5</priority>
        </url>
       
        <url>
	        <loc><?php echo CHtml::encode($this->createAbsoluteUrl('/contractor/signup')); ?></loc>
	        <changefreq>weekly</changefreq>
	        <priority>0.5</priority>
        </url>
        
         <url>
	        <loc><?php echo CHtml::encode($this->createAbsoluteUrl('/contractor/signup')); ?></loc>
	        <changefreq>weekly</changefreq>
	        <priority>0.5</priority>
        </url>
        
        <url>
	        <loc><?php echo CHtml::encode($this->createAbsoluteUrl('/login')); ?></loc>
	        <changefreq>weekly</changefreq>
	        <priority>0.5</priority>
        </url>
        
          <?php if (count($projects)>0):?>
         <?php foreach($projects as $k=>$v):?>
           <url>
		        <loc><?php echo CHtml::encode($this->createAbsoluteUrl('project/post',array('pid'=>$v->ProjectTypeId,'n'=>Yii::app()->Ini->slugstring($v->Name)))); ?></loc>
		        <changefreq>weekly</changefreq>
		        <priority>0.5</priority>
		   </url>
		<?php endforeach;?>
		<?php endif;?>
        
        <url>
	        <loc><?php echo CHtml::encode($this->createAbsoluteUrl('/home/about')); ?></loc>
	        <changefreq>weekly</changefreq>
	        <priority>0.5</priority>
        </url>
        
        <url>
	        <loc><?php echo CHtml::encode($this->createAbsoluteUrl('/home/privacy')); ?></loc>
	        <changefreq>weekly</changefreq>
	        <priority>0.5</priority>
        </url>
        
        <url>
	        <loc><?php echo CHtml::encode($this->createAbsoluteUrl('/home/terms')); ?></loc>
	        <changefreq>weekly</changefreq>
	        <priority>0.5</priority>
        </url>
        
         <url>
	        <loc><?php echo CHtml::encode($this->createAbsoluteUrl('/home/contactus')); ?></loc>
	        <changefreq>weekly</changefreq>
	        <priority>0.5</priority>
        </url>
        
</urlset>