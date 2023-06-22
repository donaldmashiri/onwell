<li class="nav-item ">
    <a class="nav-link collapsed " href="{{route('home')}}"><i class="fas fa-fw fa-user"></i>Profile   </a>
</li>
@if(Auth::user()->role === "admin")
    <li class="nav-item ">
        <a class="nav-link collapsed " href="{{ route('stocks.index') }}"><i class="fas fa-fw fa-fan"></i>Stock/Asset </a>
    </li>
<li class="nav-item ">
    <a class="nav-link collapsed " href="{{ route('stocksrequests.index') }}"><i class="fas fa-fw fa-ankh"></i>Assets Track Management </a>
</li>
    <li class="nav-item ">
        <a class="nav-link collapsed " href="{{ route('stocks.level') }}"><i class="fas fa-fw fa-landmark"></i>Stock Levels </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link collapsed " href="{{ route('budgets.index') }}"><i class="fas fa-fw fa-cat"></i>Budget Planning</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link collapsed " href="{{ route('stocks.reports') }}"><i class="fas fa-fw fa-retweet"></i> Reports </a>
    </li>
@else
    <li class="nav-item ">
        <a class="nav-link collapsed " href="{{ route('stocksrequests.index') }}"><i class="fas fa-fw fa-ankh"></i>Request Stock </a>
    </li>
@endif


<li class="nav-item ">
    <a class="nav-link collapsed " href="/factorauth"><i class="fas fa-fw fa-lock"></i>Authentatication </a>
</li>

<li class="nav-item ">
    <a class="nav-link collapsed " href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-fw fa-reply"></i>Logout </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</li>
