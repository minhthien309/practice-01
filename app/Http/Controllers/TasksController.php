<?php


namespace App\Http\Controllers;
use App\Project;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        //
        return view('tasks.index',compact('project')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        //
        return view('tasks.create',compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $project = new Project;
        $task = new Task;
        
        $pslug = $request->pslug;
        $task->project_id = $request->pid;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->slug = $request->slug;
        $task->save();

        return redirect()->route('projects.show',[$pslug])->with('alert','Đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, Task $task)
    {
        //
        return view('tasks.show',compact('project','task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, Task $task)
    {
        //
        return view('tasks.edit',compact('project','task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pid, $tid)
    {
        //
        $slug = $request->slug;
        Task::where('id',$tid)
        ->update([
            'id'=>$tid,
            'name'=>$request->name,
            'description'=>$request->description,
            'slug' =>$slug,
        ]);

        $pslug = $request->pslug;
        

        return redirect()->route('projects.tasks.show',[$pslug,$slug])->with('alert','Đã sửa xong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Project $project, Task $task)
    {
        //
        $id = $task->id;
        $task = Task::find($id);
        $task->delete($id);
        $slug=$project->slug;
        return redirect()->route('projects.show',$slug)->with('alert','Đã xóa xong');
    }
}
