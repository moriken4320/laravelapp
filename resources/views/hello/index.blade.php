{{-- <!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Hello/Index</title>
  <style>
    body {
      font-size: 16pt;
      color: #999;
    }

    h1 {
      font-size: 50pt;
      text-align: right;
      color: #f6f6f6;
      margin: -20px 0 -30px 0;
      letter-spacing: -4pt;
    }
  </style>
</head>

<body>
  <h1>Blade/Index</h1>
  {{-- @if ($msg != '')
  <p>{{$msg}}</p>
@else
<p>何か書いてください</p>
@endif --}}

{{-- @isset($msg)
  <p>{{$msg}}</p>
@else
<p>何か書いてください</p>
@endisset --}}

{{-- <p>&#064;foreachディレクティブの例</p>
  <ol>
    @foreach ($data as $item)
        <li>
            {{ $item }}
</li>
@endforeach
</ol> --}}

{{-- <p>&#064;forディレクティブの例</p>
  <ol>
      @for ($i = 1; $i < 100; $i++)
        @if ($i % 2 == 1)
          @continue
        @elseif ($i <= 10)
          <li>No, {{ $i }}
@else
@break
@endif
@endfor
</ol> --}}

{{-- <p>&#064;forディレクティブの例</p>
      @foreach ($data as $item)
          @if ($loop->first)
            <p>※データ一覧</p>
            <ul>
          @endif
            <li>No,{{ $loop->iteration }} . {{ $item }}</li>
@if ($loop->last)
</ul>
<p>ーーここまで</p>
@endif
@endforeach
</ol>

<p>&#064;whileディレクティブの例</p>
<ol>
    @php
    $counter = 0;
    @endphp
    @while ($counter < count($data)) <li>{{ $data[$counter] }}</li>
        @php
        $counter++;
        @endphp
        @endwhile
</ol>

<form method="POST" action="/hello">
    @csrf
    <input type="text" name="msg">
    <input type="submit">
</form>
</body>

</html> --}}

@extends('layouts.helloapp')

@section('title', 'index')

@section('menubar')
@parent
インデックスページ
@endsection

@section('content')
{{-- <p>ここが本文のコンテンツです。</p> --}}
{{-- <p>Controller value<br>'message' = {{ $message }}</p>
<p>ViewComposer value<br>'view_message' = {{ $view_message }}</p> --}}

{{-- <table>
    @foreach ($data as $item)
        <tr><th>{{ $item['name'] }}</th><td>{{ $item['mail'] }}</td></tr>
    @endforeach
</table>

<p>これは、<middleware>google.com</middleware>へのリンクです。</p>
<p>これは、<middleware>yahoo.co.jp</middleware>へのリンクです。</p> --}}

{{-- @component('components.message')
@slot('msg_title','CAUTION!')
@slot('msg_content')
これはメッセージの表示です。
@endslot
@endcomponent --}}

{{-- @include('components.message', ['msg_title'=>'OK', 'msg_content'=>'サブビューです。']) --}}

{{-- <ul>
    @each('components.item', $data, 'item')
</ul> --}}

<p>{{ $msg }}</p>

{{-- バリデーション後のエラーを管理するのが$errors --}}
@if (count($errors) > 0)
    <div>
        <ul>
            @foreach ($errors->all() as $error){{-- $errors->all()でエラーメッセージを配列にしてくれる --}}
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/hello" method="post">
<table>
    @error('name')
        <tr><th>ERROR</th><td>{{ $message }}</td></tr>
    @enderror
    <tr><th>name: </th><td><input type="text" name="name" value="{{ old('name') }}"></td></tr>
    @error('mail')
        <tr><th>ERROR</th><td>{{ $message }}</td></tr>
    @enderror
    <tr><th>mail: </th><td><input type="text" name="mail" value="{{ old('mail') }}"></td></tr>
    @error('age')
        <tr><th>ERROR</th><td>{{ $message }}</td></tr>
    @enderror
    <tr><th>age: </th><td><input type="text" name="age" value="{{ old('age') }}"></td></tr>
    <tr><th></th><td><input type="submit" value="send"></td></tr>
</table>
</form>

@endsection

@section('footer')
copyright 2020 tuyano.
@endsection
