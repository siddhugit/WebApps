@extends('_master')

@section('title')
	Create new task
@stop

@section('content')

    <h1>Create Task!</h1>

    <form action="{{ action('TasksController@createTask') }}" method="post" role="form">
    
        <label for="taskname">Task</label>
        <input type="text" name="taskname" /> <br> <br>

        <label for="creation_date">Creation Date</label>
        <input type="date" name="creation_date" /> <br> <br>

     <!--    <label for="completion_date">Completion Date</label>
        <input type="date"  name="completion_date" /> <br> <br> -->

        <input type="submit" value="Save" />
        <a id='button_links' href="{{ action('TasksController@listAll') }}" >Cancel</a>    
    </form>
    
@stop