@extends('admin.layout.main')

@section('title', 'Create Product Property')

@section('css')
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="assets/modules/codemirror/lib/codemirror.css">
  <link rel="stylesheet" href="assets/modules/codemirror/theme/duotone-dark.css">
  <link rel="stylesheet" href="assets/modules/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="assets/css/dropify.min.css">
@endsection

@section('content')
<div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Property Data</h4>
                </div>
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Foto Produk 1</label>
                            <div class="input-group">
                                <input type="file" nama="file[]" class="dropify">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Foto Produk 2</label>
                            <div class="input-group">
                                <input type="file" name="file[]" class="dropify">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Foto Produk 3</label>
                            <div class="input-group">
                                <input type="file" name="file[]" class="dropify">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Produk</label>
                            <div class="input-group">
                                <textarea class="summernote" name="desc" id="summernote"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Harga Produk</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-tags"></i>
                                    </div>
                                </div>
                                <input type="number" class="form-control" name="price">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Qty Produk</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <input type="number" class="form-control" name="qty">
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('js')
  <!-- JS Libraies -->
  <script src="assets/modules/summernote/summernote-bs4.js"></script>
  <script src="assets/js/dropify.min.js"></script>
  <script>
    $('.dropify').dropify();
    $("#summernote").summernote({
        dialogsInBody: true,
        minHeight: 250,
    });
  </script>
@endsection