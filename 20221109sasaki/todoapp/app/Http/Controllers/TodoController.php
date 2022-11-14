<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Tag;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        $tags = Tag::all();
        return view('index', ['todos' => $todos ,'tags' => $tags]);
    }
    public function create(TodoRequest $request)
    {
        $form = $request->all();
        var_dump($form);
        unset($form['_token']);
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
        $tags = Tag::all();
        $todos = null;
        // dd($tags);
        return view('find', ['todos' => $todos, 'tags' => $tags]);
    }
    public function search(Request $request)
    {
        $tags = Tag::all();
        $keyword = $request['content'];
        $search_tag = $request['tag_id'];
        if ($keyword != null && $search_tag == null) {
            $todos = Todo::where('content', 'LIKE', '%' . $keyword . '%')->get();
        }elseif ($keyword == null && $search_tag != null) {
            $todos = Todo::where('tag_id', $search_tag)->get();
        }elseif ($keyword != null && $search_tag != null) {
            $todos = Todo::where('content', 'LIKE', '%' . $keyword . '%')
                ->where('tag_id', $search_tag)
                ->get();
        }else{
            $todos = Todo::all();
        }
        // dd($todos);
        return view('find', ['todos' => $todos, 'tags' => $tags]);
    }
}
