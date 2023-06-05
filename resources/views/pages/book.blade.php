@extends('layout.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Daftar Buku <span class="badge badge-pill badge-danger">
                                    {{ count($books) }} </span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID Buku</th>
                                            <th>Kategori</th>
                                            <th>Nama Buku</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Penerbit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($books as $book)
                                            <tr>
                                                <td>{{ $book->book_id }}</td>
                                                <td>{{ $book->category }}</td>
                                                <td>{{ $book->title }}</td>
                                                <td>{{ number_format($book->price, 0, ',', '.') }}</td>
                                                <td>{{ $book->stock }}</td>
                                                <td>{{ $book->publisher->name }}</td>
                                                <td style="display:flex;">
                                                    <a href="{{ url('book/edit/' . $book->id) }}"
                                                        class="btn btn-info" title="Edit Book"><i
                                                            class="fa fa-pencil"></i> Edit </a>

                                                    <form method="POST" action="{{ route('book.delete',$book->id) }}"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger delete-button"
                                                            onclick="confirm('delete this book?')">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->

                    <!--   ------------ Add Book Section -------- -->
                  <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Book </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('book.store') }}" enctype="multipart/form-data"
                                    novalidate>
                                    @csrf
                                    <div class="form-group">
                                        <h5>Judul Buku <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="title"
                                                class="form-control @error('title') is-invalid @enderror"
                                                value="{{ old('title') }}">
                                            @error('title')
                                                <div class="invalid-feedback text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>ID Buku <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="book_id"
                                                class="form-control @error('book_id') is-invalid @enderror"
                                                value="{{ old('book_id') }}">
                                            @error('book_id')
                                                <div class="invalid-feedback text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Kategori <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category"
                                                class="form-control @error('category') is-invalid @enderror">
                                                <option value="" @selected(old('category') == '') disabled>- Pilih Kategori -
                                                </option>
                        
                                                    <option value="Keilmuan" @selected(old('category') == "Keilmuan")>
                                                        Keilmuan</option>
                                                    <option value="Bisnis" @selected(old('category') == "Bisnis")>
                                                        Bisnis</option>
                                                    <option value="Novel" @selected(old('category') == "Novel")>
                                                        Novel</option>
                                        
                                            </select>
                                            @error('category')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Publisher <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="publisher_id"
                                                class="form-control @error('publisher_id') is-invalid @enderror">
                                                <option value="" @selected(old('publisher_id') == '') disabled>- Select
                                                    publisher -
                                                </option>
                                                @foreach ($publishers as $publisher)
                                                    <option value="{{ $publisher->id }}" @selected(old('publisher_id') == $publisher->id)>
                                                        {{ $publisher->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('publisher_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Harga <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="price"
                                                class="form-control @error('price') is-invalid @enderror"
                                                value="{{ old('price') }}">
                                            @error('price')
                                                <div class="invalid-feedback text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Stok <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="stock"
                                                class="form-control @error('stock') is-invalid @enderror"
                                                value="{{ old('stock') }}">
                                            @error('stock')
                                                <div class="invalid-feedback text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

               
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
