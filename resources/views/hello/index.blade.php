@extends('layouts.helloapp')

@section('title', 'index')

@section('menubar')
@parent
インデックスページ
@endsection

@section('content')

<p>{{ $msg }}</p>

<form action="/hello" method="post">
<table>
    @if ($errors->has('msg'))
    <tr><th>ERROR</th><td>{{ $errors->first('msg') }}</td></tr>
    @endif
    <tr><th>Message: </th><td><input type="text" name="msg" value="{{ old('msg') }}"></td></tr>
    <tr><th></th><td><input type="submit" value="send"></td></tr>
</table>
</form>

@endsection

@section('footer')
copyright 2020 tuyano.
@endsection
