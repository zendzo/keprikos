@extends('layouts.app')

@section('content')
<form action="/test" method="POST">
{{ csrf_field() }}
    <div class="col-sm-10">
        <select name="generalFacility" id="inputGeneralFacility" class="form-control select2 select2-hidden-accessible" multiple="multiple" style="width: 100%;" tabindex="-1" aria-hidden="true">
        <option value="Ruang Tamu">Ruang Tamu</option>
        <option value="Ruang Makan">Ruang Makan</option>
        <option value="Dapur">Dapur</option>
        <option value="Kulkas">Kulkas</option>
        <option value="Dispenser">Dispenser</option>
        <option value="Mushola">Mushola</option>
        <option value="Ruang Santai">Ruang Santai</option>
        <option value="Ruang Jemuran">Ruang Jemuran</option>
        <option value="Ruang Cuci">Ruang Cuci</option>
        <option value="Mesin Cuci">Mesin Cuci</option>
        <option value="Security">Security</option>
        <option value="Akses 24 Jam">Akses 24 Jam</option>
        </select>
    </div>
                    <button>submit</button>
</form>
@endsection

@section('script')
<script>
    $(function(){
            $('#inputGeneralFacility').select2({
            multiple: true,
            tokenSeparators: [','],
            placeholder: 'Pilih'
        });
    });
</script>
@endsection