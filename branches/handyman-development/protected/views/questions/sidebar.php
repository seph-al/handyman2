<div class="qa-sidebar">
																				<p>Welcome to Home improvement answers from the experts, where you can ask questions and receive answers from other members of the community.</p>
																				<a class="btn btn-success getbtn" href="">	Get help</a>
																			</div>
																			<div class="qa-nav-cat">
																				<ul class="qa-nav-cat-list qa-nav-cat-list-1">
																					<li class="qa-nav-cat-item qa-nav-cat-all qa-nav-cat-selected"><a class="qa-nav-cat-link" href="./">All categories</a></li>
																					<?php foreach ($sidecats as $k=>$v):?>
																					  <?php if ($v->questionCount >0):?>
																							<li class="qa-nav-cat-item qa-nav-cat-additions"><a class="qa-nav-cat-link" href="<?php echo Yii::app()->request->baseUrl; ?>/questions/category/cat/<?php echo $v->ProjectTypeId?>/n/<?php echo Yii::app()->Ini->slugstring($v->Name)?>"><?php echo $v->Name?></a>
																							<span class="qa-nav-cat-note">(<?php echo $v->questionCount?>)</span>
																							</li>
																					  <?php endif?>
																					<?php endforeach;?>
																				 </ul>
																				<div class="qa-nav-cat-clear"><br></div>
																			</div>
																			<div class="qa-feed"><a class="qa-feed-link" href="./feed/qa.rss">
																			  Recent questions and answers
																			</a>
																			</div>