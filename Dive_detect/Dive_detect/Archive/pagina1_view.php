<!doctype html>
<html lang="nl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pagina 1</title>
    <link rel="stylesheet" href="pagina1.css" />
  </head>
  <body>
    <main class="screen">
      <button class="icon back" type="button" aria-label="Terug">&#8592;</button>

      <section class="content">
        <div class="circle"></div>
        <button class="card" id="cardBtn" type="button" aria-label="Kaart">
          <span></span><span></span><span></span><span></span>
        </button>
      </section>

      <footer class="bottom">
        <button class="icon left" type="button" aria-label="Vorige">&#8592;</button>
        <div class="dots">
          <button class="dot active" type="button" aria-label="Pagina 1"></button>
          <a class="dot link" href="pagina2.html" aria-label="Ga naar pagina 2"></a>
        </div>
        <a class="icon right link" href="pagina2.html" aria-label="Volgende">&#8594;</a>
      </footer>
    </main>

    <script src="pagina1.js"></script>
  </body>
</html>
