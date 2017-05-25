@extends('admin.layouts.layout')

@section('content')

    <form method="post" action="{{route('admin-add-product')}}" enctype="multipart/form-data">
        <label>Введите категорию для нового товара:</label>
        <select name="category">
            @foreach($categories as $category)
                <option >{{$category['title']}}</option>
            @endforeach
        </select><br><br>
        <label>Введите название нового товара:</label>
        <input type="text" name="new_product" required><br><br>
        <label>Введите цену нового товара:</label>
        <input type="text" name="price" required><br><br>
        <label>Выбрать картинку для нового товара: </label>
        <input type="file" name="image"><br><br>

        <textarea textarea rows="10" cols="45" name="description">

        </textarea><br><br>

        <button name="submit" type="submit">Добавить продукт</button>
        {{csrf_field()}}
    </form>

@endsection