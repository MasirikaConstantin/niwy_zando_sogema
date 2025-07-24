<div class="card card-invoice">
    <div class="card-body" style="margin-top: 35px;">
        <div class="invoice-detail">
            <div class="invoice-top">
                <h3 class="title"><strong>Activite</strong></h3>
            </div>
            @if($dossier->etat != "attente" && $dossier->decision_dg == 1)
                @php
                    // Calcul du total général
                    $totalApayerRemise = 0;
                    foreach ($dossier->vendeurDemandes as $dm) {
                        if ($dm->decision == '1') {
                            if ($dm->remise > 0) {
                                $totalApayerRemise += $dm->total - ($dm->total * $dm->remise / 100);
                            } else {
                                $totalApayerRemise += $dm->total;
                            }
                        }
                    }
                @endphp

                <div class="invoice-item">
                    <div class="table-responsive">                                        
                        <form id="formSend" action="{{ route('vend.saveDecisionBanque') }}" method="POST">
                            @csrf
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td><strong>Article</strong></td>
                                        <td class="text-center"><strong>Place</strong></td>
                                        <td class="text-center"><strong>Pavillon</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($dossier->vendeurDemandes as $dm)
                                        @if($dm->decision == '1')
                                            <tr>
                                                <td class="">
                                                    <span>{{ $dm->article->nom }}</span>
                                                    <div class="text-primary">
                                                        @php
                                                            $totalApayer = $dm->remise > 0 
                                                                ? $dm->total - ($dm->total * $dm->remise / 100)
                                                                : $dm->total;
                                                        @endphp
                                                        <strong class="text-primary" style="font-size: 15px;">
                                                            Montant à payer 
                                                            <span>{{ number_format($totalApayer) }}</span><span>$</span>
                                                        </strong>
                                                    </div>
                                                    <input type="hidden" name="idVendeurDemande[]" value="{{ $dm->id }}">
                                                </td>
                                                <td class="text-center">
                                                    {{ $dm->place->nom }}
                                                    @if($dm->place->type_place_id)
                                                        {{ $dm->place->typePlace->nom }} {{ $dm->place->typePlace->dimension }}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if($dm->pavillon_id)
                                                        {{ $dm->pavillon->numero }} / Niveau {{ $dm->pavillon->niveau }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-danger fw-bold">Pas de données</td>
                                        </tr>
                                    @endforelse

                                    <tr>
                                        <td colspan="1"></td>
                                        <td class="text-center">
                                            <h4 style="text-transform: uppercase;">TOTAL Général</h4>
                                        </td>
                                        <td class="text-center">
                                            <h4 style="font-weight: bold;">
                                                {{ number_format($totalApayerRemise) }} <span>$</span>
                                            </h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="hidden" name="user_id" value="{{ $currentUser->id }}">
                            <button id="btnSend" type="submit" class="btn bg_background text-white" style="height: 40px;">
                                Valider 
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="text-center" style="font-weight: bold;">Dossier non Traité</h4>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>