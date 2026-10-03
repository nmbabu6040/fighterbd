<?php

namespace App\Http\Middleware;

use App\Models\ActivityLog;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogActivity
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (auth()->check()) {

            $routeName = $request->route()?->getName();
            $method = $request->method();

            $action = match ($method) {
                'POST' => 'created',
                'PUT', 'PATCH' => 'updated',
                'DELETE' => 'deleted',
                default => null,
            };

            if ($action) {

                $route = $routeName ?? $request->path();

                $module = 'System';

                if (str_contains($route, 'blog')) {
                    $module = 'Blog';
                } elseif (str_contains($route, 'slider')) {
                    $module = 'Hero Slider';
                } elseif (str_contains($route, 'service')) {
                    $module = 'Service';
                } elseif (str_contains($route, 'gallery')) {
                    $module = 'Gallery';
                } elseif (str_contains($route, 'team')) {
                    $module = 'Team';
                } elseif (str_contains($route, 'testimonial')) {
                    $module = 'Testimonial';
                } elseif (str_contains($route, 'contact')) {
                    $module = 'Contact';
                } elseif (str_contains($route, 'settings')) {
                    $module = 'Settings';
                }

                $description = ucfirst($action) . ' ' . $module;

                ActivityLog::create([
                    'user_id' => auth()->id(),
                    'action' => $action,
                    'module' => $module,
                    'description' => $description,
                    'route' => $route,
                    'method' => $method,
                    'ip_address' => $request->ip(),
                ]);
            }
        }

        return $response;
    }
}
