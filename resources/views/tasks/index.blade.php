
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <!-- Current Tasks -->
                @if (count($tasks) > 0)
                    <div class="card">
                        <div class="card-header">
                            Current Tasks
                            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addTaskModal">
                                Add new task
                            </button>
                        </div>
    
                        <div class="card-body">
                            <table class="table table-striped task-table">
                                <thead>
                                    <th>Task</th>
                                    <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td class="table-text"><div>{{ $task->name }}</div></td>
    
                                            <!-- Task Delete Button -->
                                            <td>
                                                <form action="{{url('task/' . $task->id)}}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
    
                                                    <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                                        <i class="fa fa-btn fa-trash"></i>Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                <h2>There are no tasks. Would you like to create one?</h2>
                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addTaskModal">
                    Add new task
                </button>
                @endif
            </div>
        </div>
        @include('common.modal')
    </div>
@endsection