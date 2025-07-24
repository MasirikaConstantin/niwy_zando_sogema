@forelse ($vendeurs as $item)
<tr style="cursor: pointer;">
    <td>{{$loop->index+1}}</td>
    <td>
        {{ $item->vendeur->nom.' '.$item->vendeur->postnom.' '.$item->vendeur->prenom }}
        <br />
    </td>
    <td class="text-center">@if(!empty($item->vendeur->telephone)){{ $item->vendeur->telephone}}@endif</td>
    <td class="text-center">
        {{ date('d-m-Y', strtotime($item->datecreation)) }}
    </td>
    @if(request()->route()->getName() != "vend.index")
    <td class="text-center">
        @if($item->etat == "valider")
            <span class="p-1 colorText bg-primary" style="border-radius: 5px; font-weight: bold;"> Validé  </span>
        @else
            @if($item->etat == "pre-enregistrement")
                <span class="p-1 colorText bg-danger" style="border-radius: 5px; font-weight: bold;"> Pré-enregistrement </span>
            @endif

            @if($item->etat == "attente")
                <span class="p-1 colorText" style="background-color: #dc8211; border-radius: 5px; font-weight: bold;"> Non traité </span>
            @endif
            @if($item->etat == "traiter")
                <span class="p-1 colorText bg-primary" style="border-radius: 5px; font-weight: bold;"> Traité </span>
            @endif
            @if($item->etat == "payer")
                <span class="p-1 colorText bg-success" style="border-radius: 5px; font-weight: bold;"> Payé </span>
            @endif
        @endif
    </td>
    @endif    

    <td class="text-center">
        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            <div class="btn-group" role="group">
                <button type="button" class="btn bg_background colorText dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  Action
                </button>
                <div class="dropdown-menu">
                    {{-- <a href="{{route('vend.fichePDF', $item->id)}}" class="dropdown-item dropdownActive">Voir la demande</a> --}}
                    <a href="{{route('vend.show', $item->vendeur->id)}}" class="dropdown-item dropdownActive">Voir le Vendeur</a>
                    {{-- <a href="#" class="dropdown-item dropdownActive">Voir demande validé</a> --}}
                    {{-- <a href="#" class="dropdown-item dropdownActive">Voir demande payé</a> --}}
                    {{-- <a class="dropdown-item dropdownActive" href="{{route('vend.fichePDF', $item->id)}}">Voir le dossier</a> --}}
                    @if($item->etat == "attente")
                        <a class="dropdown-item dropdownActive" href="{{route('vend.detailsInfosVendeurPourValidation',$item->id)}}">Validation</a>
                    @endif 
                    {{-- data-toggle="modal" data-target="#detailsInfos{{ $item->id }}" --}}
                    {{-- || $item->etat == "payer" --}}
                    @if($item->etat == "traiter" || $item->etat == "valider")
                        {{-- <a class="dropdown-item dropdownActive" href="{{route('vend.detailsInfosVendeurPourValidation',$item->id)}}">Déjà traité</a> --}}
                        @if(Auth::user()->role->name == "Super Admin" || Auth::user()->role->name == "DG")
                            <a class="dropdown-item dropdownActive" href="{{route('vend.detailsVendeurValidationDG',$item->id)}}">Approuver</a>
                        @endif 
                        {{-- @else
                            <a class="dropdown-item dropdownActive" href="{{route('vend.detailsInfosVendeurPourValidation',$item->id)}}">Validation</a>
                        --}}
                    @elseif($item->etat == "payer")
                        {{-- <a class="dropdown-item dropdownActive" href="{{route('vend.detailsInfosVendeurPourValidation',$item->id)}}">Validation</a> --}}
                        <a class="dropdown-item dropdownActive" href="{{route('vend.vendeurContrat', $item->id)}}">Imprimer le Contrat</a>
                    @endif
                    {{-- <a class="dropdown-item dropdownActive" href="#">Supprimer</a> --}} 
                    @if($item->etat == "attente" || $item->etat != "payer")
                        <a class="dropdown-item dropdownActive" href="{{route('vend.edit', $item->id)}}">Modification</a>   
                    @endif  
                    
                    <a class="dropdown-item dropdownActive" href="{{route('vend.ajouterDemande', $item->id)}}">Ajouter une demade</a>
                </div>
            </div>
        </div>
    </td>
</tr> 
<div class="modal custom-modal fade" id="detailsInfos{{ $item->id }}" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row text-center" style="font-weight: bold;">
                    <div class="col-sm-12" style="font-size: 18px;">
                      INFORMATION VENDEUR <br /> <br />
                      {{$item->code_unique}}
                    </div>
                </div>

                <div class="row border mt-4 ml-2 mr-2">
                    <div class="col-sm-4" style="border-right: 0.5px solid #dee2e6;">
                        <h4 style="font-weight: bold;">Nom:</h4>
                        <h4>{{$item->nom}}</h4>
                    </div>
                    <div class="col-sm-4" style="border-right: 0.5px solid #dee2e6;">
                        <h4 style="font-weight: bold;">Postnom:</h4>
                        <h4>{{$item->postnom}}</h4>
                    </div>
                    <div class="col-sm-4">
                        <h4 style="font-weight: bold;">Prenom:</h4>
                        <h4>{{$item->prenom}}</h4>
                    </div>
                </div>               

                
                <div class="row mt-3 bg-danger">
                    <div class="col-sm-4 bg-primary">
                        <h4>Article <span class="isRequired">*</span></h4>
                        <select name="article0[]" id="articleId0"  class="form-control selected2" multiple="multiple" required>
                            <option value="">--Choisir--</option>
                            <option value="">--jfdddddddddddddddddddd--</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <h4>Quantité</h4>
                        <input type="text" name="quantite0" id="quantite0" class="form-control" />
                    </div>
                </div>      
                
                <div class="modal-btn delete-action mt-4">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- <a href="{{ route('dashboard') }}" class="btn btn-danger btn-block">Oui</a> -->
                        </div>
                        <div class="col-sm-6">
                            <a href="javascript:void(0);" data-dismiss="modal" class="btn-block btn btn-primary">Enregistrer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@empty
<tr class="text-center">
  <td colspan="6">
    <div class="row justify-content-center">
      <div class="col-sm-12">
        <img src="{{ asset('app-assets/images/picto_landlord_search.png') }}" class="img-fluid" alt="" style="height: 100px;">
        <h4>Il n'y a rien par ici...</h4>
        @if(Auth::user()->role->name == "AgentTerrain" || Auth::user()->role->name == "Super Admin")
        <p>Cette page permet de gérer les vendeur.</p>
        <a href="{{route('vend.create')}}" class="btn bg_background colorText">AJOUTER UN VENDEUR</a>
        @endif
      </div>
    </div>
  </td>
</tr>
@endforelse         