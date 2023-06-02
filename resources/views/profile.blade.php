<html>

    <head>
        <link rel='stylesheet' href='profile.css'>
        <script src='profile.js' defer></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">

        <title>Musity - {{$user->name}}</title>
    </head>

    <body>
    <div id="overlay">
    </div>
        <header>
            <nav>
                <div class="nav-container">
                    <div id="logo">
                         Musity
                    </div>
                    <div id="links">
                        <a href='/home'>HOME</a>
                        <a>DISCOVER</a>
                        <a>ABOUT</a>
                        <a>CONTACT</a>
                        <div id="separator"></div>
                        <a href='/logout' class='button'>LOGOUT</a>
                    </div>
                    <div id="menu">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <div class="userInfo">
                    <div class="avatar" style="background-image: url({{ $user->propic == null ? 'assets/default_avatar.png' : $user->propic }})">
                    </div>
                    <h1>{{ $user->name }}</h1>
                </div>               
            </nav>
        </header>

        <section class="container">

            <div id="results">
            @foreach ($songs as $song)
            <div class="track unselected">
                <div class="trackInfo">
                    <img src="{{$song->content->image}}">
                    <div class="infoContainer">
                        <div class="info">
                            <strong>{{$song->content->title}}</strong>
                            <a>{{$song->content->artist}}</a>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
            </div>
    </section>

    </body>
</html>
