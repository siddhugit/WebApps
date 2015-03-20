@extends('_master')

@section('title')
	All Tasks
@stop

@section('content')

	<h1>Tasks List</h1>
	
	<ul>
			<li><a href='/create'>Add New Task</a></li><br>
			<li><a href='/listIncomplete'>View Incomplete Tasks</a></li><br>
			<li><a href='/listComplete'>View Completed Tasks</a></li><br>
	</ul>

	@if ($tasks->isEmpty())
        <p>There are no tasks!</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Completed?</th>
                    <th>Task</th>
                    <th>Created Date</th>
                    <th>Completed Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td align="center">{{ $task->completed ? 'Yes' : 'No' }}</td>
                  

                    <td>{{ $task->name }}</td>
                    <td align="center">{{ $task->creation_date }}</td>
                   
                    @if($task->completed)
                        <td align="center">{{ $task->completion_date }}</td>
                    @else
                        <td align="center"> Not Complete </td>
                    @endif
 
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