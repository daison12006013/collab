<?php

namespace Daison\Collab;

use Closure;
use Exception;

/**
 * Collab will do all the calls for you.
 *
 * Example:
 *     $collab = new Collab();
 *     $collab->params($var1, $var2, $var3);
 *     $collab->handle(function ($var1, $var2, $var3) { ... });
 *     $collab->handle('MyClass');
 *     $collab->handle('MyClass@theMethod');
 *
 * @author Daison Carino <daison12006013@gmail.com>
 */
class Collab
{
    protected $args;

    /**
     * Undocumented function
     *
     * @return self
     */
    public static function make()
    {
        return new static();
    }

    /**
     * Undocumented function
     *
     * @return self
     */
    public static function instance()
    {
        return static::make();
    }

    /**
     * Undocumented function
     *
     * @return self
     */
    public static function getInstance()
    {
        return static::make();
    }

    /**
     * Undocumented function
     *
     * @param  mixed ...$params
     * @return self
     */
    public function setArgs(...$args)
    {
        $this->args = $args;

        return $this;
    }

    /**
     * Undocumented function
     *
     * @param  \Closure|string $callable
     * @return void
     */
    public function handle($callable)
    {
        $parsed = $this->parse($callable);

        return call_user_func_array(...$parsed);
    }

    /**
     * Undocumented function
     *
     * @param \Closure|string $callable
     * @return void
     */
    public function parse($callable)
    {
        if (is_callable($callable)) {
            return [$callable, $this->args];
        } elseif (is_string($callable)) {
            if (strpos($callable, '@') !== false) {
                $exploded = explode('@', $callable);

                return [
                    [new $exploded[0], $exploded[1]],
                    $this->args,
                ];
            }

            if (strpos($callable, '::') !== false) {
                $callable = explode('::', $callable);
            }
        }

        throw new Exception('Provide a callable by having a closure, invokeable or class-method call.');
    }
}
