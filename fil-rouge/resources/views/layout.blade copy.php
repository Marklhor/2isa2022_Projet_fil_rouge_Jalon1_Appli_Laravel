<!DOCTYPE html>
<html lang="fr">

<head>
    @include('templates.metas')
    @include('templates.links')
    @vite('resources/js/app.js')
    <title>{{ $title_head }}</title>
</head>

<body>
    <header>
        @include('templates.nav_title')
        @include('templates.menu')
    </header>
    <div id="flex_part">

        <main>
            <article class="table_fix_head">
                <table class="container">
                    <caption class="fixed">TOUS LES INCIDENTS</caption>
                    <thead class="fixed">
                        <th>
                            <span class="mobil_text">n°</span>
                            <span class="desk_text">Référence</span>
                        </th>
                        <th>Sujet</th>
                        <th>
                            <span class="mobil_text">Panne</span>
                            <span class="desk_text">Type de panne</span>
                        </th>
                        <th>Auteur</th>
                        <th>
                            <span class="mobil_text">Avcmt</span>
                            <span class="desk_text">Avancement</span>
                        </th>
                        <th>Date de création</th>
                        <th>Date de mise-à-jour</th>
                        <th>
                            <span class="mobil_text">msg</span>
                            <span class="desk_text">nombre de message</span>
                        </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>07424</td>
                            <td>Mon pc ne s'allume plus</td>
                            <td>Matériel</td>
                            <td>BERNARD LAVILLIERS</td>
                            <td>27j <sub><img class="icon_advance" src="/img/orange.svg" alt=""></sub></td>
                            <td>13/04/2023</td>
                            <td>10/05/2023</td>
                            <td>8</td>
                        </tr>
                        <tr>
                            <td>93655</td>
                            <td>Mon pc ne s'allume plus</td>
                            <td>Matériel</td>
                            <td>MICHEL BERGER</td>
                            <td>24j <sub><img class="icon_advance" src="/img/yellow.svg" alt=""></sub></td>
                            <td>18/04/2023</td>
                            <td></td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>80063</td>
                            <td>Mon pc ne s'allume plus</td>
                            <td>Matériel</td>
                            <td>ALAIN BASHUNG</td>
                            <td>7j <sub><img class="icon_advance" src="/img/green.svg" alt=""></sub></td>
                            <td>25/04/2023</td>
                            <td>02/05/2023</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>07424</td>
                            <td>Mon pc ne s'allume plus</td>
                            <td>Matériel</td>
                            <td>BERNARD LAVILLIERS</td>
                            <td>27j <sub><img class="icon_advance" src="/img/orange.svg" alt=""></sub></td>
                            <td>13/04/2023</td>
                            <td>10/05/2023</td>
                            <td>8</td>
                        </tr>
                        <tr>
                            <td>93655</td>
                            <td>Mon pc ne s'allume plus</td>
                            <td>Matériel</td>
                            <td>MICHEL BERGER</td>
                            <td>27j <sub><img class="icon_advance" src="/img/yellow.svg" alt=""></sub></td>
                            <td>18/04/2023</td>
                            <td></td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>80063</td>
                            <td>Mon pc ne s'allume plus</td>
                            <td>Matériel</td>
                            <td>ALAIN BASHUNG</td>
                            <td>27j <sub><img class="icon_advance" src="/img/green.svg" alt=""></sub></td>
                            <td>25/04/2023</td>
                            <td>02/05/2023</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>07424</td>
                            <td>Mon pc ne s'allume plus</td>
                            <td>Matériel</td>
                            <td>BERNARD LAVILLIERS</td>
                            <td>27j <sub><img class="icon_advance" src="/img/orange.svg" alt=""></sub></td>
                            <td>13/04/2023</td>
                            <td>10/05/2023</td>
                            <td>8</td>
                        </tr>
                        <tr>
                            <td>93655</td>
                            <td>Mon pc ne s'allume plus</td>
                            <td>Matériel</td>
                            <td>MICHEL BERGER</td>
                            <td>27j <sub><img class="icon_advance" src="/img/yellow.svg" alt=""></sub></td>
                            <td>18/04/2023</td>
                            <td></td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>80063</td>
                            <td>Mon pc ne s'allume plus</td>
                            <td>Matériel</td>
                            <td>ALAIN BASHUNG</td>
                            <td>27j <sub><img class="icon_advance" src="/img/green.svg" alt=""></sub></td>
                            <td>25/04/2023</td>
                            <td>02/05/2023</td>
                            <td>4</td>
                        </tr>
                    </tbody>
                </table>
            </article>
            <div>
                <?php
                    if(DB::connection()->getPdo()){
                        echo"connexion avec BDD OK =>" . DB::connection()->getDatabaseName();
                    }
                ?>
            </div>
        </main>

        <footer>
            @include('templates.footer')
        </footer>
    </div>
</body>

</html>