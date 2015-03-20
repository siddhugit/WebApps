<?php

class TasksController extends BaseController {

	public function listAll()
    {
        $tasks = Task::where('user_id', '=', Auth::user()->id)->get();
        return View::make('listAll', compact('tasks'));
    }
	public function listComplete()
    {
        $tasks = Task::where('user_id', '=', Auth::user()->id)->where('completed', '=', 1)->get();
        return View::make('listComplete', compact('tasks'));
    }
	public function listIncomplete()
    {
        $tasks = Task::where('user_id', '=', Auth::user()->id)->where('completed', '=', 0)->get();
        return View::make('listIncomplete', compact('tasks'));
    }
	public function create()
    {
        // Show the create game form.
        return View::make('create');
    }
	public function createTask()
    {
        // Handle create form submission.
     	$task = new Task;
	    $task->name = Input::get('taskname');
	    $task->creation_date = Input::get('creation_date');
	    //$task->completion_date = Input::get('completion_date');
	    $task->user()->associate(Auth::user());
	    $task->save();

	    return Redirect::action('TasksController@listAll');
    }
	public function edit(Task $task)
    {
        return View::make('editTask', compact('task'));
    }
	public function editTask()
    {
        $task = Task::findOrFail(Input::get('id'));
		$task->completed = Input::has('completion_status');
		$task->name        = Input::get('taskname');
		$task->creation_date = Input::get('creation_date');
	    $task->completion_date = Input::get('completion_date');
		$task->save();

		return Redirect::action('TasksController@listAll');
    }
	public function delete(Task $task)
    {
        // Show delete confirmation page.
        return View::make('deleteTask', compact('task'));
    }

    public function deleteTask()
    {
        $id = Input::get('task');
        $task = Task::findOrFail($id);
        $task->delete();
        return Redirect::action('TasksController@listAll');
    }
}