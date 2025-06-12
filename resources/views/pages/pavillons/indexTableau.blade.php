@forelse ($pavillons as $item)
    <tr class="myTabData">
        <td style="font-size: 18px;">{{ $item->numero}}</td>                                    
        <td class="text-center" style="font-size: 18px;">{{ $item->niveau}}</td>                                    
        <td style="font-size: 18px;" class="text-center">
            {{-- <a class="dropdown-item btn" href="{{ route('dashboard',[$item->id]) }}"><i class="fa fa-th m-r-5"></i> Détails</a>
            <a class="dropdown-item btn" href="{{ route('dashboard') }}"><i class="fa fa-edit m-r-5"></i> Modifier</a>
            <a class="dropdown-item btn btn-dark" href="#" data-toggle="modal" data-target="#delete{{ $item->id }}"><i class="fa fa-trash m-r-5"></i> Supprimer</a> --}}
            
            <!-- <a class="dropdown-itemM btnM btn-hover mr-1" href="{{ route('dashboard',[$item->id]) }}" title="Détails"><i class="fa fa-th m-r-5"></i></a> -->
            <a class="bg_background btn-hover p-1 rounded" href="#" title="Modifier" data-toggle="modal" data-target="#edit{{ $item->id }}"><i class="fa fa-edit text-white"></i></a>
            {{-- <a class="bg-danger btn-hover p-1 rounded" href="#" data-toggle="modal" data-target="#delete{{ $item->id }}" title="Supprimer"><i class="fa fa-trash text-white"></i></a> --}}
        </td>
    </tr>

    <div class="modal custom-modal fade" id="edit{{ $item->id }}" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3 style="text-align: center">Modification</h3>
                        <p style="text-align: center">Voulez-vous Modifier le pavillon {{ $item->numero }} ?</p>
                    </div>
                    <br>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-sm-6">
                                <a id="btnSendSup{{$item->id}}" onclick="btnDelete('{{$item->id}}')" href="{{ route('pavillon.edit', $item->id) }}" class="btn bg_background text-white btn-block">Oui</a>
                            </div>
                            <div class="col-sm-6">
                                <a href="javascript:void(0);" data-dismiss="modal" class="btn-block btn text-white" style="background-color: #51515a;">Annuler</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal custom-modal fade" id="delete{{ $item->id }}" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3 style="text-align: center">Suppression</h3>
                        <p style="text-align: center">Voulez-vous supprimer le pavillon {{ $item->numero }} ?</p>
                    </div>
                    <br>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-sm-6">
                                <a id="btnSendSup{{$item->id}}" onclick="btnDelete('{{$item->id}}')" href="{{ route('pavillon.delete', $item->id) }}" class="btn btn-danger btn-block">Oui</a>
                            </div>
                            <div class="col-sm-6">
                                <a href="javascript:void(0);" data-dismiss="modal" class="btn-block btn btn-primary">Annuler</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
<tr>
    <td colspan="2">
        <h3 class="text-danger text-center">Pas de données</h3>
    </td>
</tr>
@endforelse