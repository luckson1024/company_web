<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiter;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ThrottleLogins
{
    /**
     * The rate limiter instance.
     *
     * @var \Illuminate\Cache\RateLimiter
     */
    protected $limiter;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Cache\RateLimiter  $limiter
     * @return void
     */
    public function __construct(RateLimiter $limiter)
    {
        $this->limiter = $limiter;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($this->tooManyAttempts($request)) {
            return $this->buildResponse($request);
        }

        $response = $next($request);

        if ($response->getStatusCode() === 422 || $response->getStatusCode() === 429) {
            $this->incrementAttempts($request);
        }

        return $response;
    }

    /**
     * Determine if the user has made too many attempts.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function tooManyAttempts(Request $request): bool
    {
        return $this->limiter->tooManyAttempts(
            $this->throttleKey($request),
            $this->maxAttempts()
        );
    }

    /**
     * Increment the login attempts.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function incrementAttempts(Request $request): void
    {
        $this->limiter->hit(
            $this->throttleKey($request),
            $this->decayMinutes() * 60
        );
    }

    /**
     * Get the throttle key for the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function throttleKey(Request $request): string
    {
        return Str::lower($request->input('email')).'|'.$request->ip();
    }

    /**
     * Build the response for throttled login attempts.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function buildResponse(Request $request): Response
    {
        $seconds = $this->limiter->availableIn(
            $this->throttleKey($request)
        );

        return back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => trans('auth.throttle', [
                    'seconds' => $seconds,
                    'minutes' => ceil($seconds / 60),
                ]),
            ]);
    }

    /**
     * Get the maximum number of attempts allowed.
     *
     * @return int
     */
    protected function maxAttempts(): int
    {
        return 5;
    }

    /**
     * Get the number of minutes to throttle for.
     *
     * @return int
     */
    protected function decayMinutes(): int
    {
        return 1;
    }
}
