<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\form;
use App\Models\User;
use App\Models\Category;



class formcontroller extends Controller
{
    public function index()
    {


        $title = '';

        if (request('category')) {
            
            $category = Category::firstWhere('slug', request('category'));

            $title = ' in ' . $category->name;
        }
        
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));

            $title = ' By ' . $author->username;
        }


       return view('form', 
        [
            'title' => 'All Post'. $title,
            'active' => 'forms',
            'forms' => form::latest()->filter(Request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    
    }

    public function show(form $form)
    {

         return view('post', 
        [
            'title' => 'single post',
            'active' => 'form',
            'forms' => $form
        ]);
        
    }
}
