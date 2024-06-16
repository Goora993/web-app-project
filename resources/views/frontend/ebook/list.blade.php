<h1> Lista ebooków </h1>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Okładka</th>
        <th scope="col">Nazwa</th>
        <th scope="col">Autor</th>
    </tr>
    </thead>
    <tbody>
    @foreach($ebooks as $ebook)
        <tr>
            <th scope="row">{{$ebook->id}}</th>
            <td>{{$ebook->image}}</td>
            <td>{{$ebook->title}}</td>
            <td>{{$ebook->author}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
