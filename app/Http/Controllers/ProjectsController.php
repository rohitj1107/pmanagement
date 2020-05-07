<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         //
         if (Auth::check()) {
           $projects = Project::where('user_id',Auth::user()->id)->get();
           // $projects = Project::All();
           return view('projects.index',['projects'=>$projects]);
         }
         return view('auth.login');

     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create($id = null)
     {
         //
         return view('projects.create',['comapny_id'=>$id]);
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
         $Project = Project::create([
           'name' => $request->input('name'),
           'description' => $request->input('description'),
           'company_id' => $request->input('comapny_id'),
           'days' => $request->input('days'),
           'user_id' => Auth::user()->id
         ]);

         if ($Project) {
             return redirect()->route('projects.show',['Project'=>$Project->id])->with('success','Project Create successfully!');
         }
         return back()->withInput()->with('errors','Error create new comapny');
     }

     /**
      * Display the specified resource.
      *
      * @param  \App\Project  $Project
      * @return \Illuminate\Http\Response
      */
     public function show(Project $Project)
     {
         //
         $result = Project::find($Project->id);
         // var_dump($result);
         return view('projects.show',['result'=>$result]);
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Project  $Project
      * @return \Illuminate\Http\Response
      */
     public function edit(Project $Project)
     {
         //
         $result = Project::find($Project->id);
         return view('projects.edit',['result'=>$result]);
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Project  $Project
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, Project $Project)
     {
         //

         $ProjectUpdate = Project::where('id',$Project->id)->update([
           'name'=>$request->input('name'),
           'description'=>$request->input('description')
         ]);

         if ($ProjectUpdate) {
            return redirect()->route('projects.show',['Project'=>$Project->id])->with('success','Project Update Successfully');
         }
         return back()->withInput();
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Project  $Project
      * @return \Illuminate\Http\Response
      */
     public function destroy(Project $Project)
     {
         //
         $findProject = Project::find( $Project->id);
         if($findProject->delete()){
         	return redirect()->route('projects.index')->with('success','Project deleted succesfully');
         }

         return back()->withInput()->with('error','Project could not be deleted');
     }
}
