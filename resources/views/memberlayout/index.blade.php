@extends('memberlayout.app')
@section('title') Buku @endsection
@section('body')
	<!-- List Buku -->
	<div class="content animated fadeIn slow">
		<div class="row">
			@foreach($buku as $buku)
			<div class="col-md-3">
					<div class="card-body">
						<div class="card mb-4 box-shadow">
							<img class="card-img-top" style="display: block; margin: 10 auto; height: 300px; width: 250px;" src="{{ url('images/uploads', $buku->gambar) }}">
							<div class="card-body">
								<h5 class="card-title mb-3 fw-mediumbold" align="center">{{ $buku->judul }}</h5>
								<p class="card-text">Pengarang : {{ $buku->pengarang }}</p>
								<p class="card-text">Penerbit : {{ $buku->penerbit }}</p>
								<p class="card-text">Tahun Terbit : {{  $buku->tahun_terbit }} </p>
								<p class="card-text">Buku Tersisa : {{ $buku->jumlah }}</p>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	<!-- List Buku -->
</div>
@endsection

