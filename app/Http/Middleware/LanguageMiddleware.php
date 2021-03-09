<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = Session::get('app_locale');
        if (empty($locale)) {
            $locale = $this->getVisitorLocale($request->ip());
            Session::put('app_locale', $locale);
        }

        App::setlocale($locale);

        return $next($request);
    }

    /**
     * Get visitor locale based on their IP address
     * Using geoplugin.net
     *
     * @param string $ip
     * @return string
     */
    private function getVisitorLocale($ip = '127.0.0.1')
    {
        if (in_array($ip, [ '127.0.0.1', 'localhost' ])) {
            return 'id';
        }

        $http = new Client();
        $geoplugin = $http->get('http://geoplugin.net/json.gp?ip=' . $ip);
        $response = collect($geoplugin->getBody()->getContents())->toArray();
        $country_name = isset($response['geoplugin_countryName'])
                        ? $response['geoplugin_countryName']
                        : 'Indonesia';

        if ($country_name == 'Indonesia') {
            return 'id';
        }

        return 'en';
    }
}
