<?php

namespace App\Http\Controllers;

use App\Models\form;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.post.index', [

            'posts' =>  form::where('user_id', auth()->user()->id)->get()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.post.create', [

            'categories' => category::all()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([

            'name' => 'required',
            'title' => 'required|max:255',
            'slug' => 'required|unique:forms',
            'category_id' => 'required',
            'deskripsi' => 'required'

        ]);

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->deskripsi), 150);

        form::create($validateData);

        return redirect('/dashboard/posts')->with('success', 'New post hasbeen added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\form  $form
     * @return \Illuminate\Http\Response
     */
    public function show( $form)
    {
        return view('dashboard.post.show', [

           'post' => $form = form::where('slug', $form)->first()
        ]); 
    

    
    }     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(form $form)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(form::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
