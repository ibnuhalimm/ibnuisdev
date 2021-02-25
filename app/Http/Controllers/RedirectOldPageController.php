<?php

namespace App\Http\Controllers;

use App\Models\RedirectOldPage;
use Illuminate\Http\Request;

class RedirectOldPageController extends Controller
{
    /**
     * Redirect old page to a new one.
     *
     * @param string $old_slug
     * @return \Illuminate\Http\Response
     */
    public function index($old_slug)
    {
        $old_page = RedirectOldPage::where('slug', $old_slug)->first();

        abort_if(!$old_page, 404);

        return redirect()->to($old_page->new_url, 302);
    }
}
