<?php

namespace App\Http\Middleware;

use App\Models\Store;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class SetActiveStore
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $host=$request->getHost();
        $store=Store::where('domain',$host)->first();
        if($store)
        {
            app()->instance('store_active',$store);
            $db=$store->database_options['dbname'];
            Config::set('database.connections.tenant.database',$db);
        }

        return $next($request);
    }
}
