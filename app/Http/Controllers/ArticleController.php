<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use JD\Cloudder\Facades\Cloudder;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = auth()->user()->articles()->withTrashed()->latest()->paginate(10);

        return response()->json(['articles' => $articles], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        Cloudder::upload($request['image'], $request->category."_".$request['title'], [
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
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
        //
    }
}
