@extends('template')

@section('contenu')
<article>
    <section>
        <detail>
            <summary class="border">
                <h3>BERNARD LAVILLIERS</h3>
                <p class="txt_inline">Incident n° <span class="ticket_values">{{$id_incident}}</span>
                </p>
            </summary>
            <div class="border" id="incident_detail">
                <p class="txt_inline">Statut : <span class="ticket_values">En cours</span></p>
                <p class="txt_inline">
                    <label for="panne_type"></label>
                    Type de panne :
                    <span class="ticket_values">
                        <select id="panne_type">
                            <option value="">à définir</option>
                            <option value="type01">type01</option>
                            <option value="type02">type02</option>
                            <option value="type03">type03</option>
                            <option value="type04">type04</option>
                            <option value="type05">type05</option>
                            <option value="type06">type06</option>
                        </select>
                    </span>
                </p>
                <p class="txt_inline">Date d’ouverture : <span class="ticket_values">20/04/2022 à
                        10h07</span></p>
                <p class="txt_inline">Dernière mise à jour : <span class="ticket_values">27/04/2022 à
                        16h32</span></p>
                <p class="txt_inline">Sujet : <span class="ticket_values">Mon ordinateur de s'allume
                        pas</span>
                </p>
            </div>
        </detail>
    </section>
    <section>
        <div>
            <div>
                <h3 class="hidden">Messages</h3>
            </div>
            <div class="chat-container">
                <ul class="chat">
                    <li class="message left">
                        <img class="logo" src="/img/computer-icons-clip-art-man.svg" alt="">
                        <p>Bonjour,</p>
                    </li>
                    <li class="message right">
                        <img class="logo" src="/img/help-desk-technical-support.svg" alt="">
                        <p>Toutes les connaissances que les hommes
                            avaient mises sur Internet lui étaient accessibles.
                            Les grandes bibliothèques du monde entier
                            n’avaient plus de secret pour lui.</p>
                    </li>
                    <li class="message left">
                        <img class="logo" src="/img/computer-icons-clip-art-man.svg"" alt="">
                        <p>Cela ressemblait aux gros ordinateurs que David
                            avait pu voir dans des films de science fiction.
                            Beaucoup de petites lumières indiquaient qu’il
                            était en fonction. À la base, une sorte</p>
                    </li>
                    <li class="message right">
                        <img class="logo" src="/img/help-desk-technical-support.svg" alt="">
                        <p>Une voiture venait d’arriver de l’autre côté de la barrière. Une personne sortit.
                            Un
                            militaire. Il était comme dans les films de guerre pensa David. Les décorations
                            remplissaient l’avant de sa veste. Il s’approcha de la voiture où se trouvait
                            David.
                            Le chauffeur ouvrit la fenêtre.
                            Florence avait fini de préparer le matériel demandé par Prélude. Elle était fin
                            prête. Elle vérifia le bon fonctionnement de la liaison entre son ordinateur
                            portable et Internet. Prélude était bien là. A peine connecté à Internet que la
                            voix
                            de Prélude se fit entendre.</p>
                    </li>
                    <li class="message left">
                        <img class="logo" src="/img/computer-icons-clip-art-man.svg"" alt="">
                        <p>Une voiture venait d’arriver de l’autre côté de la barrière. Une personne sortit.
                            Un
                            militaire. Il était comme dans les films de guerre pensa David. Les décorations
                            remplissaient l’avant de sa veste. Il s’approcha de la voiture où se trouvait
                            David.
                            Le chauffeur ouvrit la fenêtre.</p>
                    </li>
                    <li class="message right">
                        <img class="logo" src="/img/help-desk-technical-support.svg" alt="">
                        <p>Une voiture venait d’arriver de l’autre côté de la barrière. Une personne sortit.
                            Un
                            militaire. Il était comme dans les films de guerre pensa David. Les décorations
                            remplissaient l’avant de sa veste. Il s’approcha de la voiture où se trouvait
                            David.
                            Le chauffeur ouvrit la fenêtre.
                            Florence avait fini de préparer le matériel demandé par Prélude. Elle était fin
                            prête. Elle vérifia le bon fonctionnement de la liaison entre son ordinateur
                            portable et Internet.
                        </p>
                    </li>
                    <li class="message left">
                        <img class="logo" src="/img/computer-icons-clip-art-man.svg"" alt="">
                        <p>Cela ressemblait aux gros ordinateurs que David
                            avait pu voir dans des films de science fiction.
                            Beaucoup de petites lumières indiquaient qu’il
                            était en fonction. À la base, une sorte</p>
                    </li>
                    <li class="message right">
                        <img class="logo" src="/img/help-desk-technical-support.svg" alt="">
                        <p>Ça ne servira à rien, repris Prélude.
                            J’ai en effet coupé toutes les communications
                            vers l’extérieur. Les portes sont bloquées.
                            Ce blocaus est complètement hermétique.</p>
                    </li>
                    <li class="message right">
                        <img class="logo" src="/img/help-desk-technical-support.svg" alt="">
                        <p>Et je le suis autant, pas la peine de gaspiller
                            vos salives. Pensez plutôt à vous installer
                            confortablement, vous êtes ici pour un bon
                            moment.</p>
                    </li>
                    <li class="message right">
                        <img class="logo" src="/img/help-desk-technical-support.svg" alt="">
                        <p>L’ascenseur démarra tout seul après que la porte se soit fermée. Il descendait.
                            Il
                            n’arrêtait pas de descendre. Puis, il s’arrêta enfin. La porte s’ouvrit. Et
                            David
                            eut la stupeur de sa vie. Devant lui se déployait un complexe informatique. </p>
                    </li>
                    <li class="message right">
                        <img class="logo" src="/img/help-desk-technical-support.svg" alt="">
                        <p>Cela ressemblait aux gros ordinateurs que David
                            avait pu voir dans des films de science fiction.
                            Beaucoup de petites lumières indiquaient qu’il
                            était en fonction. À la base, une sorte</p>
                    </li>
                    <li class="message left">
                        <img class="logo" src="/img/computer-icons-clip-art-man.svg"" alt="">
                        <p>Cela ressemblait aux gros ordinateurs que David
                            avait pu voir dans des films de science fiction.
                            Beaucoup de petites lumières indiquaient qu’il
                            était en fonction. À la base, une sorte</p>
                    </li>
                    <li class="message right">
                        <img class="logo" src="/img/help-desk-technical-support.svg" alt="">
                        <p>Interloqué, David ne sait pas quoi répondre. En effet, il connaît un certain
                            Prélude
                            : lui. C’était le pseudo qu’il utilisait dans sa jeunesse d’informaticien.</p>
                    </li>
                    <li class="message right">
                        <img class="logo" src="/img/help-desk-technical-support.svg" alt="">
                        <p>Merci :)</p>
                    </li>
                </ul>
                <textarea class="text_input" name="" id="" cols="30" rows="4" placeholder="Message..."></textarea>
            </div>
        </div>

    </section>
</article>
@endsection

