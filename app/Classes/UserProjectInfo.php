<?php
namespace App\Classes;
use App\Models\ProjectUser;
use DB;
use Auth;

class UserProjectInfo {

    public function __construct() {
        // return "";
    }

    public function getUserProjectId() {
        $userProjectId= ProjectUser::where('user_id',Auth::user()->id);

        return $userProjectId;
    }

    public function getUserProjectName() {
        $userProjects= ProjectUser::select(
            'p.id as pId',
            'p.name as pName'
            )
            ->join('projects as p', 'p.id', '=', 'project_users.project_id')
            ->where('project_users.user_id',Auth::user()->id)
            ->orderBy('p.id', 'asc')
            ->get();
            // dd($userProjects);
            return $userProjects;
    }

}