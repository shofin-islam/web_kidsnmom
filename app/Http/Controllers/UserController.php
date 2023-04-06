<?php

    

namespace App\Http\Controllers;

    

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Project;
use App\Models\ProjectUser;
use App\Classes\UserProjectInfo;

use Spatie\Permission\Models\Role;

use DB;

use Hash;

use Illuminate\Support\Arr;

    

class UserController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {
        $projectInfo = new UserProjectInfo;
        $projectsNames = $projectInfo->getUserProjectName();

        // $data = User::orderBy('id','DESC')->paginate(10);
        
        $users = User::select('users.*', 'projects.name as project_name')
                ->leftJoin('project_users', 'users.id', '=', 'project_users.user_id')
                ->leftJoin('projects', 'project_users.project_id', '=', 'projects.id')
                ->orderBy('users.id', 'ASC')
                ->paginate(20);

        $usersWithProjects = [];

        foreach ($users as $user) {
            if (!isset($usersWithProjects[$user->id])) {
                $usersWithProjects[$user->id] = [
                    'user' => $user,
                    'projects' => [],
                ];
            }

    $usersWithProjects[$user->id]['projects'][] = $user->project_name;
}

// dd($usersWithProjects);

return view('users.index', compact('users', 'usersWithProjects'))->with('i', ($request->input('page', 1) - 1) * 20);

                
        // return view('users.index',compact('data'))

        //     ->with('i', ($request->input('page', 1) - 1) * 10);

    }

    

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $roles = Role::pluck('name','name')->all();
        $projects = Project::all();

        return view('users.create',compact('roles','projects'));

    }

    

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $this->validate($request, [

            'name' => 'required',

            'email' => 'required|email|unique:users,email',

            'password' => 'required|same:confirm-password',

            'projectId' => 'required|not_in:0',

            'roles' => 'required'

        ]);

    

        $input = $request->all();

        $input['password'] = Hash::make($input['password']);

    

        $user = User::create($input);

        $user->assignRole($request->input('roles'));

        $uID = $user->getAttribute('id');
        
        $project = new ProjectUser();
        $project->user_id = $uID;
        $project->project_id = $request->projectId;
        $project->save();

        return redirect()->route('users.index')

                        ->with('success','User created successfully');

    }

    

    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {
        $projectsNames = ProjectUser::select('projects.name as projectsNames')
        ->leftJoin('projects', 'project_users.project_id', '=', 'projects.id')
        ->where('user_id',$id)->get();

        $user = User::find($id);

        return view('users.show',compact('user','projectsNames'));

    }

    

    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $user = User::find($id);

        $roles = Role::pluck('name','name')->all();

        $userRole = $user->roles->pluck('name','name')->all();

        $projects = Project::all();
        // dd($projects);
        return view('users.edit',compact('user','roles','userRole','projects'));

    }

    

    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

    {

        $this->validate($request, [

            'name' => 'required',

            'email' => 'required|email|unique:users,email,'.$id,

            'password' => 'same:confirm-password',
            'projectId' => 'required|not_in:0',

            'roles' => 'required'

        ]);

    

        $input = $request->all();

        if(!empty($input['password'])){ 

            $input['password'] = Hash::make($input['password']);

        }else{

            $input = Arr::except($input,array('password'));    

        }

    

        $user = User::find($id);

        $user->update($input);

        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        
        $project = ProjectUser::where('user_id',$id)->first();
        $project->user_id = $id;
        $project->project_id = $request->projectId;
        $project->save();

        return redirect()->route('users.index')

                        ->with('success','User updated successfully');

    }

    

    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        User::find($id)->delete();

        return redirect()->route('users.index')

                        ->with('success','User deleted successfully');

    }

}