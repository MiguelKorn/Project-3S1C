<?php

namespace App\Http\Controllers\Cms;

use App\Page;
use App\Project;
use App\ProjectTranslation;
use Illuminate\Http\Request;

class ProjectController extends CmsController
{
    public function listProjects($pageName)
    {
        $projects = Page::where('name', $pageName)->first()->projects()->get();
        foreach ($projects as $project) {
            $project['translation'] = Project::where('id', $project->id)->first()->translations()->where('locale', 'nl')->first();
        }

//        dd($projects);

        return view('cms.projects', compact(['pageName', 'projects']));
    }

    public function getProject($pageName, $projectID)
    {
        $project = Page::where('name', $pageName)->first()->projects()->where('id', $projectID)->first();
        $project['translations'] = Project::where('id', $projectID)->first()->translations()->get();

        return view('cms.project', compact('project'));
    }

    public function showAddProject($pageName)
    {
        return view('cms.forms.addProject', compact('pageName'));
    }

    public function showEditProject($pageName, $projectID)
    {
        $project = Page::where('name', $pageName)->first()->projects()->where('id', $projectID)->first();
        $project['nl'] = Project::where('id', $projectID)->first()->translations()->where('locale', 'nl')->first();
        $project['en'] = Project::where('id', $projectID)->first()->translations()->where('locale', 'en')->first();

        return view('cms.forms.editProject', compact(['pageName', 'project']));
    }

    public function addProject($pageName)
    {
        $page = Page::where('name', $pageName)->first();
        $data = request()->all();
        $newProject = new Project();
        $newProject->page_id = $page->id;
        $newProject->save();

        $projectID = $newProject->id;

        $pNL = new ProjectTranslation();
        $pNL->project_id = $projectID;
        $pNL->locale = 'nl';
        $pNL->title = $data['title-nl'];
        $pNL->description = $data['desc-nl'];
        $pNL->save();

        $pEN = new ProjectTranslation();
        $pEN->project_id = $projectID;
        $pEN->locale = 'en';
        $pEN->title = $data['title-en'];
        $pEN->description = $data['desc-en'];
        $pEN->save();

//        todo: if() save -> show else error/redirect

        return redirect()->route('cms.projects', $pageName);
    }

    public function editProject($pageName, $projectID)
    {
        $data = request()->all();
        $pNL = ProjectTranslation::where([['project_id', '=' ,$projectID], ['locale', '=', 'nl']])->first();
        $pNL->title = $data['title-nl'];
        $pNL->description = $data['desc-nl'];
        $pNL->save();

        $pEN = ProjectTranslation::where([['project_id', '=' ,$projectID], ['locale', '=', 'en']])->first();
        $pEN->title = $data['title-en'];
        $pEN->description = $data['desc-en'];
        $pEN->save();

        return redirect()->route('cms.projects.project', [$pageName, $projectID]);
    }

    public function deleteProject($pageName, $projectID)
    {
        $project = Page::where('name', $pageName)->first()->projects()->where('id', $projectID)->first();

        $projects = Page::where('name', $pageName)->first()->projects()->get();
        foreach ($projects as $project) {
            $project['translation'] = Project::where('id', $project->id)->first()->translations()->where('locale', 'nl')->first();
        }

        if($project->delete()) {
            return redirect()->route('cms.projects', $pageName);
        }
    }
}
