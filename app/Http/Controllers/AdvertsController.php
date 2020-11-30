<?php

namespace App\Http\Controllers;

use App\Adverts;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use JD\Cloudder\Facades\Cloudder;

class AdvertsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = Adverts::withTrashed()->latest()->paginate(10);

        return response()->json([
            'adverts' => $adverts,
            'user' => auth()->user()
        ], 200);
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
                'name' => ['required', 'string'],
                'position' => ['required', 'string', 'unique:adverts'],
                'image_sm' => ['required'],
                'image' => ['required']
            ]);

            $imageName = Str::limit($request->name, 10);

            $imageName_sm = Str::limit($request->name, 7);

            Cloudder::upload($request['image'], $imageName, [
                'folder' => 'aura/adverts',
            ]);

            $image_url = Cloudder::show(
                Cloudder::getPublicId(),
                ['format' => 'png']
            );

            Cloudder::upload($request['image_sm'], $imageName_sm, [
                'folder' => 'aura/adverts',
            ]);

            $image_url_sm = Cloudder::show(
                Cloudder::getPublicId(),
                ['format' => 'png']
            );

            $data = [
                'name' => $request->name,
                'position' => $request->position,
                'image_sm' => $image_url_sm,
                'image' => $image_url,
                'created_by' => $user->name,
                'created_by_role' => $user->role->name,
                'status' => true
            ];

            $advert = Adverts::create($data);

            if ($advert) {
                return response()->json('Advert was created successfully!', 201);
            } else {
                return response()->json(
                    'There was a problem while creating advert',
                    500
                );
            }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Adverts  $adverts
     * @return \Illuminate\Http\Response
     */
    public function show(Adverts $adverts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Adverts  $adverts
     * @return \Illuminate\Http\Response
     */
    public function edit(Adverts $adverts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Adverts  $adverts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adverts $adverts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Adverts  $adverts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adverts $adverts)
    {
        if ($adverts->delete()) {
            return response()->json("Advert has been removed successfully.", 200);
        }
    }


    /**
     * Restores the specified resource from storage.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        $advert = Adverts::onlyTrashed()->findOrFail($request->id);
        if ($advert->restore()) {
            return response()->json("Advert has been restored successfully.", 200);
        }
    }
}
