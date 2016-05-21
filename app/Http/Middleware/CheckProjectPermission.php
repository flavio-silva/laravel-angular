<?php

namespace CodeProject\Http\Middleware;

use Closure;
use CodeProject\Services\UserService;

class CheckProjectPermission
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public function handle($request, Closure $next)
    {
        $projectIds = $this->userService->getAuthenticatedUser()->projects->modelKeys();

        $projectId = $request->route()
            ->parameter('project_id', $request->route()->parameter('id'));

        
        if (in_array($projectId, $projectIds) || $projectId === null) {

            return $next($request);
        } 

        return response()->json([
           'error' => 'forbidden',
            'error_description' => 'Authenticated user has not permission to access this resource'
        ], 403);
    }
}
