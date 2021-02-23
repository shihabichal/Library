@extends('layout.app')
@section('title') Admin @endsection

@section('body')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">1
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="{{ route('dashboard.admin.create') }}" class="btn btn-primary">Tambah</a>
            </ol>
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
                <h3 class="card-title">List Admin</h3>
              </div>
              <!-- /.card-header -->

                <div class="card-body">
                    @if (Session::has('pesan'))
                        <div class="alert alert-{{ Session::get('jenis') }}">{{ Session::get('pesan') }}</div>
                    @endif
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>No HP</th>
                          <th>Email</th>
                          <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($admin as $a)
                        <tr>
                          <td>{{  $a->id }}</td>
                          <td>{{  $a->nama }}</td>
                          <td>{{  $a->alamat }}</td>
                          <td>{{  $a->nohp }}</td>
                          <td>{{  $a->email }}</td>
                          <td>
                              <a href="{{ route('dashboard.admin.edit', $a->id) }}" class="btn btn-xs btn-primary">Edit</a>
                            <form action="{{ route('dashboard.admin.delete', $a->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('Yakin?')" class="btn btn-xs btn-danger">Delete</a>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>
                </div>

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
