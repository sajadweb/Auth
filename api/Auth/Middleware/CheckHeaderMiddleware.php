<?php


namespace Api\Auth\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CheckHeaderMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $clint_key = $request->header('client-key');
        $name = strtoupper($request->header('app-name'));
        $type = strtoupper($request->header('app-type'));
        $version =strtoupper($request->header('app-ver'));
        $where = $this->convert2json()
            ->filter(function ($collection) use ($type, $version,$name,$clint_key) {
                return in_array($type, $collection->app_type)
                    && in_array($version, $collection->version)
                    &&  $name === $collection->name
                    &&  $clint_key === $collection->client_key  ;
            })
            ->first();
        Log::info("clint_key:$clint_key,name:$name,type:$type,version:$version");
        if ($where == null) {
            return NotAcceptable406();
        }

        //TODO check authentication

        return $next($request);
    }

    public function convert2json()
    {
        $j = json_decode(Storage::disk('local')->get('app.json'));
        $array = collect($j->list);
        return $array;
    }
}
