@extends('layout.app')
@section('title') Edit Admin @endsection

@section('body')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Pegawai</h1>
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
                <h3 class="card-title">Tambah Pegawai</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form action="{{ route('dashboard.pegawai.update', $data->id) }}" method="post" role="form">
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
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama" required value="{{  old('nama') ?? $data->nama}}">
                    </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" placeholder="Email" required value="{{  old('alamat') ?? $data->alamat}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nomor telepon</label>
                    <input type="text" name="nope" class="form-control" id="exampleInputEmail1" placeholder="No HP"  required value="{{  old('nope') ?? $data->nope}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" id="exampleInputEmail1" placeholder="Jabatan"  required value="{{  old('jabatan') ?? $data->jabatan}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Gaji</label>
                    <input type="text" name="gaji" class="form-control" id="exampleInputEmail1" placeholder="Gaji"  required value="{{  old('gaji') ?? $data->gaji }}">
                </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Tambah</button>
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
