<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Project;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    use ApiResponser;

    /**
     * Get project page resource
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = $request->get('page', 1);
        if ($page < 1) {
            $page = 1;
        }

        $take = $request->get('limit', 10);
        if ($take < 1) {
            $take = 1;
        }

        if ($take > 10) {
            $take = 10;
        }

        $skip = ($page - 1) * $take;

        $projects = Project::latestProject()->published()->take($take)->skip($skip)->lang($request->header('X-LANG'))->get();
        $projects_count = Project::published()->lang($request->header('X-LANG'))->count();
        $projects_result = $projects->map(function($data) {
            return [
                'id' => $data->id,
                'name' => $data->name,
                'image_url' => $data->image_url,
                'description' => $data->description,
                'link' => $data->link
            ];
        });

        $status = 200;
        $message = 'Success';

        $data = [
            'is_more' => $projects_count > ($page * $take),
            'projects' => $projects_result
        ];

        return $this->apiResponse($status, $message, $data);
    }

    /**
     * Get portfolio details
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        $project = Project::published()->where('id', $id)->first();

        $status = 404;
        $message = 'Not found';
        $data = [];
        if (!empty($project)) {
            $status = 200;
            $message = 'Success';
            $data = [
                'project' => [
                    'id' => $project->id,
                    'name' => $project->name,
                    'image_url' => $project->image_url,
                    'description' => $project->description,
                    'link' => $project->link
                ]
            ];
        }

        return $this->apiResponse($status, $message, $data);
    }
}
