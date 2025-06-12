<div class="page-inner py-5">
    
    {{--<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
        <div>
            <h2 class="text-white pb-2 fw-bold">Tableau de bord</h2>
            <!-- <h5 class="text-white op-7 mb-2">Gestion du ...</h5> -->
        </div>
        <!-- <div class="ml-md-auto py-2 py-md-0">
            <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
            <a href="#" class="btn btn-secondary btn-round">Add Customer</a>
        </div> -->
    </div> --}}

    <div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h1 class="text-white pb-2 fw-bold">Tableau de bord</h1>
                <h5 class="text-white op-9 mb-2">Bienvenue sur SOGEMA, outil de gestion d'enregistrement des vendeurs du grand marché Zando</h5>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
                <!-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a> -->
                <a href="{{route('vend.create')}}" class="btn btn-secondary btn-round">Crée une demande</a>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Situation statistique des demandes des vendeurs</div>
                    <div class="card-category">Demande enregistrer à ce jours : <span>{{$totalsVendeurs}}</span></div>
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-1"></div>
                            <h6 class="fw-bold mt-2 mb-0">En attente: {{$vendeursAttenteCounts}}</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-2"></div>
                            <h6 class="fw-bold mt-2 mb-0">Traité: {{$vendeursTraiterCounts}}</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-3"></div>
                            <h6 class="fw-bold mt-2 mb-0">Valider: {{$vendeursValiderCounts}}</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-4"></div>
                            <h6 class="fw-bold mt-2 mb-0">Payer: {{$vendeursDejaPayerCounts}}</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-5"></div>
                            <h6 class="fw-bold mt-2 mb-0">Expirer: 0</h6>
                        </div>

                        {{-- <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-6"></div>
                            <h6 class="fw-bold mt-2 mb-0">Rejeter: </h6>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        
        <!-- <div class="col-md-6">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Total income & spend statistics</div>
                    <div class="row py-3">
                        <div class="col-md-4 d-flex flex-column justify-content-around">
                            <div>
                                <h6 class="fw-bold text-uppercase text-success op-8">Total Income</h6>
                                <h3 class="fw-bold">$9.782</h3>
                            </div>
                            <div>
                                <h6 class="fw-bold text-uppercase text-danger op-8">Total Spend</h6>
                                <h3 class="fw-bold">$1,248</h3>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div id="chart-container">
                                <canvas id="totalIncomeChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>

<div class="row row-card-no-pd">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-head-row card-tools-still-right">
                    <h4 class="card-title">Situation Emplacement</h4>
                    <!-- <div class="card-tools">
                        <button class="btn btn-icon btn-link btn-primary btn-xs"><span class="fa fa-angle-down"></span></button>
                        <button class="btn btn-icon btn-link btn-primary btn-xs btn-refresh-card"><span class="fa fa-sync-alt"></span></button>
                        <button class="btn btn-icon btn-link btn-primary btn-xs"><span class="fa fa-times"></span></button>
                    </div> -->
                </div>
                <p class="card-category">
                Présentation de la situation des emplacements en fonction de type</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive table-hover table-sales">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="font-size: 16px;">{{ __('Emplacement')}}</th>
                                        <th class="text-center" style="font-size: 18px;">{{ __('Type')}}</th>
                                        <th class="text-center" style="font-size: 18px;">{{ __('Total')}}</th>
                                        <th class="text-center" style="font-size: 18px;">{{ __('Occupé')}}</th>
                                        <th class="text-center" style="font-size: 18px;">{{ __('Libre')}}</th>
                                    </tr>
                                </thead>
                                <tbody id="myTab" class="myTab">
                                    <tr class="justify-content-center myLoaderImg">
                                        <td colspan="6" class="justify-content-center text-center">
                                            
                                                <img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..." id="myLoaderImg" style="height: 100px;" />
                                            
                                        </td>
                                    </tr>  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.onload = function(){
        getDataStatistiquePlace();
    }

    function getDataStatistiquePlace() {
        // document.getElementById('myLoaderImg').style.display = "block";
        axios.get("{{route('statistiquePlaceDashboard')}}",{
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
        })
        .then(function (response) {
            //console.log(response.data);
            var reponse = response.data;
            if(reponse != "") {
                let myLoaderImg = document.getElementById('myLoaderImg');//.style.display = "none";
                if(myLoaderImg){
                    myLoaderImg.style.display = "none";
                }
            }
            document.getElementById('myTab').innerHTML = reponse;
            //console.log(reponse);
            //statistiquePlaceCount();
        })
        .catch(function (error) {
            // handle error
            console.log(error);
            alert(error);
        })
    }
</script>