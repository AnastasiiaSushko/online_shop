@extends('layouts.master')

@section('content')


    <h1> Личный кабинет...<span style="color: darkred">{{$user->name}}</span> </h1>

<div>
    <form method="post" action="/user/{{$user->id}}" class="form-horizontal" style="width: 500px">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Изменить имя</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="Имя">
                <button type="submit" class="btn btn-default">Редактировать</button>
            </div>
        </div>
    </form>


            <form method="post" action="/user/{{$user->id}}" class="form-horizontal" style="width: 500px">
                {{csrf_field()}}
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Изменить пароль</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
                <button type="submit" class="btn btn-default">Редактировать</button>
            </div>
        </div>
    </form>

</div>


@endsection