<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Blog;
use App\Http\Requests\ArticleRequest;
use App\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class WebsiteController extends Controller
{

    public function index()
    {
        return view('website.home');
    }

}
