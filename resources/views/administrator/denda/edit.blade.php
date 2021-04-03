@extends('layout.app')
@section('title') DENDA @endsection

@section('body')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Denda</h1>
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
                <h3 class="card-title">Edit Denda</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form action="{{ route('admin.denda.update', $data->id_denda) }}" method="post" role="form">
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
                <label for="exampleInputEmail1">Nominal</label>
                <input type="text" name="nominal" class="form-control" id="exampleInputEmail1" placeholder="Nama" required value="{{  old('nama') ?? $data->nama }}">
              </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" id="exampleInputEmail1" placeholder="Nama" required value="{{  old('alamat') ?? $data->alamat }}">
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
