<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;


class TaskController extends Controller
{
    public function index()
    {
        return view('task.index');
    }

    public function getTask(Request $request)
    {
        
        $task = Task::query();
        return DataTables::of($task)
        ->filter( function($task) use($request)
        {
            if(!empty($request->status)){

                if($request->status == 1){
                    $task->where('is_completed','1');
                }elseif($request->status == 2){
                    $task->where('is_completed','0');
                }
            }
        })
        ->addColumn('action', function ($task) {
            $editButton = '<div class="buttons action_buttons">';

            $editButton .= '<a href="' . route('task.edit', $task->id) . '" class="btn btn-primary ml-2" data-toggle="tooltip" title="Edit" data-original-title="Edit"><i class="far fa-edit"></i></a>';

            $editButton .= '<a href="javascript:void(0)" id="' . $task->id . '" class="btn btn-danger deleteTask ml-2" title="Delete" data-original-title="Delete"><i class="fas fa-light fa-trash fa-fw"></i></a>';

            $editButton .= '</div>';

            return $editButton;
        })
        ->editColumn('is_completed', function ($task) {
            if ($task->is_completed == 1) {
                return '<span class="block-email text-success">Completed</span>';
            } else {
                return '<span class="block-email text-danger">Incomplete</span>';
            }
        })
        ->addIndexColumn()
        ->rawColumns(['action','is_completed'])
        ->make(true);
    }

    public function create()
    {
        return view('task.create');
    }

    public function store(StoreRequest $request)
    {
        $input = $request->all();

        if(!empty($input))
        {
            $task = new Task();
            $task->title = $input['title'];
            $task->description = $input['description'];
            $task->is_completed = 0;

           
            $task->save();

            return redirect('task')->with('success', 'Task created successfully.');
        }
        else{
            return redirect('task')->with('error', 'Something went wrong.');
        }
    }

    public function edit($id)
    {
        $task = Task::find($id);

        return view('task.edit',compact('task'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $task = Task::where('id', $id)->first();

        if (!empty($task)) {

            $task->title = $request->title;
            $task->description = $request->description;
            $task->is_completed = $request->status;

            $task->save();

            return redirect('task')->with('success', 'Task updated successfully.');
        }
        return redirect('task')->with('error', 'Something went wrong.');
    }

    public function destroy($id)
    {
        $task = Task::find($id);

        if(!empty($task))
        {
            $task->delete();
            Session::flash('success', 'Task deleted successfully.');
            return response()->json(['sucess'=>'success']);
        }else{
            Session::flash('error', 'Task not found.');
            return response()->json(['success'=>'success']);
        }
    }
}
