@forelse ($placeStatistique as $item)
<tr class="myTabData">
    
    
    <td style="font-size: 14px;" class="text-left">{{ $item->placeNom}}</td>
    <td style="font-size: 14px;" class="text-center">{{ $item->typePlaceNom}}</td>
    <td style="font-size: 14px;" class="text-center">{{ $item->nombreEmplacementTotal}}</td>
    <td style="font-size: 14px;" class="text-center">{{ $item->nombreEmplacementOccupe}}</td>
    <td style="font-size: 14px;" class="text-center">{{ $item->nombreEmplacementLibre}}</td>    
</tr>
@empty
<tr>
    <td colspan="6">
        <h3 class="text-danger text-center">Pas de données</h3>
    </td>
</tr>
@endforelse