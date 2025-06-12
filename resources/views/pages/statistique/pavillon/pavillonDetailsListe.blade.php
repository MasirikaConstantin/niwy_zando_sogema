@forelse ($pavillonStatisqueDetails as $item)
<tr class="myTabData">
    <td style="font-size: 18px;">
       {{ $item->pavillonNumero}}
    </td>
    <td class="text-center">
        {{ $item->pavillonNiveau}}
    </td>
    <td class="text-center">
        {{ $item->emplacementNumero}}
    </td>
    <td class="text-center">
        @if($item->emplacementStat == 0)
            <span class="bg-danger text-white p-1 rounded">Libre</span>
        @endif
        
        @if($item->emplacementStat == 1)
            <span class="bg-primary text-white p-1 rounded">Occupé</span>
        @endif
    </td>
</tr>
@empty
<tr>
    <td colspan="5">
        <h3 class="text-danger text-center">Pas de données</h3>
    </td>
</tr>
@endforelse