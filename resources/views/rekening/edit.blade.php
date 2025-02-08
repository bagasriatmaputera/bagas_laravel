@extends('layouts.app')
@section('title')
Edit Data
@endsection
@section('content')<h2>Edit Rekening</h2>

<form action="{{ route('rekening.update', $rekening->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="bank_name" class="form-label">Nama Nasabah:--</label>
        <input type="text" name="namaRekening" id="namaRekening" class="form-control" value="{{ $rekening->namaRekening }}" required>
    </div>

    <div class="mb-3">
        <label for="account_number" class="form-label">Nomor Rekening</label>
        <input type="text" name="noRekening" id="noRekening" class="form-control" value="{{ $rekening->noRekening }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
@endsection