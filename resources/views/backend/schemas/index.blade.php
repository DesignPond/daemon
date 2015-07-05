@extends('backend.layouts.master')
@section('content')

    <div class="row">
        <div class="col-md-12">

            <div id="compose">

                <div v-repeat="box: boxes" id="box_@{{ box.id }}" class="box"
                     style="background-color:#fff; border:2px solid #cbcbcb ;width:@{{ box.width }}px; height:@{{ box.height }}px;z-index:1;top:@{{ box.top }}px;left: @{{ box.left }}px;">
                    <div class="inner">@{{ box.text }}</div>
                </div>

            </div>

            <!-- TASKS -->
            <div id="tasks">
                <!-- The Form to Add a New Task -->
                <form v-on="submit: addTask">
                    <div class="form-group">
                        <input v-model="newTask" v-el="newTask" class="form-control" placeholder="I need to..." />
                    </div>
                    <button class="btn btn-primary">Add Task</button>
                    <button v-on="click: completeAll" class="btn btn-default">Mark All As Completed?</button>
                </form>

                <!-- The List of Todos -->
                <div v-show="remaining.length">
                    <h1>Tasks (@{{ remaining.length }})</h1>
                    <ol class="list-group">
                        <li v-repeat="task: remaining" class="list-group-item">
                            <span v-on="dblclick: editTask(task)">@{{ task.body }}</span>
                            <button v-on="click: removeTask(task)">&#10007;</button>
                            <button v-on="click: toggleTaskCompletion(task)">&#10004</button>
                        </li>
                    </ol>
                </div>

                <!-- The List of Completed Tasks -->
                <div v-if="completions.length">
                    <h2>Completed (@{{ completions.length }})</h2>
                    <ol class="list-group">
                        <li v-repeat="task: completions" class="list-group-item">
                            @{{ task.body }}
                            <button v-on="click: toggleTaskCompletion(task)">&#10007;</button>
                        </li>
                    </ol>
                    <button v-on="click: clearCompleted" class="btn btn-danger">Clear Completed</button>
                </div>
            </div>
            <!-- END TASKS -->

        </div>
    </div>

@stop