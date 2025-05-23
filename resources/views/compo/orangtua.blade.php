<form method="POST" action="{{ route('login.orangtua') }}">
    @csrf
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login Orang Tua</button>
</form>
