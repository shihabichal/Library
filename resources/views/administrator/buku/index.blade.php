@extends('layout.app')
@section('title') Buku @endsection

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
                <a href="{{ route('admin.buku.create') }}" class="btn btn-primary">Tambah</a>
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
                          <td>
                              @if($a->gambar==null)
                              <img class="card-img-top" src="{{ url('images/no-image.jpg') }}" style="width:80px;max-wdith:100%;">
                              @else
                              <img class="card-img-top" src="{{ url('images/uploads', $a->gambar) }}" style="width:80px;max-wdith:100%;">
                              @endif
                            </td>
                          <td>{{  $a->nama}}</td>
                          <td>{{  $a->judul }}</td>
                          <td>{{  $a->pengarang }}</td>
                          <td>{{  $a->penerbit }}</td>
                          <td>{{  $a->tahun_terbit }}</td>
                          <td>{{  $a->isbn }}</td>
                          <td>{{  $a->jumlah }}</td>
                          <td>{{  $a->lokasi }}</td>
                          <td>{{  $a->status }}</td>
                          <td>
                              <form action="{{ route('admin.buku.delete', $a->id_buku) }}" method="POST" class="inline-block">
                                  @csrf
                                @method('delete')
                              <a href="{{ route('admin.buku.edit', $a->id_buku) }}" class="btn btn-xs btn-primary">Edit</a>

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
