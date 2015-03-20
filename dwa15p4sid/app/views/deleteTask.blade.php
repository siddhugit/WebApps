@extends('_master')

@section('title')
	Delete the Task
@stop

@section('content')
	<h1>Delete "{{ $task->name }}"</h1>

    <form action="{{ action('TasksController@deleteTask') }}" method="post" role="form">
        <input type="hidden" name="task" value="{{ $task->id }}" />
        <input type="submit" value="Yes" />
        <a id='button_links' href="{{ action('TasksController@listAll') }}">No</a>
    </form>
@stop
