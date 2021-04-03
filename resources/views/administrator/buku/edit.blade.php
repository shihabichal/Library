@extends('layout.app')
@section('title') Edit Buku @endsection

@section('body')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Buku</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Buku</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form action="{{ route('admin.buku.update', $data->id_buku) }}" method="post" role="form" enctype="multipart/form-data">
                  @csrf
                  @method('patch')
                <div class="card-body">
                    @if($errors->any())
              <div class="alert alert-danger" role="alert">
               <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{  $error }}</li>
                   @endforeach
               </ul>
            </div>
              @endif
              <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" class=" form-control">
                    <option value="">- Pilih -</option>
                    @foreach ($kategori as $item)
                    <option value="{{ $item->id_kategori }}" @if($data->kategori_id==$item->id_kategori) selected @endif>{{ $item->nama }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control" id="judul" placeholder="Judul" required value="{{  old('judul') ?? $data->judul}}">
              </div>
            <div class="form-group">
                <label for="pengarang">Pengarang</label>
                <input type="text" name="pengarang" class="form-control" id="pengarang" placeholder="Pengarang" required value="{{  old('pengarang') ?? $data->pengarang }}">
              </div>
          <div class="form-group">
            <label for="pengarang">Penerbit</label>
            <input type="text" name="penerbit" class="form-control" id="pengarang" placeholder="Penerbit" value="{{  old('penerbit') ?? $data->penerbit}}">
          </div>
          <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit</label>
            <input type="text" name="tahun_terbit" class="form-control" id="tahun_terbit" placeholder="Tahun Terbit" value="{{  old('tahun_terbit') ?? $data->tahun_terbit}}">
          </div>
          <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" class="form-control" id="isbn" placeholder="ISBN" value="{{  old('isbn') ?? $data->isbn}}">
          </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="text" name="jumlah" class="form-control" id="jumlah" placeholder="Jumlah" value="{{  old('jumlah') ?? $data->jumlah}}">
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Lokasi" value="{{  old('lokasi') ?? $data->lokasi}}">
            </div>
            <div class="form-group">
                <label for="thumbnail">Upload Gambar</label>
                <input type="file" name="thumbnail" class="form-control-file" id="thumbnail" >
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class=" form-control" id="status" >
                    <option value=null>- PILIH -</option>
                    <option value="tersedia" @if($data->status="tersedia") selected @endif>Tersedia</option>
                    <option value="habis" @if($data->status="habis") selected @endif>Habis</option>
                </select>
              </div>
        </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


          </div>
          <!--/.col (left) -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
