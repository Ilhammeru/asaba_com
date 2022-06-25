@foreach ($data as $item)
    <tr>
        <td class="p-0">{{ $item['name'] }}</td>
        <td class="p-0">:</td>
        <td class="p-0">Rp {{ number_format($item['pay']) }}</td>
    </tr>
@endforeach