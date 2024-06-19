<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj książkę</title>
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
                <li class="nav-item"><a class="nav-link" href="{{route('ebook.create')}}">Dodaj książkę</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('author.create')}}">Dodaj autora</a></li>
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
            @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="btn btn-outline-dark rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="btn btn-outline-dark rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="btn btn-outline-dark rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
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
    <form id="addEbookForm" action="{{ route('ebook.store') }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group col-md-6">
            <label for="inputEbookTitle">Tytuł</label>
            <input type="text" class="form-control" id="inputEbookTitle" name="title" placeholder="Tytuł">
        </div>
        <div class="form-group col-md-4">
            <label for="inputEbookCat">Kategoria</label>
            <select id="inputEbookCat" name="category" class="form-control">
                @foreach($categories as $category)
                    <option value="{{$category['name']}}">{{$category['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="price">Cena</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="0.0">
        </div>
        <div class="form-group col-md-6">
            <label for="inputEbookPublisher">Wydawnictwo</label>
            <input type="text" class="form-control" id="inputEbookPublisher" name="publisher" placeholder="Wydawnictwo">
        </div>
        <div class="form-group">
            <label for="ebookDescription">Opis</label>
            <textarea type="text" class="form-control" id="ebookDescription" name="description" placeholder="Opis"></textarea>
        </div>
        <div class="form-group">
            <label for="ebookImage">Okładka</label>
            <input type="file" class="form-control-file" id="ebookImage" name="image" accept="image/*" >
        </div>
        <div class="form-group col-md-4">
            <label for="ebookAuthor">Autor</label>
            <select id="ebookAuthor" name="author" class="form-control">
                @foreach($authors as $author)
                    <option value="{{$author['id'] . " " . $author['name']}}">
                        {{$author['id'] . " " . $author['name']}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button type="submit" style="float: right" class="btn btn-primary">Dodaj</button>
        </div>
    </form>
</section>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
</footer>
</body>
</html>
