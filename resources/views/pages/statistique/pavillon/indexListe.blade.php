@forelse ($pavillonStatisque as $item)
<tr class="myTabData">
    <td style="font-size: 18px;">
        <a href="{{route('pavillonDetailsEmplacement', $item->pavillonId)}}">{{ $item->pavillonNumero}}</a>
    </td>
    <td style="font-size: 18px;" class="text-center">{{ $item->pavillonNiveau}}</td>
    <td style="font-size: 18px;" class="text-center">{{ $item->nombreEmplacementLibre}}</td>
    <td style="font-size: 18px;" class="text-center">{{ $item->nombreEmplacementOccupe}}</td>
    <td style="font-size: 18px;" class="text-center">{{ $item->nombreEmplacementTotal}}</td>    
</tr>
@empty
<tr>
    <td colspan="5">
        <h3 class="text-danger text-center">Pas de données</h3>
    </td>
</tr>
@endforelse