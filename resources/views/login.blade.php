<html>
    <head>
        <link rel='stylesheet' href='{{ URL::to("login.css") }}'>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Accedi - Musity</title>
    </head>
    <body>
        <div id="logo">
            Musity
        </div>
        <main class="login">
        <section class="main">
            <h5>Per continuare, accedi a Musity.</h5>
                
            <form name='login' method='post'>
            @csrf
                <!-- Seleziono il valore di ogni campo sulla base dei valori inviati al server via POST -->
                <div class="username">
                    <label for='username'>Username</label>
                    <input type='text' name='username' value='{{ old("username") }}'>
                </div>
                <div class="password">
                    <label for='password'>Password</label>
                    <input type='password' name='password' value='{{ old("password") }}'>
                </div>
                
                <div class="submit-container">
                    <div class="login-btn">
                        <input type='submit' value="ACCEDI">
                    </div>
                </div>
            </form>
            <div class="signup"><h4>Non hai un account?</h4></div>
            <div class="signup-btn-container"><a class="signup-btn" href="{{ URL::to('signup') }}">ISCRIVITI A MUSITY</a></div>
        </section>
        </main>
    </body>
</html>