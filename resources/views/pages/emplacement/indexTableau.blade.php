@forelse ($emplacements as $item)
<tr class="myTabData">
    <td style="font-size: 18px;">@if(!empty($item->pavillon_id)){{ $item->pavillon->numero}} / Niveau {{ $item->pavillon->niveau}} @endif</td> 
    <td class="text-center" style="font-size: 18px;">{{ $item->numero}}</td>                                    
    <td class="text-center" style="font-size: 18px;">
        @if(!empty($item->place_id))
            {{$item->place->orientation ?? ''}}
        @endif
    </td>                                    
    <td style="font-size: 18px;">
        @if(!empty($item->place_id))
            {{ $item->place->nom ?? ''}}
            @if(!empty($item->place->type_place_id))
                {{ $item->place->typePlace->nom}} 
                {{ $item->place->typePlace->dimension}}
            @endif 
        @endif
    </td>                                    
                                       
    <td class="text-center" style="font-size: 18px;">@if($item->etat == 0) <span>disponible</span> @elseif($item->etat == 1) <span>Occupé</span> @endif</td>                                    
    <td style="font-size: 18px;" class="text-center">
        {{-- <a class="dropdown-item btn" href="{{ route('dashboard',[$item->id]) }}"><i class="fa fa-th m-r-5"></i> Détails</a>
        <a class="dropdown-item btn" href="{{ route('dashboard') }}"><i class="fa fa-edit m-r-5"></i> Modifier</a>
        <a class="dropdown-item btn btn-dark" href="#" data-toggle="modal" data-target="#delete{{ $item->id }}"><i class="fa fa-trash m-r-5"></i> Supprimer</a> --}}
        
        <!-- <a class="dropdown-itemM btnM btn-hover mr-1" href="{{ route('dashboard',[$item->id]) }}" title="Détails"><i class="fa fa-th m-r-5"></i></a> -->
        <a class="dropdown-itemM btnM btn-hover mr-1" href="#" title="Modifier" data-toggle="modal" data-target="#edit{{ $item->id }}"><i class="fa fa-edit m-r-5"></i></a>
        {{-- <a class="dropdown-itemM btnM btn-hover" href="#" data-toggle="modal" data-target="#delete{{ $item->id }}" title="Supprimer"><i class="fa fa-trash m-r-5 text-danger"></i></a> --}}
        
    </td>
</tr>
@empty
<tr>
    <td colspan="6">
        <h3 class="text-danger text-center">Pas de données</h3>
    </td>
</tr>
@endforelse