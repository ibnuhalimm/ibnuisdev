<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    use ApiResponser;

    /**
     * Get language pack
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = 200;
        $message = 'Success';
        $data = [
            'view_project' => __('global.view_project'),
            'close' => __('global.close'),
            'loading' => __('global.loading'),
            'more_portfolio' => __('global.more_portfolio'),
            'project_detail' => __('global.project_detail'),
            'name' => __('global.name'),
            'description' => __('global.description'),
            'link_demo' => __('global.link_demo_url'),
            'close' => __('global.close')
        ];

        return $this->apiResponse($status, $message, $data);
    }
}
