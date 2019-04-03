<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelPosts;

class ControllerPosts extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $posts = ModelPosts::paginate(10);

        return response()->json($posts);
    }

    //get by id
    public function get_post(Request $request, $id)
    {
        $post = ModelPosts::where('id',$id)->get();
        if(count($post) > 0)
        {
            $result['success'] = true;
            $result['message'] = $post;
            return response($result);
        }else
        {
            $result['success'] = false;
            $result['message'] = "Failed";
            return response($result);
        }
    }

    public function store(Request $request)
    {

        $create_by = $request->input('create_by');

        $title = $request->input('title');
        $content = $request->input('content');

        $add = ModelPosts::create([
            'create_by' => $create_by,
            'title' => $title,
            'content' => $content,
        ]);

        if ($add) {
            $res['success'] = true;
            $res['message'] = 'Sucess add';

            return response($res);
        }
    }

    public function update(Request $request, $id)
    {
        $post = ModelPosts::find($id);

        $post->update($request->all());

        if ($post) {
            $res['success'] = true;
            $res['message'] = 'Success Update';

            return response($post);
        }
    }
}
