@extends('layouts.admin')

@section('content')

    <h1>Choose color for background</h1> <br>

<form action="settings/save_background_color" method="post">
    {{csrf_field()}}

    <input name="background_color" value="@if(isset($settings['background_color'])){{$settings['background_color']}}@else white @endif">
    <button type="submit">Save</button>
</form>

@endsection