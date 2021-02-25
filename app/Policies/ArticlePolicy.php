<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    // This will happen before any other checks
    // Can basically give role level authorization
    // Thsi can be done globally (for all policies as in this project) in AuthServiceProvider using the Gate facade
    // public function before(User $user)
    // {
    //     if($user->id === 3) { // pretend they're admin
    //         return true;
    //     }
    // }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return mixed
     */
    public function update(User $user, Article $article)
    {
        //
        return $article->author->is($user);
    }
}
