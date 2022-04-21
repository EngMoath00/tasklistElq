@extends('layouts.app')
@section('content')
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            {{-- <div class="panel-heading">
                New Task
            </div>

          <div class="panel-body">
                <!-- Display Validation Errors -->
                <!-- New Task Form -->
                <form action="{{ route('taskStore') }}" method="POST" class="form-horizontal">
                    @csrf
                    <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Task</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" value="" required>
                        </div>
                    </div>

                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Add Task
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div> --}}

            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Task
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    <!-- update Task Form -->

                    <form action="{{ route('taskUpdate', isset($task) ? $task->id : 0) }}" method="POST"
                        class="form-horizontal">
                        @csrf
                        @method('patch')
                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control"
                                    value="{{ isset($task) ? $task->name : '' }}" required>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>update Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- Current Tasks -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Tasks
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>Task</th>
                            <th>description</th>
                            <th>Edite</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $task->name }}</div>
                                        <div>{{ $task->description }}</div>
                                    </td>

                                    <!-- Task Delete Button -->
                                    <td>
                                        <form action="{{ route('taskdestroy', $task->id) }}" method="POST">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </form>
                                    </td>

                                    <!-- Task Edite Button -->
                                    <td>
                                        <form action="{{ route('tasksedite', $task->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-btn fa-info"></i>Edite
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endsection
