@extends('layout.main')
@section('title', 'Liste des utilisateurs')
@section('styles')
<style>
    .select2-container--default .select2-selection--single {
        height: 40px !important;
        /* width: 100% !important; */
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 40px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 40px !important;
        /* width: 100% !important; */
    }
</style>
@endsection
@section('content')
<div class="row pl-5 pr-5 mt-3">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card mt-2">
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-sm-12">
                        <h5 style="font-weight: bold;" style="text-transform: uppercase">Création d'un nouveau dossier</h5>
                    </div>
                </div>
                <form id="formSend" action="{{route('vend.storeNouveauDossierAjax')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="vendeur_id" value="{{ $vendeur->id }}" />
                    <div class="form-rowM mt-4">
                        <div id="removeRow0" class="row mt-3">
                            <div class="col-sm-4">
                                <div class="d-flex flex-row justify-content-between">
                                    <h4>
                                        Secteur d'activité<span class="isRequired">*</span>
                                    </h4>
                                    <input type="hidden" name="inputarticleQuantite0" id="inputarticleQuantite0" value="0" />                                      
                                </div>
                                <select name="article0" id="articleId0" onchange="getEmplacementByIdArticle('0')" class="form-control selected2">
                                    <option value="">--Choisir--</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                {{-- <h4>Place <span class="isRequired">*</span></h4> --}}
                                <div class="d-flex flex-row justify-content-between">
                                    <h4>
                                        Place <span class="isRequired">*</span>
                                    </h4>
                                    <h4 id="placePrix0">                                            
                                    </h4>  
                                    <input type="hidden" name="placePrixInput0" id="placePrixInput0" value="0" />                                      
                                </div>
                                <select name="place0" id="place0" onchange="getPrixPlace('0');" disabled class="form-control selected2M">
                                    <option value="">--Choisir--</option>                                        
                                </select>
                                <div class="text-center border" id="placeLoaderImg0" style="display: none;">
                                    <img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..." style="height: 40px;" />
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <h4>Quantité
                                    {{-- <span id="quantiteDispo0" style="background-color: #ffffff; color: #1D6FB8; font-weight: bold;"></span> --}}
                                </h4>
                                <input type="number" name="quantite0" id="quantite0" onchange="getQuantitePlace('0');" disabled onkeyup="getQuantitePlace('0');" min="1" max="" value="0" class="form-control" />
                                <h6 id="quantiteStock0" style="background-color: #ffffff; color: #1D6FB8; font-weight: bold; display: none;">Stock dispo <span id="quantiteDispo0"></span></h6>
                            </div>
                            <div class="col-sm-1" style="padding-left: 0px !important; padding-right: 0px !important;">
                                <h4>Mois</h4>
                                <input type="number" name="mois0" id="mois0" onchange="getQuantitePlace('0');" onkeyup="getQuantitePlace('0');" value="7" min="7" class="form-control" placeholder="Mois" />
                            </div>
                            <div class="col-sm-1">
                                <h4>Total</h4>
                                <h2 id="printPrix0" style="font-size: 14px;"></h2>
                                <input type="hidden" name="totalInput0" id="totalInput0" value="0" />
                            </div>
                        </div>

                        <div id="addRowSelect" class="rowM"></div>
                    </div>

                    <h1 class="mt-4">
                        <Button  id="btnAddRowSelect" type="button" class="btn bg_background text-white" style="font-weight: bold;">Ajouter une activité</Button>
                    </h1>
                    <div class="row pb-4">
                        <div class="button-row d-flex mt-4 col-12">
                            {{-- <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Précédant</button> --}}
                            {{-- <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Suivant</button> --}}
                            <button id="btnSend" class="btn btn-successM btn-primary ml-auto" type="submit" title="Send">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('assets/js/axios.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>
<script>
    $(document).ready(function() {
        let couterNbr = 1;
        $('#btnAddRowSelect').click(function() {
            let couterNbrAdd = couterNbr++;
            
            $('#addRowSelect').append(`
                <div id="removeRow${couterNbrAdd}" class="row mt-3">
                    <div class="col-sm-4">
                        <h4>Article <span class="isRequired">*</span></h4>
                        <select name="article${couterNbrAdd}" id="articleId${couterNbrAdd}" onchange="getEmplacementByIdArticle('${couterNbrAdd}')" class="form-control selected2">
                            <option value="">--Choisir--</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <div class="d-flex flex-row justify-content-between">
                            <h4>
                                Place <span class="isRequired">*</span>
                            </h4>
                            <h4 id="placePrix${couterNbrAdd}">                                            
                            </h4>
                            <input type="hidden" name="placePrixInput${couterNbrAdd}" id="placePrixInput${couterNbrAdd}" value="0" />
                        </div>
                        <select name="place${couterNbrAdd}" id="place${couterNbrAdd}" onchange="getPrixPlace('${couterNbrAdd}');" disabled class="form-control">
                            <option value="">--Choisir--</option>
                        </select>
                        <div class="text-center border" id="placeLoaderImg${couterNbrAdd}" style="display: none;">
                            <img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..." style="height: 40px;" />
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <h4>Quantité</h4>
                        <input type="number" name="quantite${couterNbrAdd}" id="quantite${couterNbrAdd}" onchange="getQuantitePlace('${couterNbrAdd}');" onkeyup="getQuantitePlace('${couterNbrAdd}');" min="1" max="" value="0" disabled class="form-control" />
                        <h6 id="quantiteStock${couterNbrAdd}" style="background-color: #ffffff; color: #1D6FB8; font-weight: bold; display: none;">Stock dispo <span id="quantiteDispo${couterNbrAdd}"></span></h6>
                    </div>
                    <div class="col-sm-1" style="padding-left: 0px !important; padding-right: 0px !important;">
                        <h4>Mois</h4>
                        <input type="number" name="mois${couterNbrAdd}" id="mois${couterNbrAdd}" onchange="getQuantitePlace('${couterNbrAdd}');" onkeyup="getQuantitePlace('${couterNbrAdd}');" value="7" min="7" class="form-control" placeholder="Mois" />
                    </div>
                    <div class="col-sm-1">
                        <h4>Total</h4>
                        <h2 id="printPrix${couterNbrAdd}" style="font-size: 14px;"></h2>
                        <input type="hidden" name="totalInput${couterNbrAdd}" id="totalInput${couterNbrAdd}" value="0" />
                    </div>
                    
                    <div class="col-sm-1">
                        <h4 style="color: transparent;">-</h4>
                        <button type="button" class="btn bg_background text-white" onclick="removeRow(${couterNbrAdd});">X</button>
                    </div>
                </div>
            `);
            getListeArticles(`${couterNbrAdd}`);
            $('#articleId'+`${couterNbrAdd}`).select2();
            if(couterNbrAdd == "10"){
                console.log('Nbr = '+ couterNbrAdd)
                document.getElementById('btnAddRowSelect').setAttribute("disabled", true);                
                document.getElementById('btnAddRowSelect').innerHTML = "Vous avez atteint le nombre limité pour cette page";                
            }
        });
        $('.selected2').select2();
    });

    function removeRow(idVal){
        document.getElementById('removeRow'+idVal).remove();
    }

    getListeArticles(idInput=0);
    function getListeArticles(idInput){
        axios.get("{{route('getAllArticles')}}")
        .then(function(response) {
            let produits = response.data;
            //console.log(produits);
            var options = "";
            document.getElementById('articleId'+idInput).innerHTML = '<option value="">--Choisir--</option>';
            let typeArticle;
            for (let i in produits) {
                //options+= '<option value="'+ niveaux[i].id +'">'+niveaux[i].libelle+'</option> '
                options = document.createElement('option');
                options.value = `${produits[i].id}`;
                options.innerHTML += `${produits[i].nom}`;
                document.getElementById('articleId'+idInput).appendChild(options);                
            }   
            //console.log(produits)       
        }).catch(function(error) {
            alert(error);
            //console.log(error);
        });
    };

    //getPrixPlace(idInput=0);
    function getPrixPlace(idPlace){ //place.getPrixById
        let getValueSelectId = document.getElementById('place'+idPlace).value;
        let quantiteDispoSpane = document.getElementById('quantiteDispo'+idPlace);
        axios.get("{{route('place.getPrixById')}}",{
            params: {
                idPlace: getValueSelectId
            }
        })
        .then(function(response) {
            let produits = response.data;

            let countEmplacementByPlace = produits.emplacements.length;
                quantiteDispoSpane.innerHTML = "(" + countEmplacementByPlace + ")";

            document.getElementById('quantite'+idPlace).removeAttribute("disabled");
            document.getElementById('quantite'+idPlace).value = '0';
            document.getElementById('quantite'+idPlace).setAttribute("max", countEmplacementByPlace);

            let prixPlace;
            produits.prix === null ? prixPlace=0 : prixPlace = produits.prix ; 
            document.getElementById('placePrix'+idPlace).innerHTML = prixPlace +" $";  
            document.getElementById('placePrixInput'+idPlace).value = prixPlace;  
            let quantite = document.getElementById('quantite'+idPlace).value;   
            document.getElementById('printPrix'+idPlace).innerHTML = '0';               
            document.getElementById('printPrix'+idPlace).innerHTML = (prixPlace * quantite) +" $";  
            //console.log(countEmplacementByPlace);                
        }).catch(function(error) {
            alert(error);
            //console.log(error);
        });
    }

    function getQuantitePlace(idPlace){
        let quantite = document.getElementById('quantite'+idPlace).value;  //placePrix0     
        let placePrixInput = Number(document.getElementById('placePrixInput'+idPlace).value);   
        let mois = document.getElementById('mois'+idPlace).value;          
        //let total = quantite * placePrixInput;
        let total = (placePrixInput * mois) * quantite;
        document.getElementById('printPrix'+idPlace).innerHTML = total +" $";
        document.getElementById('totalInput'+idPlace).value = total;
        //console.log(total)
    }

    function getEmplacementByIdArticle(idSecteurActivite) {
        let secteurActiviteId = document.getElementById('articleId'+idSecteurActivite).value;
        document.getElementById('placeLoaderImg'+idSecteurActivite).style.display = "block";
        document.getElementById('place'+idSecteurActivite).style.display = "none";
        let quantiteInput = document.getElementById('quantite'+idSecteurActivite);

        axios.get("{{route('getEmplacementByIdArticle')}}",{
            params : {
				secteurActiviteId
			}
        })
        .then(function(response) {
            let reponse = response.data;   
            let countEmplacement = reponse.emplacements.length;
            
            console.log(reponse);
            document.getElementById('place'+idSecteurActivite).style.display = "block";
            if(countEmplacement > 0){
                document.getElementById('place'+idSecteurActivite).removeAttribute("disabled");
                //quantiteInput.removeAttribute("disabled");
                //console.log(reponse.places);
                document.getElementById('place'+idSecteurActivite).innerHTML = '';
                document.getElementById('place'+idSecteurActivite).innerHTML = '<option value="">--Choisir--</option>';
                for (let i in reponse.places) {
                    options = document.createElement('option');
                    options.value = `${reponse.places[i].unique_id_place}`;
                    // ${reponse.places[i].dimension}
                    options.innerHTML += `${reponse.places[i].place_nom} ${reponse.places[i].type_place_nom} ${reponse.places[i].place_orientation}`;
                    document.getElementById('place'+idSecteurActivite).appendChild(options);
                }
            }else{
                document.getElementById('place'+idSecteurActivite).innerHTML = '<option value="">Place non disponible</option>';
                document.getElementById('place'+idSecteurActivite).setAttribute("disabled", true);
            }
            document.getElementById('quantiteStock'+idSecteurActivite).style.display = "block"; //quantite0
            let quantiteDispo = document.getElementById('quantiteDispo'+idSecteurActivite).innerHTML = "(" + countEmplacement + ")";

            document.getElementById('placeLoaderImg'+idSecteurActivite).style.display = "none";  
        }).catch(function(error) {
            alert(error);
            console.log(error);
        });
    }
</script>

<script>
    document.getElementById('formSend').addEventListener('submit', function(e) {
        e.preventDefault();
        document.getElementById('btnSend').innerHTML = " En cours...";
        document.getElementById('btnSend').setAttribute("disabled", true);
       
        const myForm = document.getElementById('formSend');

        const formDatas = new FormData(myForm);
        axios.post("{{route('vend.storeNouveauDossierAjax')}}", formDatas, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function(response) {
            const reponse = response.data;
            document.getElementById('btnSend').innerHTML = "Enregistrer";
            document.getElementById('btnSend').removeAttribute("disabled");  
            if(reponse.statut == "saveSuccess"){
                Swal.fire({
                    title: "Enregistrement",
                    text: reponse.message,
                    icon: 'success',
                    confirmButtonText: `Ok &nbsp;<i class="fa fa-arrow-right"></i>`,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        //reponse.myData
                        //window.location.href = "{{route('vend.create')}}"; //reponse.myUrl;
                    }
                });
            }
            if(reponse.statut == "errorValidate"){
                // Si la validation échoue, afficher les erreurs
                let errors = reponse.errorsValidateMessage;
                let errorMessage = '';

                // Concaténer les messages d'erreur
                for (let field in errors) {
                    errorMessage += errors[field].join(' ') + '<br />';
                }
                console.log(reponse.errorsValidateMessage);
                //alert(reponse.errorsValidateMessage)
                // Afficher les erreurs dans SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur de validation',
                    html: errorMessage,
                });
            }
            console.log(reponse)         
        }).catch(function(error) {
            alert(error);
            console.log(error);
        });
    });
</script>
@endsection