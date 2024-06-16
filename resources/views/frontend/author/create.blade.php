<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dodawanie Autora</title>
    <link rel="stylesheet" href="{{ asset('assets/css/shared/style.css') }}">
</head>
<body>
<div class="sizer">
    <h1> Dodawanie autora </h1>
    <form id="addForm" action="{{ route('ebook.store') }}" method="POST" novalidate="novalidate"
          enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group col-md-6">
                <input type="text" class="form-control" id="inputAuthorName" name="name" placeholder="Imię" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAuthorSurname">Nazwisko</label>
                <input type="text" class="form-control" id="inputAuthorSurname" name="surname" placeholder="Nazwisko"
                       required>
            </div>
            <div class="form-group">
                <button type="submit" style="float: right" class="btn btn-primary">Dodaj</button>
            </div>

        </form>

</div>
</body>
</html>
