<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{public_path('assets/css/bootstrap3.min.css')}}" /> --}}
    <link rel="stylesheet" href="{{public_path('assets/css/bootstrap3.min.css')}}" />
    <link rel="stylesheet" href="{{public_path('assets/css/atlantis.css')}}" />

    <title>Contrat</title>

    <style>
        @font-face {
            font-family: 'Palatino Linotype';
            src: url("{{public_path('assets/fonts/palatino/palatinolinotype_bold.ttf')}}") format('truetype');
            font-weight: bold;
            font-style: normal;
        }

        @font-face {
            font-family: 'Palatino Linotype';
            src: url("{{public_path('assets/fonts/palatino/palatinolinotype_bolditalic.ttf')}}") format('truetype');
            font-weight: bold;
            font-style: italic;
        }

        @font-face {
            font-family: 'Palatino Linotype';
            src: url("{{public_path('assets/fonts/palatino/palatinolinotype_italic.ttf')}}") format('truetype');
            font-weight: normal;
            font-style: italic;
        }

        @font-face {
            font-family: 'Palatino Linotype';
            src: url("{{asset('public_path/fonts/palatino/palatinolinotype_roman.ttf')}}") format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        .customFontTextHeader {
            font-family: 'Palatino Linotype', serif;
            font-weight: bold;
            font-style: normal;
            color: #000;
            font-size: 19px !important;
        }

        .customFontTextHeader1 {
            font-family: 'Palatino Linotype', serif;
            font-weight: normal;
            font-style: normal;
            color: #000000;
            font-size: 17px !important;
        }

        p, ul li, ol li {
            font-family: 'Palatino Linotype', serif;
            font-weight: normal;
            font-style: normal;
            font-size: 13px !important;
            color: #000000;
            text-align: justify;
        }

        .page-break {
            page-break-after: always;
        }

        /* @page{
            margin: 100px 25px;
            
        } */

        header {
            position: fixed;
            top: 60px;
            left: 0px;
            right: 0px;
            /* text-align: center; */
            line-height: 35px;
        }

        .numbered-item {
            display: table;
            width: 100%;
        }
        .number {
            display: table-cell;
            width: 10px;
            vertical-align: top;
        }
        .text {
            display: table-cell;
            padding-left: 10px;
        }
    </style>
</head>
    <body style="background-color: #ffffff;">
        <div class="container" style="padding-left: 50px; padding-right: 50px;">
            
                {{-- <header>
                    <img src="{{public_path('assets/img/logoSogema.png')}}" style="height: 50px;" alt="Logo SOGEMA" />
                </header> --}}
            

            <div class="row justify-content-center page-break">
                <header>
                    <img src="{{public_path('assets/img/logoSogema.png')}}" style="height: 50px;" alt="Logo SOGEMA" />
                </header>
                <div class="col-12 text-center">
                    <h3 class="invoice-title customFontTextHeader text-uppercase fw-bold" style="font-weight: bold;">
                        GRAND MARCHE CENTRAL DE KINSHASA <br />
                        <div style="height: 0.1rem; width: 410px; padding: 0px; margin-top: 0px;  margin: auto; background-color: #000000;"></div>
                       <span style="margin-top: 5px;">CONTRAT DE BAIL COMMERCIAL</span>
                    </h3>
                </div> 
                
                <div class="col-12">
                    <h3 class="customFontTextHeader1">
                        <strong style="font-weight: bold;">I.</strong>
                        <strong>Désignation des parties.</strong>
                    </h3>

                    <p>
                        Le présent contrat est conclu entre les soussignés :
                    </p>

                    <p>
                        La Société de Gestion des Marchés en Afrique, SOGEMA en sigle, Société à Responsabilité Limitée, dont le siège est situé au n° 63, Avenue Colonel Mondjiba, Concession Texaf, Local 9, à Kinshasa/Gombe, inscrite au RCCM : KNG/RCCM/20-B-01242, ID.NAT : 01-610-N61815, représentée par Monsieur Dieudonné BAKARANI, Gérant dûment habilité à l’effet des présentes, agissant en sa qualité de concessionnaire du Grand Marché Central de Kinshasa en vertu du contrat de concession de service public conclu avec l’Hôtel de Ville de Kinshasa ;
                    </p>

                    <p>
                        Désigné ci-après « <strong style="font-weight: bold;">LE BAILLEUR </strong> »;
                    </p>

                    <p>
                        Et
                    </p>

                    <p>
                        Monsieur <strong>{{strtoupper($vendeur->nom)}} {{strtoupper($vendeur->postnom)}} {{ucfirst($vendeur->prenom)}}</strong>,
                        résidant sur l’avenue no, quartier <strong>{{$vendeur->residence}}</strong> dans la Commune de <strong>{{ucfirst($vendeur->commune)}}</strong> à Kinshasa,
                    </p>

                    <p>
                        Désignée ci-après « <strong style="font-weight: bold;">LE LOCATAIRE</strong> » ;
                    </p>

                    <p>
                        Il est convenu d’un bail professionnel de type commercial, conformément aux dispositions des articles 101 à 134 de l’Acte Uniforme OHADA portant sur le droit commercial général, pour les locaux (magasins) dont la désignation suit.
                    </p>

                    <h3 class="customFontTextHeader1">
                        <strong style="font-weight: bold;">II.</strong>
                        <strong>Objet du contrat.</strong>
                    </h3>

                    <p>Le présent contrat a pour objet la location des magasins ainsi déterminés :</p>
                    <p class="ml-5">
                        <strong>1.</strong> 
                        <span style="border-bottom: 1px solid #000;">Identification des lieux loués</span> <br />
                        <strong style="color: #ffffff">..</strong> <strong><span>Magasins</span></strong> <br />

                        <strong style="color: #ffffff">...</strong>
                        <strong style="color: #ffffff">..</strong>
                        <strong style="color: #ffffff">..</strong>
                        <span>
                            Le(s) lot(s) magasins  n° 
                            @forelse($vendeurDemande as $item) 
                                <strong style="font-weight: bold;">{{$item->emplacementNumeros}}</strong>,
                            @empty
                            @endforelse
                        </span>
                    </p>
                    
                    <p>
                        <strong style="color: #ffffff">...</strong>
                        <strong style="color: #ffffff">..</strong>
                        <strong style="color: #ffffff">..</strong>
                        <span>
                            Situé(s) dans le secteur : 
                            @forelse($vendeurDemande as $item) 
                                <strong style="font-weight: bold;">{{$item->pavillonNumero}} niveau {{$item->pavillonNiveau}}</strong>,
                            @empty
                            @endforelse
                        </span>
                        <br />

                        <strong style="color: #ffffff">...</strong>
                        <strong style="color: #ffffff">..</strong>
                        <strong style="color: #ffffff">..</strong>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td style="font-weight: bold;">Superficie du magasin</td>
                                    <td style="font-weight: bold;">Nombre</td>
                                    <td style="font-weight: bold;">Superficie totale par catégorie</td>
                                </tr>
                                @forelse($vendeurDemande as $place) 
                                <tr>
                                    <td>
                                        @if($place->typeDimension == "12m²")
                                            <strong>3 m x 4 m (catégorie A) ( {{$placeType}} )</strong>
                                        {{-- {{$place->typeDimension}} --}}
                                        @endif
                                        @if($place->typeDimension == "24m²")
                                            <strong>6 m x 4 m (catégorie B)</strong>
                                        @endif
                                        </td>
                                    <td style="text-align: center;">{{$place->placeNumber}}</td>
                                    <td>
                                        @if($place->typeDimension == "12m²")
                                            <strong>{{12 * $place->placeNumber}}m²</strong>
                                        @endif

                                        @if($place->typeDimension == "24m²")
                                            <strong>{{24 * $place->placeNumber}}m²</strong>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </p>

                    <p class="ml-5">
                        <strong>2.</strong> 
                        <span style="border-bottom: 1px solid #000;">Destination des magasins loués</span>
                    </p>

                    <p>
                        Les magasins sont loués pour un usage commercial.
                    </p>

                    <p>
                        Le LOCATAIRE s’engage à exploiter lui-même les magasins loués ou à les mettre en sous-location au profit des tiers sous-locataires commerçants, pour des activités commerciales définies suivant les filières réservées à chaque secteur (axe) du Grand Marché Central, sous réserve d’adjonction d’activités commerciales connexes ou complémentaires à son activité commerciale principale.
                    </p>
                </div>
                
                <div class="col-12">
                    <h3 class="customFontTextHeader1">
                        <strong style="font-weight: bold;">III.</strong>
                        <strong>Date de prise d’effet et durée du contrat.</strong>
                    </h3>

                    <p>La durée du contrat et sa date de prise d’effet sont ainsi définies :</p>                 

                    <div style="padding-left: 25px;">
                        <ol>
                            <li>
                                <p>
                                    Date de prise d’effet du contrat : date de la mise à disposition par le BAILLEUR des magasins loués.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Durée du contrat : le présent contrat a une durée d’un terme minimal renouvelable de trois (3) années entières et consécutives, à compter de la date de prise d’effet. 
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="col-12">
                    <h3 class="customFontTextHeader1">
                        <strong style="font-weight: bold;">IV.</strong>
                        <strong>Conditions financières.</strong>
                    </h3>

                    <p>
                        Les parties conviennent des conditions financières suivantes :
                    </p>
                    <p style="padding-left: 30px;">
                        <strong>1.</strong> 
                        <span style="border-bottom: 1px solid #000;">Le loyer</span> <br />

                        <strong>a).</strong> 
                        <span>Fixation, exigibilité et paiement du loyer :</span> <br />                        
                    </p>

                    <p>
                        Le montant du loyer mensuel est <strong style="font-weight: bold;"> 1000 USD</strong> pour chaque magasin de catégorie A (3m x 4m) et <strong style="font-weight: bold;"> 2000 USD</strong> pour chaque magasin de catégorie B (6m x 4m), hors charges et hors taxes.
                    </p>

                    <p>
                        A la souscription, le paiement initial à la date de prise d’effet du bail pour le loyer du magasin ou de l’ensemble du lot de magasins loués se fait en une fois pour sept (7) mois, comprenant six (6) mois de garantie locative et un (1) mois de loyer anticipatif. 
                    </p>

                    <p>
                        Ledit paiement et les paiements subséquents du loyer mensuel ou au moment du renouvellement de chaque terme de bail sont effectués par virement au compte bancaire du BAILLEUR ci-après :
                    </p>

                    <p>
                        <span>Numéro de compte :00023-20133-02096100201-27</span> <br />
                        <span>Intitulé : SOGEMA LOYER MARCHE CENTRAL</span> <br />
                        <span>IBAN :</span> <br />
                        <span>SWIFT : SFBXCDKI</span> <br />
                        <span>Adresse (domicile) Siège : 4258, avenue Kabasele Tshiamala, Commune de la Gombe, Ville de Kinshasa </span> <br />
                    </p>

                    <p style="padding-left: 30px;">
                        <strong>1.</strong> 
                        <span style="border-bottom: 1px solid #000;">Le loyer</span> <br />

                        <strong>b).</strong> 
                        <span>Modalités d’indexation :</span> <br />                        
                    </p>

                    <p>
                        Le loyer peut être révisé après chaque terme de 3 ans, moyennant notification préalable au LOCATAIRE, en fonction de l’évolution générale des prix de l’immobilier dans la ville de Kinshasa ou des loyers couramment pratiqués dans d’autres espaces commerciaux pour des locaux similaires.
                    </p>

                    <p style="padding-left: 30px;">
                        <strong>2.</strong> 
                        <span style="border-bottom: 1px solid #000;">Autres charges</span> <br />                      
                    </p>

                    <p>
                        Le LOCATAIRE s’oblige à payer, chaque trimestre et de manière anticipative, une provision sur les charges d’électricité, eau, poubelle et entretien) selon les calculs du syndic désigné, suivant le montant du loyer mensuel et des besoins relatifs à chaque magasin loué.
                    </p>

                    <p>
                        Cette provision est payable au compte bancaire du syndic désigné. Elle sera régularisée une fois chaque année en fonction des dépenses réelles de l’exercice précédent.
                    </p>
                </div>

                <div class="col-12">
                    <h3 class="customFontTextHeader1">
                        <strong style="font-weight: bold;">V.</strong>
                        <strong>Garanties.</strong>
                    </h3>

                    <p>
                        A la signature du présent contrat, le LOCATAIRE doit disposer à titre de dépôt de garantie, d’une lettre de garantie bancaire adressée au BAILLEUR, par laquelle la banque du LOCATAIRE certifie la solvabilité de ce dernier et s’engage à verser à la première demande toutes les sommes dues par lui.
                    </p>
                </div>

                <div class="col-12">
                    <h3 class="customFontTextHeader1">
                        <strong style="font-weight: bold;">VI.</strong>
                        <strong>Autres conditions particulières du contrat.</strong>
                    </h3>

                    <p style="padding-left: 30px;">
                        <strong>1.</strong> 
                        <span style="border-bottom: 1px solid #000;">Etat des lieux</span> <br />               
                    </p>

                    <p>
                        Un état des lieux est établi contradictoirement et amiablement par le BAILLEUR et le LOCATAIRE ou par un tiers mandaté par eux et joint au présent contrat de location lors de la prise de possession des locaux par le LOCATAIRE. Le LOCATAIRE est présumé avoir reçu les magasins en bon état de réparations locatives, et doit les rendre tels, usure locative exceptée, sauf la preuve contraire.
                    </p>

                    <p style="padding-left: 30px;">
                        <strong>2.</strong> 
                        <span style="border-bottom: 1px solid #000;">Obligation du BAILLEUR</span> <br />                         
                    </p>

                    <div style="padding-left: 10px;">
                        <ol type="a">
                            <li>
                                Le BAILLEUR s’oblige à remettre au LOCATAIRE les magasins loués en bon état de réparation de toute espèce
                            </li>
                            <li>
                                Il est tenu d’assurer la charge des grosses réparations mentionnées à l’article 106 de l’Acte Uniforme OHADA relatif au droit commercial général ainsi que des autres travaux qui n’incombent pas au LOCATAIRE (notamment celles des gros murs, des voûtes, des poutres, des toitures, des murs de soutènement, des murs de clôture, des fosses septiques et des puisards).
                            </li>
                            <li>
                                Il garantit le LOCATAIRE contre les troubles de jouissance des biens loués, de son fait ou du fait de ses préposés.
                            </li>
                        </ol>
                    </div>

                    <p style="padding-left: 30px;">
                        <strong>3.</strong> 
                        <span style="border-bottom: 1px solid #000;">Obligations du LOCATAIRE</span> <br />                         
                    </p>

                    <div style="padding-left: 10px;">
                        <ol type="a">
                            <li>
                                Le LOCATAIRE s’oblige à payer le loyer et s’acquitter des charges financières liées au bail
                            </li>
                            <li>
                                Il s’engage à entretenir les lieux loués en bon état de réparations locatives et d’entretien et supportera toutes les réparations locatives qui pourraient être nécessaires pendant toute la durée de son bail, exception faite des grosses réparations qui incombent au BAILLEUR.
                            </li>                         
                            <li>
                                Le LOCATAIRE ne fera supporter aux planchers aucune surcharge et, en cas de doute, s’assurera du poids autorisé auprès de l’architecte de l’immeuble. Toutes installations extérieures (marquises, auvents, stores, enseignes, etc.) ne pourront être réalisées qu’après avoir obtenu les autorisations administratives nécessaires et celles écrites du responsable de l’immeuble et du BAILLEUR.
                            </li>
                            <li>
                                Le LOCATAIRE autorise le BAILLEUR ou son architecte à visiter les lieux loués toutes les fois que cela lui paraîtra utile moyennant un préavis de 3 jours minimum donné par écrit avec accusé de réception ou autre moyen électronique probant (e-mail, message whatsapp, etc.) et à laisser l’accès pour tous travaux et réparations nécessaires sans pour autant prétendre à une indemnité ou à une diminution du loyer.
                            </li>
                            <li>
                                Le LOCATAIRE donnera accès et laissera visiter les locaux durant les six mois qui précéderont son départ, le BAILLEUR pouvant apposer durant cette période, tous panneaux publicitaires à l’emplacement de son choix à l’effet d’une nouvelle location.
                            </li>
                            <li>
                                Le LOCATAIRE ne pourra entreprendre aucune transformation des lieux loués sans le consentement écrit du BAILLEUR. Tout embellissement ou amélioration restera la propriété du BAILLEUR, à moins que celui-ci ne préfère la remise des lieux dans leur état primitif, aux frais du LOCATAIRE.
                            </li>
                            <li>
                                Le LOCATAIRE s’oblige à souscrire l’assurance dès la prise de possession des locaux et pendant toute la durée de son bail contre tous risques locatifs habituels et tous ceux qui pourraient naître de son activité, à une société d’assurance notoirement solvable. Il devra pouvoir justifier à la moindre requête du BAILLEUR, de l’existence des polices d’assurance citées ci-dessus et de l’acquittement des primes correspondantes. Dans le cas où l’activité exercée par le LOCATAIRE entraînerait pour le BAILLEUR ou pour les voisins ou colocataires, des surprimes d’assurances, le LOCATAIRE devra rembourser aux intéressés le montant de ces primes.
                            </li>
                            <li>
                                Le LOCATAIRE renonce à tous recours en responsabilité ou réclamation contre le BAILLEUR, ses mandataires, et leurs assureurs pour les cas suivants : (i) en cas de vol, tentative de vol, de tout acte délictueux ou de toute voie de fait dont le LOCATAIRE pourrait être victime dans les locaux, le BAILLEUR n’assumant aucune obligation de surveillance ; (ii) en cas d’agissements générateurs de dommages des autres occupants de l’immeuble et de tous tiers en général ; (iii) en cas d’accidents survenant dans les locaux ou du fait des locaux, quelle qu’en soit l’origine. Il prendra ainsi à sa charge entière toute responsabilité civile en résultant à l’égard soit de son personnel, soit du BAILLEUR, soit des tiers, sans que le BAILLEUR puisse être inquiété ou recherché pour cela.
                            </li>
                            <li>

                            </li>
                        </ol>
                    </div>

                    <p style="padding-left: 30px;">
                        <strong>4.</strong> 
                        <span style="border-bottom: 1px solid #000;">Cession-Sous-location</span> <br />                         
                    </p>

                    <p>
                        Le LOCATAIRE peut céder les magasins loués aux sous-locataires commerçants de son choix, moyennant l’obligation pour lui de porter à la connaissance du BAILLEUR, dans le mois de la sous-location, l’identité complète du (des) sous-locataire(s) avec, le cas échéant, leur adresse (siège) et numéro RCCM.
                    </p>
                    <p>
                        Le LOCATAIRE demeure garant de tous ses sous-locataires et il répond solidairement avec eux et tous les occupants successifs, des dommages causés aux magasins loués, conformément au droit commun.
                    </p>
                    <p>
                        La sous-location n’exempte aucune obligation du LOCATAIRE face au BAILLEUR dans le cadre du présent contrat.
                    </p>

                    <p style="padding-left: 30px;">
                        <strong>5.</strong> 
                        <span style="border-bottom: 1px solid #000;">Charges urbaines et de police</span> <br />                         
                    </p>

                    <p>
                        Le LOCATAIRE doit satisfaire à toutes les charges de la ville et de police dont les locataires sont ordinairement tenus et acquitter les contributions et taxes personnelles de toute nature, relative à ses activités commerciales, de manière que le BAILLEUR ne soit jamais inquiété ni recherché à ce sujet.
                    </p>

                    <p style="padding-left: 30px;">
                        <strong>6.</strong> 
                        <span style="border-bottom: 1px solid #000;">Destruction des lieux loués</span> <br />                         
                    </p>

                    <p>
                        Si les lieux loués viennent à être détruits en totalité par un événement indépendant du fait des parties, le présent bail sera résilié de plein droit, sans indemnité, moyennant restitution du montant des loyers restant à courir jusqu’à l’échéance du terme contractuel.
                    </p>

                    <p>
                        Par contre, en cas de destruction totale ou partielle des magasins  loués due à la faute d’une des parties, le présent bail pourra être résilié à la demande de l’autre partie, sans préjudice du recours de la partie victime contre celle à la faute de qui la destruction serait imputable.
                    </p>

                    <p style="padding-left: 30px;">
                        <strong>7.</strong> 
                        <span style="border-bottom: 1px solid #000;">Congé-Renouvellement</span> <br />                         
                    </p>

                    <p>
                        Le présent contrat étant à durée déterminée, à l’expiration de chaque période de 3 ans de bail, le LOCATAIRE a la faculté de prévenir le BAILLEUR au moins 3 mois à l’avance, de son intention d’obtenir le renouvellement de son contrat, par acte extra-judiciaire ou par lettre au porteur avec demande d’avis de réception, sans quoi, il sera déchu de son droit de renouvellement du bail.
                    </p>
                    
                    <p style="padding-left: 30px;">
                        <strong>8.</strong> 
                        <span style="border-bottom: 1px solid #000;">Résiliation</span> <br />                         
                    </p>

                    <p>
                        Chaque partie peut demander la résiliation du présent contrat, en cas d’inexécution constatée d’une des clauses du présent bail par l’autre partie, dans les conditions de l’article 133 de l’Acte Uniforme OHADA portant sur le droit commercial général.
                    </p>

                    <p>
                        En cas de non-respect des obligations financières du LOCATAIRE, le BAILLEUR peut résilier de plein droit le présent bail un mois après une simple sommation d’exécuter ou un commandement de payer resté infructueux, et ce, même dans le cas de paiement ou d’exécution postérieurs à l’expiration du délai ci-dessus.
                    </p>

                    <p style="padding-left: 30px;">
                        <strong>9.</strong> 
                        <span style="border-bottom: 1px solid #000;">Avenant </span> <br />                         
                    </p>

                    <p>
                        Tout amendement aux dispositions du présent contrat sera constaté par écrit ; signé par les parties et annexé sous forme d’avenant au présent contrat avec lequel il formera un tout complet.
                    </p>

                    <p style="padding-left: 30px;">
                        <strong>10.</strong> 
                        <span style="border-bottom: 1px solid #000;">Résolution des différends-Droit applicable</span> <br />                         
                    </p>
                    <p>
                        Pour toute contestation relative à l’interprétation ou à l’exécution du présent contrat qui ne serait pas résolue par la voie amiable, les tribunaux de Kinshasa sont compétents et ils statueront en application du droit positif congolais.
                    </p>

                    <p style="padding-left: 30px;">
                        <strong>11.</strong> 
                        <span style="border-bottom: 1px solid #000;">Élection de domicile </span> <br />                         
                    </p>

                    <p>
                        Pour l’exécution des présentes, les parties font élection de domicile:
                    </p>

                    <div style="padding-left: 10px;">
                        <ul  style="list-style-type: square;">
                            <li>Le BAILLEUR : à l’adresse indiquée dans le présent contrat de bail ;</li>
                            <li>
                                Le LOCATAIRE : dans les lieux loués.
                            </li>
                        </ul>
                    </div>

                    <p style="padding-left: 30px;">
                        <strong>12.</strong> 
                        <span style="border-bottom: 1px solid #000;">Capacité-Solidarité</span> <br />                         
                    </p>
                    <p>
                        Les personnes ci-dessus identifiées déclarent avoir toute capacité à signer le présent bail.
                    </p>

                    <p>
                        En cas de décès de l’une des parties, personne physique, il y aura solidarité entre les héritiers ou représentants pour l’exécution des conditions du présent bail, sans préjudice des dispositions de l’article 111 de l’Acte Uniforme OHADA portant sur le droit commercial général.
                    </p>

                </div>

                <div class="col-12">
                    <h3 class="customFontTextHeader1">
                        <strong style="font-weight: bold;">VII.</strong>
                        <strong>Annexes.</strong>
                    </h3>

                    <p>
                        Les documents suivants sont annexés au présent contrat et sont réputés en faire partie intégrante :
                    </p>

                    <div style="padding-left: 10px;">
                        <ul  style="list-style-type: none;">
                            <li>- L’état des lieux des magasins loués ;</li>
                            <li>
                                - Le cas échéant, le règlement du syndic du Grand Marché Central.
                            </li>
                        </ul>
                    </div> 
                    
                    <br/>
                    
                    <p>
                        Fait à Kinshasa, le………..…………………………. en 2 (deux) exemplaires originaux.
                    </p>

                    <p>
                        <span>Noms et signature du Locataire</span> 
                        <span style="background-color: #ffffff; color: #ffffff;">.........................................................</span>
                        <span>Noms et signature du Bailleur</span>
                    </p>
                    <p>
                        <span><strong>{{strtoupper($vendeur->nom)}} {{strtoupper($vendeur->postnom)}} {{ucfirst($vendeur->prenom)}}</strong></span>  
                        <span style="background-color: #ffffff; color: #ffffff;">.......................................................</span>
                        <span><strong>Dieudonné BAKARANI</strong></span>  
                    </p>
                    <p style="margin-top: 30px;">
                        <img src="data:image/svg+xml;base64,{{ $qrcode }}" alt="QR Code">
                    </p>
                </div>                
            </div>

            {{-- <div class="row justify-content-center">
                <header>
                    <img src="{{public_path('assets/img/logoSogema.png')}}" style="height: 50px;" alt="Logo SOGEMA" />
                </header>
                <section>sddd</section>
            </div> --}}
        </div>
    </body>
</html>