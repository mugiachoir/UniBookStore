@extends('layout.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Buku</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <form method="post" action="{{ url('book/edit/' . $book->id) }}" enctype="multipart/form-data"
                        novalidate>
                        @csrf
                        @method('put')

                        <input type="hidden" name="id" value="{{ $book->id }}">
                        <div class="form-group">
                            <h5>Title <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="title"
                                    class="form-control  @error('title') is-invalid @enderror"
                                    value="{{ old('title', $book->title) }}">
                                @error('title')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Kode Buku <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="book_id"
                                    class="form-control  @error('book_id') is-invalid @enderror"
                                    value="{{ old('book_id', $book->book_id) }}">
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
                        
                                                    <option value="Keilmuan" @selected(old('category') == "Keilmuan" || $book->category == "Keilmuan")>
                                                        Keilmuan</option>
                                                    <option value="Bisnis" @selected(old('category') == "Bisnis" || $book->category == "Bisnis")>
                                                        Bisnis</option>
                                                    <option value="Novel" @selected(old('category') == "Novel" || $book->category == "Novel")>
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
                                    class="form-control  @error('publisher_id') is-invalid @enderror">
                                    <option value="" disabled>- Select publisher -</option>
                                    @foreach ($publishers as $publisher)
                                        <option value="{{ $publisher->id }}" @selected(old('publisher_id') == $publisher->id || $book->publisher_id == $publisher->id)>
                                            {{ $publisher->name }}</option>
                                    @endforeach
                                </select>
                                @error('publisher_id')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Price <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="price"
                                    class="form-control  @error('price') is-invalid @enderror"
                                    value="{{ old('price', $book->price) }}">
                                @error('price')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Stock <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="stock"
                                    class="form-control  @error('stock') is-invalid @enderror"
                                    value="{{ old('stock', $book->stock) }}">
                                @error('stock')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-xs-right mt-2">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                        </div>
                    </form>


                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->

    </div>
@endsection
