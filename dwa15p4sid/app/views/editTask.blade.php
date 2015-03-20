@extends('_master')

@section('title')
	Edit the Task
@stop

@section('content')
    
    <h1>Edit the task</h1>

    <form action="{{ action('TasksController@editTask') }}" method="post" role="form">
    
        <input type="hidden" name="id" value="{{ $task->id }}">

        <label for="completion_status">Completed?</label>
        <input type="checkbox" name="completion_status" {{ $task->completed ? 'checked' : '' }}/> <br> <br>

        <label for="taskname">Task</label>
        <input type="text" name="taskname" value="{{ $task->name }}"/> <br> <br>

        <label for="creation_date">Creation Date</label>
        <input type="date" name="creation_date" value="{{ $task->creation_date }}"/> <br> <br>

        <label for="completion_date">Completion Date</label>
        <input type="date"  name="completion_date" value="{{ $task->completion_date }}"/> <br> <br>

        <input type="submit" value="Save"  />
        <a id='button_links' href="{{ action('TasksController@listAll') }}" >Cancel</a> 

    </form>
    
@stop