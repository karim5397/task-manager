<?php

namespace App\Http\Controllers;

use App\Http\Requests\task\StoreTaskRequest;
use App\Http\Requests\task\UpdateTaskRequest;
use App\Models\Task;
use Exception;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks=Task::orderBy('id','desc')->pagination(15);
        return view('task.index',compact('tasks'));
    }
    public function create()
    {
        return view('task.create');
    }
    public function store(StoreTaskRequest $request)
    {
        try {
            $data=$request->validated();
            $data['user_id']=auth()->user()->id;
            Task::create($data);
            return redirect()->route('task.index')->with('success','The task added successfully');
        } catch (Exception $ex) {
            return back()->with('error' ,'Something Went Wrong '.$ex->getMessage())->withInput();
        }
    }
    public function show($id)
    {
        $task=Task::findOrFail($id);
        return view('task.show',compact('task'));
    }
    public function edit($id)
    {
        $task=Task::findOrFail($id);
        if($task->user_id === auth()->user()->id){
            return view('task.edit',compact('task'));
        }else{
            return redirect()->route('task.index')->with('error',"you don't have access to edit this task");
        }
    }
    public function update(UpdateTaskRequest $request,$id)
    {
        try{
            $data=$request->validated();
            $data['user_id']=auth()->user()->id;
            $task=Task::findOrFail($id);
            $task->update($data);
            return redirect()->route('task.index')->with('success','The task updated successfully');
        } catch (Exception $ex) {
            return back()->with('error' ,'Something Went Wrong '.$ex->getMessage())->withInput();
        }
    }
    public function destroy($id)
    {
        try{
            $task=Task::findOrFail($id);
            if($task->user_id === auth()->user()->id){
                $task->delete();
                return redirect()->route('task.index')->with('success' , 'The task is deleted');
            }else{
                return redirect()->route('task.index')->with('error',"you don't have access to edit this task");
            }
        }catch(Exception $ex){
            return back()->with('error' ,'Something Went Wrong '.$ex->getMessage())->withInput();
        }
    }
}
