<html>
    <head>
        <link rel='stylesheet' href='{{ URL::to("signup.css") }}'>
        <script>
            const CHECK_USERNAME_URL = "{{ URL::to('signup/check/username') }}";
            const CHECK_EMAIL_URL = "{{ URL::to('signup/check/email') }}";
        </script>
        <script src='{{ URL::to("signup.js") }}' defer></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="favicon.png">
        <meta charset="utf-8">

        <title>Iscriviti - Musity</title>
    </head>
    <body>
        <div id="logo">
            Musity
        </div>
        <main>
        <section class="main_left">
        </section>
        <section class="main_right">
            <h1>Iscriviti gratuitamente per conoscere la tua musica preferita</h1>
            <form name='signup' method='post' enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="names">
                    <div class="name">
                        <label for='name'>Nome</label>
                        <!-- Se il submit non va a buon fine, il server reindirizza su questa stessa pagina, quindi va ricaricata con 
                            i valori precedentemente inseriti -->
                        <input type='text' name='name' value='{{ old("name") }}'>
                        <div><img src="{{ URL::to('assets/close.svg') }}"/><span>Devi inserire il tuo nome</span></div>
                    </div>
                    <div class="surname">
                        <label for='surname'>Cognome</label>
                        <input type='text' name='surname' value='{{ old("surname") }}'>
                        <div><img src="{{ URL::to('assets/close.svg') }}"/><span>Devi inserire il tuo cognome</span></div>
                    </div>
                </div>
                <div class="username">
                    <label for='username'>Nome utente</label>
                    <input type='text' name='username' value='{{ old("username") }}'>
                    <div><img src="{{ URL::to('assets/close.svg') }}"/><span>Nome utente non disponibile</span></div>
                </div>
                <div class="email">
                    <label for='email'>Email</label>
                    <input type='text' name='email' value='{{ old("email") }}'>
                    <div><img src="{{ URL::to('assets/close.svg') }}"/><span>Indirizzo email non valido</span></div>
                </div>
                <div class="password">
                    <label for='password'>Password</label>
                    <input type='password' name='password' value='{{ old("password") }}'>
                    <div><img src="{{ URL::to('assets/close.svg') }}"/><span>Inserisci almeno 8 caratteri</span></div>
                </div>
                <div class="confirm_password">
                    <label for='confirm_password'>Conferma Password</label>
                    <input type='password' name='confirm_password' value='{{ old("confirm_password") }}'>
                    <div><img src="{{ URL::to('assets/close.svg') }}"/><span>Le password non coincidono</span></div>
                </div>
                <div class="fileupload">
                    <label for='avatar'>Scegli un'immagine profilo</label>
                        <input type='file' name='avatar' accept='.jpg, .jpeg, image/gif, image/png' id="upload_original">
                        <div id="upload"><div class="file_name">Seleziona un file...</div><div class="file_size"></div></div>
                    <span>Le dimensioni del file superano 7 MB</span>
                </div>
                <div class="allow"> 
                    <input type='checkbox' name='allow' value="1" {{ old('allow') ? 'checked' : '' }}>
                    <label for='allow'>Accetto i termini e condizioni d'uso di Musity.</label>
                </div>
                @foreach($errors->all() as $error)
                <div class='errorj'>
                    <img src='{{ URL::to("assets/close.svg") }}'/>
                    <span>{{ $error }}</span>
                </div>
                @endforeach
                <div class="submit">
                    <input type='submit' value="Registrati" id="submit">
                </div>
            </form>
            <div class="signup">Hai un account? <a href="{{ URL::to('login') }}">Accedi</a>
        </section>
        </main>
    </body>
</html>