<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'LaksaMedical')
<h3 style="display: inline-block; text-color: #72008f" >{{ config('app.name') }}</h3>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
