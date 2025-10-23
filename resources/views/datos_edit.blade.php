<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('authors-books.update', $authorBook->id)}}" method="POST">
        @csrf
        @method('PUT')
        <select name="author_id" id="">
            @foreach($authors as $author)
                <option value="{{$author->id}}" {{ $author->id == $authorBook->author_id ? 'selected' : '' }}>{{$author->name}}</option>
            @endforeach
        </select>
        <button type="submit">Guardar</button>
        <select name="book_id" id="">
            @foreach($books as $book)
                <option value="{{$book->id}}" {{ $book->id == $authorBook->book_id ? 'selected' : '' }}>{{$book->title}}</option>
            @endforeach
        </select>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>