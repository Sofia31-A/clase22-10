<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('authors-books.store')}}" method="POST">
        @csrf
        <select name="author_id" id="">
            @foreach($authors as $author)
                <option value="{{$author->id}}">{{$author->name}}</option>
            @endforeach
        </select>
        <button type="submit">Guardar</button>
        <select name="book_id" id="">
            @foreach($books as $book)
                <option value="{{$book->id}}">{{$book->title}}</option>
            @endforeach
        </select>
        <button type="submit">Guardar</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Autor</th>
                <th>Libro</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authorBooks as $authorBook)
            <tr>
                <td>{{$authorBook->id}}</td>
                <td>{{$authorBook->author->name}}</td>
                <td>{{$authorBook->book->title}}</td>
                <td>
                    <a href="{{ route('authors-books.edit', $authorBook->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('authors-books.destroy', $authorBook->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este rol?')">Eliminar</button>
                        </form>
                </td>
            </tr>
            @endforeach
    </table>
</body>
</html>