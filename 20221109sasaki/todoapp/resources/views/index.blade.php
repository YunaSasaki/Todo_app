@extends('layouts.default')
<style>
  .button-find {
    text-align: left;
    border: 2px solid #8df53d;
    font-size: 12px;
    color: #8df53d;
    background-color: #fff;
    font-weight: bold;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.4s;
    outline: none;
  }

  .button-find:hover {
    background-color: #8df53d;
    border-color: #8df53d;
    color: #fff;
  }

  .tag-select {
    border: 1px solid #ccc;
    font-size: 12px;
    background-color: #fff;
    font-weight: bold;
    padding: 8px;
    border-radius: 5px;
    cursor: pointer;
  }

  .input-add {
    width: 75%;
    padding: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
    appearance: none;
    font-size: 14px;
    outline: none;
  }

  .button-add {
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

  .button-add:hover {
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
</style>
@section('title', 'Todo list')

@section('content')
<button class="button-find mb-15" onclick="location.href='{{ route('todo.find') }}'" type="button">タスク検索</button>
<form method="post" class="flex between mb-30">
  @csrf
  <input type="text" class="input-add" name="content" />
  <input type="hidden" name="user_id" value="1" />
  <select class="tag-select" name="tag_id">
    <option value=""></option>
    @foreach($tags as $tag)
    <option value="{{ $tag->id }}">{{ $tag->content }}</option>
    @endforeach
  </select>
  <button formaction="/todo/create" class="button-add" type="submit">追加</button>
</form>
<table>
  <tr>
    <th>作成日</th>
    <th>タスク名</th>
    <th>タグ</th>
    <th>更新</th>
    <th>削除</th>
  </tr>
  @foreach ($todos as $todo)
  <form method="post">
    @csrf
    <tr>
      <td>
        {{ $todo->created_at }}
      </td>
      <td>
        <input type="hidden" name="id" value="{{$todo->id}}">
        <input type="text" class="input-update" value="{{ $todo->content }}" name="content" />
      </td>
      <td>
        <select class="tag-select" name="tag_id">
          <option value=""></option>
          @foreach($tags as $tag)
          @if($todo->tag_id== $tag->id)
            <option value="{{ $tag->id }}" selected>{{ $tag->content }}</option>
          @else
            <option value="{{ $tag->id }}">{{ $tag->content }}</option>
          @endif
          @endforeach
        </select>
      </td>
      <td>
        <button formaction="/todo/update" class="button-update" type="submit">更新</button>
      </td>
      <td>
        <button formaction="/todo/delete" class="button-delete" type="submit">削除</button>
      </td>
    </tr>
  </form>
  @endforeach
</table>
@endsection