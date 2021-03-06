<?php

namespace TimurGit\EvalExpr;

use Illuminate\Support\ServiceProvider;
use TimurGit\EvalExpr\Commands\EvalExpressionCommand;

class EvalExprServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'timurgit');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'timurgit');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {

            // Publishing the configuration file.
            $this->publishes([
                __DIR__.'/../config/evalexpr.php' => config_path('evalexpr.php'),
            ], 'evalexpr.config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/timurgit'),
            ], 'evalexpr.views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/timurgit'),
            ], 'evalexpr.views');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/timurgit'),
            ], 'evalexpr.views');*/

            // Registering package commands.
             $this->commands([EvalExpressionCommand::class]);
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/evalexpr.php', 'evalexpr');
        $this->app->bind('TimurGit\EvalExpr\Evaluating', 'TimurGit\EvalExpr\EvalExpression');
        $this->app->bind('TimurGit\EvalExpr\Validator', 'TimurGit\EvalExpr\ValidatorExpression');
    }

}