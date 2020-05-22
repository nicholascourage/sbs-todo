<!-- Modal -->
<div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
			<form action="{{ url('task') }}" method="POST" class="form-horizontal">

				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					@include('common.errors')

					<!-- New Task Form -->
						@csrf
						<!-- Task Name -->
						<div class="form-group">
							<label for="task-name" class="col-sm-3 control-label">Task</label>
							<div class="col-sm-12">
								<input type="text" name="name" id="task-name" class="form-control" value="{{ old('name') }}">
							</div>
							<label for="task-name" class="col-sm-3 control-label">Description</label>
							<div class="col-sm-12">
								<input type="text" name="description" id="task-name" class="form-control" value="{{ old('task_description') }}">
							</div>
							<label for="task-name" class="col-sm-3 control-label">Status</label>
							<div class="col-sm-12">
								<select class="form-control">
									<option type="text" name="status" id="task-name" class="form-control" value="doing">Doing</option>
									<option type="text" name="status" id="task-name" class="form-control" value="completed">Completed</option>


								</select>
							</div>
						</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="sumbit" class="btn btn-primary">Add task</button>
				</div>
			</form>

      	</div>
    </div>
</div>