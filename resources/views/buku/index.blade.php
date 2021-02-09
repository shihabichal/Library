@extends('layout.app')
@section('title') Admin @endsection

@section('body')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Buku</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="{{ route('dashboard.buku.create') }}" class="btn btn-primary">Tambah</a>
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
                <h3 class="card-title">List Buku</h3>
              </div>
              <!-- /.card-header -->

                <div class="card-body">
                    @if (Session::has('pesan'))
                        <div class="alert alert-{{ Session::get('jenis') }}">{{ Session::get('pesan') }}</div>
                    @endif
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Cover</th>
                          <th>Kategori</th>
                          <th>Judul</th>
                          <th>Pengarang</th>
                          <th>Penerbit</th>
                          <th>Tahun Terbit</th>
                          <th>ISBN</th>
                          <th>Jumlah</th>
                          <th>Lokasi</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($buku as $a)
                        <tr>
                          <td>{{  $a->gambar }}</td>
                          <td>{{  $a->categorize['nama']}}</td>
                          <td>{{  $a->judul }}</td>
                          <td>{{  $a->pengarang }}</td>
                          <td>{{  $a->penerbit }}</td>
                          <td>{{  $a->tahun_terbit }}</td>
                          <td>{{  $a->ISBN }}</td>
                          <td>{{  $a->jumlah }}</td>
                          <td>{{  $a->lokasi }}</td>
                          <td>{{  $a->status }}</td>
                          {{-- <td>
                            <a href="{{ route('dashboard.admin.edit', $a->id) }}" class="btn btn-xs btn-primary">Edit</a>
                            <form action="{{ route('dashboard.admin.delete', $a->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('Yakin?')" class="btn btn-xs btn-danger">Delete</a>
                            </form>
                            </td> --}}
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
