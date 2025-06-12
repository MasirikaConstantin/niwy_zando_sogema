@extends('layout.main')
@section('title', 'Pavillon details')
@section('styles')
{{-- <link href="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.7.0/dt-2.0.8/datatables.min.css" rel="stylesheet" /> --}}

<style>
    
</style>
@endsection
@section('content')
<div class="container-fluid"> 
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-10">
            <div class="row mt-4 pl-4 pr-3 mb-2" style="display: flex; flex-direction: row; align-items: center; justify-content: space-between ;">
                <div>
                    <h2 style="font-weight: bold;">Statistique pavillon details</h2>
                </div>
            </div>

            <div class="card">
                <button type="button" class="btn btn-primaryM colorText bg_background" style="font-size: 17px;">
                    Total pavillons&nbsp;
                    <span id="pavillonCount" class="badge badge-light" style="font-size: 18px;">
                        {{$pavilloneEmplacementCounts}}
                    </span>
                </button>
                <!-- <form id="formSendSearch" action="#" method="GET">
                    <div class="row mt-2 ml-2">
                        <div class="col-sm-10 col-md-7 col-lg-5">
                            {{-- value="{{request()->get('search')}}" --}}
                            <input type="text" name="myInputRecherche" id="myInputRecherche" class="form-control" placeholder="Recherche pavillon" />
                        </div>
                        <div class="col-sm-4">
                            <button id="btnSendSearch" type="submit" class="btn bg_background colorText" title="Recherche">
                                <i id="iconSearch" class="fas fa-search"></i>
                                <img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..." id="myLoaderImgSearch" style="height: 20px; display: none;" />
                            </button>

                            <button onclick="actualiser();" type="button" class="btn bg_background colorText ml-3" title="Atualiser la liste">
                                <i id="iconaCtualiser" class="fas fa-sync"></i>
                                <img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..." id="myLoaderImgActualiser" style="height: 20px; display: none;" />
                            </button>
                        </div>
                    </div>
                </form> -->
                <div class="card-body">
                    <div class="dt-responsive">
                        <table id="myTabable" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr >
                                    <th style="font-size: 18px;">{{ __('Pavillon')}}</th>
                                    <th class="text-center" style="font-size: 18px;">{{ __('Niveau')}}</th>
                                    <th class="text-center" style="font-size: 18px;">{{ __('Emplacement numéro')}}</th>
                                    <th class="text-center" style="font-size: 18px;">{{ __('Emplacement statut')}}</th>
                                </tr>
                            </thead>
                            <tbody id="myTab">
                                <tr class="justify-content-center myLoaderImg">
                                    <td colspan="5" class="justify-content-center text-center">
                                        <!-- <div class="col-sm-12 bg-dangerM justify-content-center text-center"> -->
                                            <img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..." id="myLoaderImg" style="height: 100px;" />
                                        <!-- </div> -->
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
@endsection

@section('scripts')
<script src="{{asset('assets/js/axios.min.js')}}"></script>

<script>
    window.onload = function(){
        getDataStatistiquePavillons();
    }

    function getDataStatistiquePavillons() {
        // document.getElementById('myLoaderImg').style.display = "block";
        // ,
        //     params: {
        //         idPavillon: "{{$idPavillon}}"
        //     }
        axios.get("{{route('pavillonDetailsEmplacement', $idPavillon)}}",{
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(function (response) {
            var reponse = response.data;
            if(reponse != "") {
                let myLoaderImg = document.getElementById('myLoaderImg');//.style.display = "none";
                if(myLoaderImg){
                    myLoaderImg.style.display = "none";
                }
                // else{
                //     myTab.innerHTML = `<tr class="justify-content-center myLoaderImg">
                //         <td colspan="5" class="justify-content-center text-center">
                //             <img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..." id="myLoaderImg" style="height: 100px;" />
                //         </td>
                //     </tr>`;
                // }
                //getDataElevesCount();
                //console.log(reponse);
            }
            document.getElementById('myTab').innerHTML = reponse;
            //console.log(reponse);
            //statistiquePavillonsCount();
        })
        .catch(function (error) {
            // handle error
            console.log(error);
            alert(error);
        })
    }
</script>
@endsection