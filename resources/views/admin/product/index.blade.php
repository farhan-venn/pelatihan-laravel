@extends('admin.layout.main')

@section('title', 'Manage Data Product Property')

@section('css')
<!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
@endsection

@section('content')

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <a href="{{ route('product.create') }}" class="btn btn-primary">Tambah Data Produk</a>
                  </div>
                  <div class="card-body">
                    @if (Session::has('success'))
                    <div class="alert alert-info">
                      {{ Session::get('success') }}
                    </div>
                    @endif
                    @if (Session::has('error'))
                    <div class="alert alert-info">
                      {{ Session::get('error') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Nama Produk</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>                                 
                          @foreach ($products as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{!! $data->desc !!}</td>
                                <td>{{ $data->price }}</td>
                                <td>{{ $data->qty }}</td>
                                <td>
                                  <a href="{{ route('user-admin.edit', $data->id) }}" class="btn btn-info"><i class="fa fa-edit"></i>Edit</a>
                                  <a href="{{ route('user-admin.delete', $data->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus</a>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection

@section('js')
<!-- JS Libraries -->
  <script src="assets/modules/datatables/datatables.min.js"></script>
  <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#table-1').DataTable();
    })
  </script>
@endsection