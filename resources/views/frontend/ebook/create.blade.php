<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/shared/style.css') }}">
</head>

<body>

<div class="sizer">
    <h1> Dodawanie ebooka </h1>

    <form id="addForm" action="{{ route('ebook.store') }}" method="POST" novalidate="novalidate"
          enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group col-md-6">
                <label for="inputEbookTitle">Tytuł</label>
                <input type="text" class="form-control" id="inputEbookTitle" name="title" placeholder="Tytuł">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEbookCat">Kategoria</label>
                <input type="text" class="form-control" id="inputEbookCat" name="category" placeholder="Kategoria">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEbookPublisher">Wydawnictwo</label>
                <input type="text" class="form-control" id="inputEbookPublisher" name="publisher"
                       placeholder="Wydawnictwo">
            </div>
            <div class="form-group">
                <label for="ebookDescription">Opis</label>
                <textarea type="text" class="form-control" id="ebookDescription" name="description"
                          placeholder="Opis"></textarea>
            </div>
            <div class="form-group">
                <label for="ebookImage">Okładka</label>
                <input type="file" class="form-control-file" id="ebookImage" name="image" accept="image/*">
            </div>
            <div class="form-group col-md-4">
                <label for="ebookAuthor">Autor</label>
                <select id="ebookAuthor" name="author" class="form-control">
                    @foreach($authors as $author)
                        <option value="{{$author['id'] . " " . $author['name'] . " " . $author['surname']}}">
                            {{$author['id'] . " " . $author['name'] . " " . $author['surname']}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" style="float: right" class="btn btn-primary">Dodaj</button>
            </div>
        </form>

</div>
</body>
</html>
