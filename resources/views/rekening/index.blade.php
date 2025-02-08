@extends('layouts.app')
@section('title')
Data Rekening
@endsection
@section('content')
    @if(session('success'))
        {{ session('success') }}
    @endif

    <a href="{{url('rekening/create')}}" target="_blank" rel="noopener noreferrer">Create Rekening</a>


    <table>
        <thead>
            <th>nomor rekening</th>
            <th>nama</th>
            <th>Saldo awal</th>
            <th>action</th>
        </thead>
        <tbody>
            @foreach($rekenings as $key => $rekening)
            <tr>
                <td>{{$rekening->noRekening}}</td>
                <td>{{$rekening->namaRekening}}</td>
                <td>{{$rekening->saldoAwal ?? 'Rp.0'}}</td>
                <td>
                <a href="{{ route('rekening.edit', $rekening->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{route('rekening.destroy', $rekening->id)}}" method="post" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
