@extends('layouts.admin')

@section('content')

    <h1>Comment section</h1>
    <div class="comments">
        @foreach($comments as $comment)
            <form action="/admin/comments/save/{{$comment->id}}" method="post">
                {{csrf_field()}}

                <textarea name="comment" id="comment">
                    {{$comment->comment}}
                </textarea>
                <input type="checkbox" id="not_recommend" name="not_recommend" @if($comment->not_recommend)checked="checked"@endif><label for="not_recommend">Not recommend</label>
                <input type="checkbox" id="confirm" name="confirm"  @if($comment->confirm)checked="checked"@endif><label for="confirm">Confirm print</label>
                <button type="submit">Save</button>
            </form>
        @endforeach
    </div>

@endsection