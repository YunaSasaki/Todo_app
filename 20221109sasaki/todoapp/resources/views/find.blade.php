@extends('layouts.default')
<style>
  .tag-select {
    border: 1px solid #ccc;
    font-size: 12px;
    background-color: #fff;
    font-weight: bold;
    padding: 8px;
    border-radius: 5px;
    cursor: pointer;
  }

  .input-search {
    width: 75%;
    padding: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
    appearance: none;
    font-size: 14px;
    outline: none;
  }

  .button-search {
    text-align: left;
    border: 2px solid #dc70fa;
    font-size: 12px;
    color: #dc70fa;
    background-color: #fff;
    font-weight: bold;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.4s;
    outline: none;
  }

  .button-search:hover {
    background-color: #dc70fa;
    border-color: #dc70fa;
    color: #fff;
  }

  table {
    text-align: center;
    width: 100%
  }

  tr {
    height: 50px;
  }

  .input-update {
    width: 90%;
    padding: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
    appearance: none;
    font-size: 14px;
    outline: none;
  }

  .button-update {
    text-align: left;
    border: 2px solid #fa9770;
    font-size: 12px;
    color: #fa9770;
    background-color: #fff;
    font-weight: bold;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.4s;
    outline: none;
  }

  .button-update:hover {
    background-color: #fa9770;
    border-color: #fa9770;
    color: #fff;
  }

  .button-delete {
    text-align: left;
    border: 2px solid #71fadc;
    font-size: 12px;
    color: #71fadc;
    background-color: #fff;
    font-weight: bold;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.4s;
    outline: none;
  }

  .button-delete:hover {
    background-color: #71fadc;
    border-color: #71fadc;
    color: #fff;
  }

  .button-back {
    text-align: left;
    border: 2px solid #808080;
    font-size: 12px;
    color: #808080;
    background-color: #fff;
    font-weight: bold;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.4s;
    outline: none;
  }

  .button-back:hover {
    background-color: #808080;
    border-color: #808080;
    color: #fff;
  }
</style>
@section('title', 'タスク検索')

@section('content')
<form method="post" class="flex between mb-30">
  @csrf
  <input type="text" class="input-search" name="content" />
  <select class="tag-select" name="tag_id">
    <option value=""></option>
    @foreach($tags as $tag)
    <option value="{{$tag->id}}">{{$tag->content}}</option>
    @endforeach
  </select>
  <button formaction="/search" class="button-search" type="submit">検索</button>
</form>
<table>
  <tr>
    <th>作成日</th>
    <th>タスク名</th>
    <th>タグ</th>
    <th>更新</th>
    <th>削除</th>
  </tr>
  @if($todos != null)
  @foreach ($todos as $todo)
  <form method="post">
    @csrf
    <tr>
      <td>
        {{ $todo->created_at }}
      </td>
      <td>
        <input type="hidden" name="id" value="{{$todo->id}}">
        <input type="text" class="input-update" value="{{$todo->content}}" name="content" />
      </td>
      <td>
        <select class="tag-select" name="tag_id">
          <option value=""></option>
          @foreach($tags as $tag)
          @if($todo->tag_id== $tag->id)
          <option value="{{$tag->id}}" selected>{{$tag->content}}</option>
          @else
          <option value="{{$tag->id}}">{{$tag->content}}</option>
          @endif
          @endforeach
        </select>
      </td>
      <td>
        <button formaction="/update" class="button-update" type="submit">更新</button>
      </td>
      <td>
        <button formaction="/delete" class="button-delete" type="submit">削除</button>
      </td>
    </tr>
  </form>
  @endforeach
  @else
  
  @endif
</table>
<button class="button-back" onclick="location.href='{{ route('todo.index') }}'" type="button">戻る</button>
@endsection