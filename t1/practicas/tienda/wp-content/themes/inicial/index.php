<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema creado para wordpress</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/style.css">
</head>

<body>
    <header class="cabecera">
        <h1>Tema para wordpress</h1>
        <nav>
        <ul>
            <li><a href="/tienda">Home</a></li>
            <li><a href="/tienda/pagina-ejemplo-1/">Página 1</a></li>
            <li><a href="/tienda/pagina-ejemplo-2/">Página 2</a></li>
            <li><a href="/tienda/pagina-ejemplo-3/">Página 3</a></li>
        </ul>
        </nav>
        
    </header>
    <div class="container">
        
        <hr>
        <main>

            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
            ?>
                    <div class="entradas">
                        <h1><?= the_title(); ?></h1>
                        <div><?= the_content(); ?></div>
                    </div>
            <?php
                }
            }
            ?>


        </main>
        <footer class="pie">
            @Mi tema 2020 by <a href="https://pablo-daw.github.io/" target="_blank">Pablo Sanz Raso</a>
        </footer>
    </div>
</body>

</html>