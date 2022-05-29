<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;

class RedirectLongUrlController extends Controller
{
    public function show(string $shortId)
    {
        $shortUrl = ShortUrl::query()
            ->where('short_id', $shortId)
            ->firstOrFail();

        return redirect()->to($shortUrl->origin);
    }
}
