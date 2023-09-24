<?php 

namespace App\Controllers;

use App\Core\Controller;

class PostController extends Controller
{
    public function index()
    {
        echo 'index';
    }

    public function show($post, $wost)
    {
        echo $post;
    }
}