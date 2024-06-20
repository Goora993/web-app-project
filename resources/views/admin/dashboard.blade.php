<!-- Bootstrap icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>
<!-- Core theme CSS (includes Bootstrap)-->
<link href="{{asset('css/styles.css')}}" rel="stylesheet"/>
<!-- JQuery-->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <table id="users" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Nazwa użytkownika</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td class="actions">
                                <a class="btn btn-outline-danger btn-sm delete-user">Usuń<i class="fa fa-trash-o"></i></a>
                            </td>
{{--                            <form action="{{ route('user.delete', ['id'=>$user->id]) }}" method="delete">--}}
{{--                                <a class="btn btn-outline-danger btn-sm delete-product">Usuń<i class="fa fa-trash-o"></i></a>--}}
{{--                            </form>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

<script type="text/javascript">
    $(".delete-user").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        console.log(ele)
        if (confirm("Czy na pewno chcesz usunąć użytkownika?")) {
            $.ajax({
                url: '{{ route('user.delete', ['id'=>$user->id]) }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
</script>
