<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use JD\Cloudder\Facades\Cloudder;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource for the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $category)
    {
        $articles = Article::where("category", "=", $category)->with('user')->latest()->paginate(10);

        return response()->json($articles, 200);
    }

    /**
     * Display a listing of the resource for the Admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {

        if (auth()->user()->isSuperAdmin()) {

            $articles = Article::withTrashed()->latest()->paginate(8);

        } elseif (auth()->user()->isEditor()) {

            $articles = auth()->user()->articles()->withTrashed()->latest()->paginate(8);
        }

        return response()->json($articles);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request, User $user)
    {
        $request->validate([
            'title' => ['required', 'string', 'unique:articles'],
            'description' => ['required', 'string', 'min:8'],
            'content' => ['required', 'string', 'min:100'],
            'category' => ['required', 'string'],
            'image' => ['required'],
            'image_orientation' => ['required', 'string'],
        ]);

        Cloudder::upload($request['image'], $request->category . "_" . $request['title'], [
            'folder' => 'aura/',
        ]);

        $image_url = Cloudder::show(Cloudder::getPublicId());

        $data = [
            'title' => Str::title($request->title),
            'description' => $request->description,
            'content' => $request->content,
            'slug' => Str::slug($request->title, '-'),
            'category' => $request->category,
            'image' => $image_url,
            'user_name' => $user->name,
            'image_orientation' => $request->image_orientation,
        ];

        $article = $user->articles()->create($data);

        if ($article) {
            return response()->json('Article was created successfully!', 201);
        } else {
            return response()->json(
                'There was a problem while creating article',
                500
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if ($article->delete()) {
            return response()->json("Article has been removed successfully.", 200);
        }

    }

    /**
     * Restores the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        $article = Article::onlyTrashed()->findOrFail($request->id);
        if ($article->restore()) {
            return response()->json("Article has been restored successfully.", 200);
        }
    }

}
