<tr>
<td>
    <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
       <tr>
            <td class="content-cell" align="center">
            @SMKN 4 PADALARANG
            <br>
            <img src="{{asset('img/informatika.png')}}" class="rounded" alt="" widht="150" height="150">
            </td>
       </tr>
        <tr>
            <td class="content-cell" align="center">
            {{ Illuminate\Mail\Markdown::parse($slot) }}
            </td>
        </tr>
    </table>
</td>
</tr>
