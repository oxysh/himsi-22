<table border="1">

    <tr>
        <th>No</th>
        @foreach ($form->pertanyaan as $p)
            <th>{{$p->pertanyaan}}</th>
        @endforeach
    </tr>

    @foreach ($form->penjawab as $b)
        <tr>
            <td> {{$loop->iteration}} </td>
            @foreach ($form->pertanyaan as $p)
                @foreach ($b->jawaban as $j)
                    @if ($j->pertanyaan_id == $p->id)
                    <td>
                        {{$j->jawaban}}
                    </td>
                    @endif
                @endforeach
            @endforeach
           
        </tr>
    @endforeach
</table>