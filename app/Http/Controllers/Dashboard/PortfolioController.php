<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Show section page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard.portfolio.index');
    }

    /**
     * Show create form
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.portfolio.create');
    }

    /**
     * Show edit form
     *
     * @param int $project_id
     * @return \Illuminate\View\View
     */
    public function edit($project_id)
    {
        $project = Project::findOrFail($project_id);

        $data = [
            'project' => $project
        ];

        return view('dashboard.portfolio.edit', $data);
    }
}
