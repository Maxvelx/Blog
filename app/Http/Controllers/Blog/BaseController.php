<?php


namespace App\Http\Controllers\Blog;


use App\Http\Controllers\Controller;
use App\Service\Blog\BlogService;

class BaseController extends Controller
{
    public BlogService $service;

    public function __construct(BlogService $service)
    {
        $this->service = $service;
    }
}
