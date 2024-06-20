<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('css/styles.css')}}" rel="stylesheet"/>
    <!-- JQuery-->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
</head>
<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">Sklep z Ebookami</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
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
            <form class="d-flex" action="{{ route('cart.details') }}" method="GET">
                @php $cartQuantity = 0 @endphp
                @if(session('cart') > 1)
                    @foreach(session('cart') as $id => $details)
                        @php $cartQuantity += $details['quantity'] @endphp
                    @endforeach
                @endif
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">{{ $cartQuantity }}</span>
                </button>
            </form>
            @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                        <a
                            href="{{ route('dashboard') }}"
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
    <table id="cart" class="table table-bordered">
        <thead>
        <tr>
            <th>Ebook</th>
            <th>Cena</th>
            <th>Ilość</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)

                <tr rowId="{{ $id }}">
                    <td data-th="Ebook">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] }}" class="card-img-top"/>
                            </div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Cena">{{ $details['price'] * $details['quantity'] }} zł</td>
                    <td data-th="Ilość">{{ $details['quantity'] }}</td>
                    <td class="actions">
                        <a class="btn btn-outline-danger btn-sm delete-product">Usuń<i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
                @php $total += $details['price'] * $details['quantity'] @endphp
            @endforeach
        @endif
        </tbody>
        <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <h4>Suma: {{$total}} zł</h4>
                <a href="{{ url('/') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Kontynuuj zakupy</a>
                <button class="btn btn-danger pay">Zapłać</button>
            </td>
        </tr>
        </tfoot>
    </table>
</section>


<script type="text/javascript">
    $(".edit-cart-info").change(function (e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: '{{ route('cart.update') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("rowId"),
            },
            success: function (response) {
                window.location.reload();
            }
        });
    });

    $(".delete-product").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        if (confirm("Czy na pewno chcesz usunąć pozycję?")) {
            $.ajax({
                url: '{{ route('cart.delete') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("rowId")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

    $(".pay").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        if (confirm("Czy na pewno chcesz złożyć zamówienie?")) {
            $.ajax({
                url: '{{ route('cart.pay') }}',
                method: "PATCH",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("rowId")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
</script>


<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Skelp z Ebookami 2024</p></div>
</footer>
<!-- Core theme JS-->
<script src="{{asset('js/scripts.js')}}"></script>
</body>
</html>
