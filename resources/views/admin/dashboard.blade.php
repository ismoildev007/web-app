<h1>Admin Dashboard</h1>

<form action="{{route('logout')}}" method="post">
    @csrf
    <button type="submit">
         logout
    </button>
</form>
