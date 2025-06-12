@extends('layout.main')
@section('title', 'Dashboard')

@section('styles')
<style>
    .fontBolde {
        font-weight: bold;
    }
</style>
@endsection

@section('contentHeader')
<div class="panel-header bg-primary-gradientM">
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

        @if(Auth::user()->role->name == "Super Admin" || Auth::user()->role->name == "DG")
            @include('pages.dashboard.admin')
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Nombre des places utilisé </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="barChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(Auth::user()->role->name == "Admin")
            @include('pages.dashboard.superviseur')
        @endif

        @if(Auth::user()->role->name == "AgentTerrain")
            @include('pages.dashboard.agent')
        @endif
    </div>
</div>
<div class="row justify-content-centerM">
    {{-- <div class="col-sm-8 text-center">
        <div class="card">
            <div class="card-body">
                <img src="{{asset('assets/img/logoSogema.png')}}" alt="Logo sogema" style="height: 130px" />
            </div>
        </div>
    </div> --}}    
</div>
@endsection

@section('scripts')
<script src="{{asset('assets/js/axios.min.js')}}"></script>
<script src="{{asset('assets/plugins/chart.js/chart.min.js')}}"></script>
<script>

    var barChart = document.getElementById('barChart').getContext('2d');

    //data: [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4],

    // var myBarChart = new Chart(barChart, {
    //     type: 'bar',
    //     data: {
    //         labels: ['lundi','mardi'],
    //         datasets : [{
    //             label: "Sales",
    //             backgroundColor: 'rgb(23, 125, 255)',
    //             borderColor: 'rgb(23, 125, 255)',
    //             data: [3, 2, 4],
    //         }],
    //     },
    //     options: {
    //         responsive: true, 
    //         maintainAspectRatio: false,
    //         scales: {
    //             yAxes: [{
    //                 ticks: {
    //                     beginAtZero:true
    //                 }
    //             }]
    //         },
    //     }
	// });

    getDataPavillons();
    function getDataPavillons()
    {
        axios.get("{{route('stat.listePavillon')}}")
        .then(function(response) {
            let reponse = response.data;
            // for (let i in produits) {            
            // }  
            
            var myBarChart = new Chart(barChart, {
                type: 'bar',
                data: {
                    labels: reponse.labele,
                    datasets : [{
                        label: "Pavillons",
                        backgroundColor: 'rgb(23, 125, 255)',
                        borderColor: 'rgb(23, 125, 255)',
                        data: reponse.data,
                    }],
                },
                options: {
                    responsive: true, 
                    maintainAspectRatio: false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    },
                }
            });
            console.log(reponse);              
        }).catch(function(error) {
            alert(error);
            console.log("myError "+ error);
        });
    } 
</script>
@endsection