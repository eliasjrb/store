<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // $categories = \App\Category::all(['name', 'slug']);
        // com o view share eu consigo compartilha uma variavel com todas as view.
        // view()->share('categories', $categories);
        // Com o view composer eu posso escolher as view que vão exibir essa variavel

        // view()->compose('*', function($view) use($categories){
        //     return $view->with('categories', $categories);
        // });

        // view composer com provider 
        view()->composer('layouts.front', 'App\Http\Views\CategoryViewComposer@compose');
    }
}
