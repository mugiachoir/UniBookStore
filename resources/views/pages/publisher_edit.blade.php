@extends('layout.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Penerbit</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <form method="post" action="{{ url('publisher/edit/' . $publisher->id) }}" enctype="multipart/form-data"
                        novalidate>
                        @csrf
                        @method('put')

                        <input type="hidden" name="id" value="{{ $publisher->id }}">
                           <div class="form-group">
                            <h5>ID Penerbit <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="publisher_id"
                                    class="form-control  @error('publisher_id') is-invalid @enderror"
                                    value="{{ old('publisher_id', $publisher->publisher_id) }}">
                                @error('publisher_id')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Nama Penerbit <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="name"
                                    class="form-control  @error('name') is-invalid @enderror"
                                    value="{{ old('name', $publisher->name) }}">
                                @error('name')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                     
                        <div class="form-group">
                            <h5>Alamat <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="address"
                                    class="form-control  @error('address') is-invalid @enderror"
                                    value="{{ old('address', $publisher->address) }}">
                                @error('address')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Kota <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="city"
                                    class="form-control  @error('city') is-invalid @enderror"
                                    value="{{ old('city', $publisher->city) }}">
                                @error('city')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>Telepon <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="phone_number"
                                    class="form-control  @error('phone_number') is-invalid @enderror"
                                    value="{{ old('phone_number', $publisher->phone_number) }}">
                                @error('phone_number')
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
