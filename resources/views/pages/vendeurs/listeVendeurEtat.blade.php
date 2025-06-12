@extends('layout.main')
@section('title', 'Liste Vendeur')
@section('styles')
<style>
    
</style>
@endsection
@section('content')
<div class="row pl-4 pr-4 mt-3">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <!-- <div class="row bg-successM justify-content-center myLoaderImgM">
            <div class="col-sm-4 bg-dangerM justify-content-center text-center">
                <img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..." id="myLoaderImg" style="height: 100px;" />
            </div>
        </div> -->
        <div class="card">
            <h4 class="card-title pl-4 pt-3">Liste des vendeurs <span class="fw-bold"> @if($etat == "attente") Non traité @elseif($etat == "traiter") traité @elseif($etat == "payer") payer @elseif($etat == "valider") validé @endif</span> <span class="fw-bold bg_background colorText pl-3 pr-3 pt-1 pb-1" style="border-radius: 6px;">{{$vendeurCounts}}</span></h4>
            <div class="card-body">
                <div class="dt-responsiveM table-responsiveM">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>{{ __('N°')}}</th>
                                <th class="text-center">{{ __('Noms')}}</th>                                
                                <th class="text-center">{{ __('Telephone') }}</th>                                
                                <th class="text-center">Date</th>
                                <th class="text-center">{{ __('Etat Doc')}}</th>
                                <th class="text-center">{{ __('Action')}}</th>
                            </tr>
                        </thead>
                        <tbody id="myTab">                            
                            <tr class="justify-content-center myLoaderImg">
                                <td colspan="7" class="justify-content-center text-center">
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
@endsection

@section('scripts')
<script src="{{asset('assets/js/axios.min.js')}}"></script>
<script>
    getDataVendeurs();
    function getDataVendeurs(){
        // document.getElementById('myLoaderImg').style.display = "block"; 
        const myUrl = "{{route('vend.listVendeurParEtat', request()->segment(3))}}";
        //alert(myUrl);
        axios.get(`${myUrl}`,{
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
        })
        .then(function (response) {
            var reponse = response.data;
            if(reponse != "") {
                document.getElementById('myLoaderImg').style.display = "none";
                //getDataElevesCount();
            }
            document.getElementById('myTab').innerHTML = reponse;
            console.log(reponse);
        })
        .catch(function (error) {
            // handle error
            //console.log('my error');
            console.log(error);
            alert('My error '+error);
        })
    }
</script>
@endsection