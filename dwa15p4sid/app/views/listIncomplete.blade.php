@extends('_master')

@section('title')
	InComplete Tasks
@stop

@section('content')

	<h1>InComplete Tasks List</h1>

	<ul>
			<li><a href='/create'>Add New Task</a></li><br>
			<li><a href='/listAll'>View All Tasks</a></li><br>
			<li><a href='/listComplete'>View Completed Tasks</a></li><br>
	</ul>

	@if ($tasks->isEmpty())
        <p>There are no Incomplete tasks!</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr> 
                    <td>{{ $task->name }}</td>
                    <td align="center">{{ $task->creation_date }}</td>
                    <td align="center" >
                        <a href="{{ action('TasksController@edit', $task->id) }}" >Edit</a>
                        <a href="{{ action('TasksController@delete', $task->id) }}" >Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@stop