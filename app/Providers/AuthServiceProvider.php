<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\Article;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // 3 is my user id in the database
        // with this code I am authorized to click all of the buttons on the article page
        // Gate::before(function (User $user) {
        //     if ($user->id === 3) { //Bryan 
        //         return true;
        //     }
        // });

        //Instead of using facade as below, create a policy for the class and store the logic in there
        
        // Gate::define('update-article', function (User $user, Article $article) {
        //         return $article->author->is($user);

       // });

    }
}
