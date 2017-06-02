@extends('layouts.app')

@section('content')
<div class="row">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Cari Kost Berdasarkan Fasilitas</h3>
            </div>

            <div class="box-body">
                <form class="form-horizontal" action="{{ route('search.facilities.results') }}" enctype="multipart/form-data" method="POST">
            	{{ csrf_field() }}
              	{{ method_field('POST') }}
                    <div class="form-group col-sm-12">
                        <select name="facility" class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
                            @foreach($facilities as $facility)
                                <option value="{{ $facility }}">{{ $facility }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-12">
						<button class="btn btn-block btn-lg btn-primary">Cari</button>
					</div>
                </form>
            </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @include('kost.list-kost')
    </div>
</div>
@endsection