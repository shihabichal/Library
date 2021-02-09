@extends('layout.app')
@section('title') Tambah Admin @endsection

@section('body')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Admin</h1>
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
                <h3 class="card-title">Tambah Admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form action="{{ route('dashboard.pegawai.store') }}" method="post" role="form">
                  @csrf
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
                        <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama" required value="{{  old('nama') }}">
                      </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{  old('alamat') }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nomor telepon</label>
                    <input type="text" name="nope" class="form-control" id="exampleInputEmail1" placeholder="No HP"  value="{{  old('nope') }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" id="exampleInputEmail1" placeholder="Jabatan"  value="{{  old('jabatan') }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Gaji</label>
                    <input type="text" name="gaji" class="form-control" id="exampleInputEmail1" placeholder="Gaji"  value="{{  old('gaji') }}">
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
