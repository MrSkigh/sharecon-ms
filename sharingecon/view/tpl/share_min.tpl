<div class="panel panel-default panel-share-object"> 
	<div class="panel-heading">
		<h4>{{$title}}</h4>
	</div>
	<div class="panel-body">
		<div class="media">
			<div class="media-left">
				<img class="media-object thumbnail" src="addon/sharingecon/standard.png" alt="...">
			</div>
			<div class="media-body">
				<div class="well">{{$shortdesc}}</div>
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-md-12">
				<div class="btn-group">
					<a href="sharingecon/viewshare/{{$shareid}}" type="button" class="btn btn-default pull-right">
						<span class="glyphicon glyphicon-info-sign"></span> More Details
					</a>
					<button type="button" class="btn btn-default pull-right">
						<span class="glyphicon glyphicon-envelope"></span> Write Message
					</button>
				</div>
			</div>
		</div>
	</div> 
</div>

<div class="modal fade" id="modal-write-message">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Write Message to Owner</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form" id="form-write-message" action="" method="">
					<div class="form-group">
						<div class="col-sm-2">
							<label for="input-subject" class="control-label">Subject</label>
						</div>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="input-subject" id="input-subject" placeholder="Subject">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2">
							<label for="input-body" class="control-label">Body</label>
						</div>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="input-body" id="input-body" placeholder="">
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<a class="btn btn-default" data-dismiss="modal">Close</a>
				<button type="" class="btn btn-primary" id="btn-send-message">Send</button>
			</div>
		</div>
	</div>
</div>