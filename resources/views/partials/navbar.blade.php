<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/">My Library Home</a>
 
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            
            @if( auth()->check() )
            <li class="nav-item">
               <a class="nav-link" href="/editprofile">{{ auth()->user()->username }}</a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/mybooks">My Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/collection">My Collection</a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="/register">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="/">All Books</a>
            @if( auth()->check() )
            <li class="nav-item">
               <a class="nav-link" href="/logout">Log out</a>
            </li>
            @endif
        </ul>
    </div>
</nav>