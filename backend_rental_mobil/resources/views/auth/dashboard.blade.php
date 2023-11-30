@if (Auth::check())
<a href="{{ route('logout') }}">logout</a>
@else
<a href="{{ route('auth.login') }}">Login</a>
<a href="{{ route('penyewa.login') }}">Login Penyewa</a>
@endif
@can('isAdmin')
<h1>INI ADMIN</h1>
@elsecan('isUser')
<h1>INI BUKAN ADMIN</h1>
@elsecan('isPenyewa')
<h1>INI PENYEWA</h1>
@endcan
