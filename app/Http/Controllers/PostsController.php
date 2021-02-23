<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostsController extends Controller
{
    function show($slug){
          // // $post = \DB::table('posts')->where('slug', $slug)->first();

           // Using eloquent model below
          // $post = Post::where('slug', $slug)->firstOrFail();

            //dd($post);

          ////  //$posts = [
         ////    //   'my-first-post' => 'Hello, this is my first blog post!',
         ////     //  'my-second-post' => 'Now I am getting the hang of this blogging thing.'
        ////    //];

         //   // Check to see if it exists
        //   // if(! array_key_exists($post, $posts)){
        //   //     abort(404, 'Sorry, that post was not found.');
          // //}

           //if(! $post){
            //   abort(404);
           //}

           // return view('post', [
                //'post' => $posts[$post]  ?? 'Nothing here yet'
            //    'post' => $post
          //  ]);

          return view('post' , [
              'post' => Post::where('slug', $slug)->firstOrFail()
          ]);
    }
}