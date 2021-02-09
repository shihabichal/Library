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
            <h1>Edit Admin</h1>
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
                <h3 class="card-title">Edit/ Admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form action="{{ route('dashboard.member.update', $data->id_member) }}" method="post" role="form">
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
                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama" required value="{{  old('nama') ?? $data->nama }}">
              </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" placeholder="Nama" required value="{{  old('alamat') ?? $data->alamat }}">
              </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Gender</label>
                <select name="gender" class=" form-control" required value="{{  old('gender') ?? $data->gender }}">
                    <option value="pria">Pria</option>
                    <option value="wanita">Wanita</option>
                </select>
              </div>
          <div class="form-group">
            <label for="exampleInputEmail1">No HP</label>
            <input type="text" name="nope" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{  old('nope') ?? $data->nope }}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{  old('email') ?? $data->email }}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password"  value="{{  old('password') }}">
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
