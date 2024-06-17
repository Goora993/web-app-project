<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj książkę</title>

    <!-- bootstrap 5 CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- bootstrap 5 Js bundle CDN-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</head>

<body>

<div class="container">
<h1> Dodawanie ebooka </h1>
<form id="addEbookForm" action="{{ route('ebook.store') }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
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
        <input type="text" class="form-control" id="inputEbookPublisher" name="publisher" placeholder="Wydawnictwo">
    </div>
    <div class="form-group">
        <label for="ebookDescription">Opis</label>
        <textarea type="text" class="form-control" id="ebookDescription" name="description"
                  placeholder="Opis"></textarea>
    </div>
    <div class="form-group">
        <label for="ebookImage">Okładka</label>
        <input type="file" class="form-control-file" id="ebookImage" name="image" accept="image/*" >
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
