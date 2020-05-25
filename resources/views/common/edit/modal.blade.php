<!-- Modal -->
<div class="modal fade" id="editTaskModal" tabindex="-1" role="dialog" aria-labelledby="editTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
			<form action="{{ route('tasks.update', $task->id ) }}" method="POST" class="form-horizontal">
                @method('PUT')

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
								<input type="text" name="name" id="task-name" value="{{$task->name}}" class="form-control">
							</div>
							<label for="task-name" class="col-sm-3 control-label">Description</label>
							<div class="col-sm-12">
								<input type="text" name="description" id="task-name" class="form-control" value="{{ $task->description }}">
							</div>
							<label for="task-name" class="col-sm-3 control-label">Status</label>
							<div class="col-sm-12">
								<select class="form-control" name="status">
									<option type="text" class="form-control" value="doing" {{ $task->status == 'doing' ? 'selected' : '' }}>Doing</option>
									<option type="text" class="form-control" value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>


								</select>
							</div>
						</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="sumbit" class="btn btn-primary">Save</button>
				</div>
			</form>

      	</div>
    </div>
</div>