<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj książkę</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
</head>

<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">Sklep z Ebookami</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Strona główna</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">Kategorie</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($categories as $category)
                            <li><a class="dropdown-item" href="/">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                </button>
            </form>
        </div>
    </div>
</nav>
<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Sklep z Ebookami</h1>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <form id="editEbookForm" novalidate="novalidate" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group col-md-6">
            <label for="inputEbookTitle">Tytuł</label>
            <input type="text" class="form-control" id="inputEbookTitle" name="title" value="{{$ebook->title}}" readonly>
        </div>
        <div class="form-group col-md-4">
            <label for="inputEbookCat">Kategoria</label>
            <input type="text" class="form-control" id="inputEbookCat" name="category" value="{{$ebook_cat_name}}" readonly>
        </div>
        <div class="form-group col-md-6">
            <label for="price">Cena</label>
            <input type="number" class="form-control" id="price" name="price" value="{{$ebook->price}}" readonly>
        </div>
        <div class="form-group col-md-6">
            <label for="inputEbookPublisher">Wydawnictwo</label>
            <input type="text" class="form-control" id="inputEbookPublisher" name="publisher" value="{{$ebook->publisher}}" readonly>
        </div>
        <div class="form-group">
            <label for="ebookDescription">Opis</label>
            <textarea type="text" class="form-control" id="ebookDescription" name="description" readonly>{{$ebook->description}}</textarea>
        </div>
        <div class="form-group col-md-4">
            <label for="ebookAuthor">Autor</label>
            <input type="text" class="form-control" id="inputEbookAuthor" name="publisher" value="{{$ebook_author_name}}" readonly>
        </div>
        <div class="form-group">
            <label for="ebookImage">Okładka</label>
            <img class="card-img-top" style="width: 400px; height: 300px;" src="{{$ebook->image}}" alt="..."  />
        </div>
    </form>
</section>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
</footer>
</body>
</html>
