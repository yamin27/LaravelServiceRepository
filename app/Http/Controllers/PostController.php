<?php

namespace App\Http\Controllers;

use App\Post;
use App\Services\PostService;
Use App\Repositories\PostRepository;
use App\Http\Requests\PostRequest;

use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postservice;

    public function __construct(PostService $postservice)
    {
        $this->postservice = $postservice;
    }

    public function index()
    {
       $posts = $this->postservice->index();

       return view('index', compact('posts'));
    }

    public function create (PostRequest $request)
    {
        $this->postservice->create($request);

        return back()->with(['status' => 'Post Created Successfully']);
    }

    public function read ($id)
    {
        $post = $this->postservice->read($id);

        return  view('edit', compact('post'));
    }

    public function update(PostRequest $request, $id)
    {
        $post = $this->postservice->update($request, $id);

        return redirect()->back()->with(['status' => 'Post has been updated Successfully']);
    }

    public function delete($id)
    {
        $this->postservice->delete($id);

        return back()->with(['status' => 'Post Deleted Successfully']);
    }
}
