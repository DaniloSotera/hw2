<head>
    <title>Musity</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="home.js" defer="true"></script>
  </head>
  
  <body>
    <div id="overlay" class="hidden">
    </div>
    <header>
      <nav>
        <div id="logo">
          Musity
        </div>
        <div id="links">
          <a>HOME</a>
          <a>DISCOVER</a>
          <a>ABOUT</a>
          <a>CONTACT</a>
          <div id="separator"></div>
          <a href='/profile'>PROFILO</a>
          <a href='/logout' class='button'>LOGOUT</a>
        </div>
        <div id="menu">
          <div></div>
          <div></div>
          <div></div>
        </div>
      </nav>
      <h1>Esplora i segreti della tua musica preferita</h1>
      <a class="subtitle">
        Con Musity puoi trovare le informazioni in ambito musicale che hai sempre cercato
      </a>
    </header>
    <section id="search">
      <form autocomplete="off">
        <div class="search">
          <label for='search'>Cerca</label>
          <input type='text' name="search" class="searchBar">
          <input type="submit" value="Cerca">
        </div>
      </form>
      
    </section>
    <section class="container">

            <div id="results">
                
            </div>
    </section>
    <footer>
      <nav>
        <div class="footer-container">
          <div class="footer-col">
            <h1>Musity</h1>
          </div>
          <div class="footer-col">
            <strong>AZIENDA</strong>
            <p>Chi siamo</p>
            <p>Lavora con noi</p>
          </div>
          <div class="footer-col">
            <strong>CATEGORIE</strong>
            <p>Artisti</p>
            <p>Canzoni</p>
            <p>Eventi</p>
            <p>Etichette</p>
          </div>
          <div class="footer-col">
            <strong>LINK UTILI</strong>
            <p>Assistenza</p>
            <p>App per cellulare</p>
            <p>Informazioni legali</p>
          </div>
        </div>
      </nav>
    </footer>
  </body>
  </html>