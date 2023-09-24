<?php 

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View\View;

class PostController extends Controller
{
    public function index(): string
    {
        return View::view('post.index');
    }   

    public function show(string $post): string
    {
        return View::view('post.show', compact('post'));
    }
}