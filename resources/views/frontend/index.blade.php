<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep z Ebookami</title>

    <!-- bootstrap 5 CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- bootstrap 5 Js bundle CDN-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Sklep z Ebookami</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse"
                 id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active"
                           aria-current="page"
                           href="/">Sklep</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="#">Kontakt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="#">O nas</a>
                    </li>
                    <li class="nav-item">
                        <?php if (isset($_SESSION['user_id'])) {?>
                        <a class="nav-link"
                           href="admin.php">Admin</a>
                        <?php }else{ ?>
                        <a class="nav-link"
                           href="login.php">Login</a>
                        <?php } ?>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <form action="/"
          method="get"
          style="width: 100%; max-width: 30rem">

        <div class="input-group my-5">
            <input type="text"
                   class="form-control"
                   name="key"
                   placeholder="Szukaj ebooka..."
                   aria-label="Szukaj ebooka..."
                   aria-describedby="basic-addon2">

            <button class="input-group-text
		                 btn btn-primary"
                    id="basic-addon2">
                <img src="{{ url('storage/static/search.png') }}"
                     width="20">

            </button>
        </div>
    </form>
    <div class="d-flex pt-3">
        <?php if (sizeof($ebooks) == 0){ ?>
        <div class="alert alert-warning
        	            text-center p-5"
             role="alert">
            <img src="img/empty.png"
                 width="100">
            <br>
            There is no book in the database
        </div>
        <?php }else{ ?>
        <div class="pdf-list d-flex flex-wrap">
                <?php foreach ($ebooks as $ebook) { ?>
            <div class="card m-1">
                <img src="{{ url($ebook->image) }}"
                     class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">
                            <?=$ebook['title']?>
                    </h5>
                    <p class="card-text">
                        <i><b>By:
                                    <?php foreach($authors as $author){
                                    if ($author['id'] == $ebook['author_id']) {
                                        echo $author['name'] . ' ' . $author['surname'];
                                        break;
                                    }
                                    ?>

                                <?php } ?>
                                <br></b></i>
                            <?=$ebook['description']?>
{{--                        <br><i><b>Category:--}}
{{--                                    <?php foreach($categories as $category){--}}
{{--                                    if ($category['id'] == $book['category_id']) {--}}
{{--                                        echo $category['name'];--}}
{{--                                        break;--}}
{{--                                    }--}}
{{--                                    ?>--}}

{{--                                <?php } ?>--}}
{{--                                <br></b></i>--}}
                    </p>
                    <a href="{{ url($ebook->image) }}"
                       class="btn btn-success">Open</a>

                    <a href="{{ url($ebook->image) }}"
                       class="btn btn-primary"
                       download="<?=$ebook['title']?>">Download</a>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>

{{--        <div class="category">--}}
{{--            <!-- List of categories -->--}}
{{--            <div class="list-group">--}}
{{--                <?php if ($categories == 0){--}}
{{--                    // do nothing--}}
{{--                }else{ ?>--}}
{{--                <a href="#"--}}
{{--                   class="list-group-item list-group-item-action active">Category</a>--}}
{{--                    <?php foreach ($categories as $category ) {?>--}}

{{--                <a href="category.php?id=<?=$category['id']?>"--}}
{{--                   class="list-group-item list-group-item-action">--}}
{{--                        <?=$category['name']?></a>--}}
{{--                <?php } } ?>--}}
{{--            </div>--}}

{{--            <!-- List of authors -->--}}
{{--            <div class="list-group mt-5">--}}
{{--                <?php if ($authors == 0){--}}
{{--                    // do nothing--}}
{{--                }else{ ?>--}}
{{--                <a href="#"--}}
{{--                   class="list-group-item list-group-item-action active">Author</a>--}}
{{--                    <?php foreach ($authors as $author ) {?>--}}

{{--                <a href="author.php?id=<?=$author['id']?>"--}}
{{--                   class="list-group-item list-group-item-action">--}}
{{--                        <?=$author['name']?></a>--}}
{{--                <?php } } ?>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</div>
</body>
</html>
