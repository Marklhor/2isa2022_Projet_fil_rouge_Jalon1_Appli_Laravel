<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/style.css') }}">
    <title>Elements du site</title>
   
</head>

<body>
    <header>
        <nav class="nav">
        </nav>
    </header>
    <div id="flex_part">
        <main>
            <hgroup>
                <h1 class="text_center">SERVICE INFORMATIQUE</h1>
                <h2 class="text_center">GESTION DES INCIDENTS</h2>
            </hgroup>
            <article>
                <form action="">
                    <fieldset>
                        <legend>Connectez-vous</legend>
                        <label for="email" class="hidden">Entrer votre email:</label>
                        <input class="input bt_value" type="email" id="email" name="email" value="email" required>
                        <label for="mdp" class="hidden">Entrer votre mot-de-passe</label>
                        <input class="input  bt_value" type="password" id="mdp" name="mdp"
                            placeholder="Entrer votre mot-de-passe" required>
                        <button class="input bt_ok pointer" name="button">Se connecter</button>
                        <div>
                            <input class="pointer" type="checkbox" id="scales" name="scales" checked>
                            <label for="scales">Se souvenir de moi ?</label>
                        </div>
                        <button class="input bt_nok pointer" name="button">Mot-de-passe oublier ?</button>
                    </fieldset>
                </form>
            </article>
        </main>
        <footer>
            <div>
                <img class="icon_amio" src="/img/2isa_white.webp" alt="AMIO">
            </div>
            <address>
                <p>01.65.61.42.42</p>
                <p>service.it@2isa.fr</p>
                <p><a href="https://amio-millau.fr/">amio-millau.fr</a></p>
            </address>
            <div>
                <dl>
                    <dt>
                        <H3 class="titleH3">Contact</H3>
                    </dt>
                    <dd>AMIO - Service IT</dd>
                    <dd>24 avenue de la Rythmique</dd>
                    <dd>75013 Paris Cedex 12</dd>
                </dl>
            </div>
        </footer>
    </div>
</body>

</html>