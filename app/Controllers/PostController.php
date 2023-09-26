<?php 

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View\View;

class PostController extends Controller
{
    public function index()
    {
        View::$layout = 'hui';
        return View::view('post.index');
    }   

    public function show(string $post)
    {
        return View::view('post.show', compact('post'));
    }

    public function store()
    {
        echo '1111';
    }
}