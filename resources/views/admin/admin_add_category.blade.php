@extends('admin.layouts.layout')

@section('content')

    <form method="post" action="{{route('admin-add-cat')}}" enctype="multipart/form-data">
        <label>Введите название новой категории:</label>
        <input type="text" name="new_category" required><br><br>
        <label>Выбрать картинку для категории (*.jpg): </label>

        <input type="file" name="image"><br><br>
        <button name="submit" type="submit">Добавить категорию</button>
        {{csrf_field()}}
    </form>


@endsection