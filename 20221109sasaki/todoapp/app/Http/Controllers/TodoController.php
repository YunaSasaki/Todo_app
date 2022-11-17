<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Tag;
use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $todos = Todo::where('user_id', $user->id)->get();
        $tags = Tag::all();
        $param = ['todos' => $todos, 'tags' => $tags, 'user' => $user];
        return view('index', $param);
    }
    public function create(TodoRequest $request)
    {
        $form = $request->all();
        Todo::create($form);
        return back();
    }
    public function update(TodoRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Todo::find($request->id)->update($form);
        return back();
    }
    public function delete(Request $request)
    {
        Todo::find($request->id)->delete();
        return back();
    }
    public function find()
    {
        $user = Auth::user();
        $tags = Tag::all();
        $todos = null;
        $param = ['todos' => $todos, 'tags' => $tags, 'user' => $user];
        return view('find', $param);
    }
    public function search(Request $request)
    {
        $user = Auth::user();
        $tags = Tag::all();
        $keyword = $request->content;
        $search_tag = $request->tag_id;
        if ($keyword != null && $search_tag == null) {
            $todos = Todo::where('user_id', $user->id)
                ->where('content', 'LIKE', '%' . $keyword . '%')
                ->get();
        }elseif ($keyword == null && $search_tag != null) {
            $todos = Todo::where('user_id', $user->id)
                ->where('tag_id', $search_tag)
                ->get();
        }elseif ($keyword != null && $search_tag != null) {
            $todos = Todo::where('user_id', $user->id)
                ->where('content', 'LIKE', '%' . $keyword . '%')
                ->where('tag_id', $search_tag)
                ->get();
        }else{
            $todos = Todo::where('user_id', $user->id)->get();
        }
        $param = ['todos' => $todos, 'tags' => $tags, 'user' => $user];
        return view('find', $param);
    }
}
