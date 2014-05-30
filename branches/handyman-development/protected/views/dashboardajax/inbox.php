<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/inbox.css">
					<div class="contain" id="inboxdiv" style="display:block">
							<div class="containNew">	<span class="postJobHead">My Inbox</span>
								<span class="pull-right">
									<span class="tradRegMemBtn margBot10">
										<input type="button" class="btn btn-primary"  name="senditem" id="to_sent" value="Go to Sent Items"/>
									</span>
								</span>
								<div class="clr"></div>
								
									<div class="container dash-constr">
        <div class="row">
            <div class="col-lg-12">
                <div class="inbox">
                    <div class="inbox-content">
			                        <table class="table table-striped table-advance table-hover" id="table-messages" >
			                            <thead>
			                                <tr>
			                                    <th colspan="3">
			                                        <div class="checker">
			                                            <span>
			                                                <input type="checkbox" class="mail-checkbox mail-group-checkbox checkall-inbox">
			                                            </span>
			                                        </div>
			                                        <div class="btn-group">
			                                            <a data-toggle="dropdown" href="#" class="btn btn-sm blue">
			                                                More
			                                                <i class="fa fa-angle-down"></i>
			                                            </a>
			                                            <ul class="dropdown-menu">
			                                                <li>
			                                                    <a href="javascript:void(0)" class="messageDelete">
			                                                        <i class="fa fa-trash-o"></i> Delete
			                                                    </a>
			                                                </li>
			                                            </ul>
			                                        </div>
			                                    </th>
			                                    <th colspan="3" class="pagination-control" id="pagination-inbox">
			                                      
			                                    </th>
			                                </tr>
			                            </thead>
			                            <tbody>
			                               
			                            </tbody>
			                        </table>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>
								
							</div>
							<div class="tradePagination"></div>
						</div>
						
						
						<div class="contain" id="senditemdiv" style="display:none">
							<div class="containNew">	<span class="postJobHead">My Sent Items</span>
								<span class="pull-right">
									<span class="tradRegMemBtn margBot10">
										<input type="button" class="btn btn-primary" name="myinbox" id="to_inbox" value="Go to My Inbox"/>
									</span>
								</span>
								<div class="clr"></div>
									<div class="container dash-constr">
        <div class="row">
					            <div class="col-lg-12">
					                <div class="inbox">
					                    <div class="inbox-content">
														
														<table class="table table-striped table-advance table-hover" id="table-sent-messages" >
								                            <thead>
								                                <tr>
								                                    <th colspan="3">
								                                        <div class="checker">
								                                            <span>
								                                                <input type="checkbox" class="mail-checkbox mail-group-checkbox checkall-sent" >
								                                            </span>
								                                        </div>
								                                        <div class="btn-group">
								                                            <a data-toggle="dropdown" href="#" class="btn btn-sm blue">
								                                                More
								                                                <i class="fa fa-angle-down"></i>
								                                            </a>
								                                            <ul class="dropdown-menu">
								                                               
								                                                <li>
								                                                    <a href="javascript:void(0)" class="messageDelete">
								                                                        <i class="fa fa-trash-o "></i> Delete
								                                                    </a>
								                                                </li>
								                                            </ul>
								                                        </div>
								                                    </th>
								                                    <th colspan="3" class="pagination-control" id="pagination-sent">
								                                    
								                                    </th>
								                                </tr>
								                            </thead>
								                            <tbody>
								                               
								                            </tbody>
								                        </table>
																
														</div>
														</div>
														</div>	
									</div>
								</div>
							</div>
						</div>
					
	<div class="modal fade" id="myModalMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
		   <div class="modal-content" id="modal-ajax-content">
		  </div>
	   </div>
     </div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/inbox.js"></script>