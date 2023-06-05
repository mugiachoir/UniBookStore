@extends('layout.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Publisher Section -->
            <div class="row">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Daftar Penerbit <span class="badge badge-pill badge-danger">
                                    {{ count($publishers) }} </span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID Penerbit</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Kota</th>
                                            <th>Telepon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($publishers as $publisher)
                                            <tr>
                                                <td>{{ $publisher->publisher_id }}</td>
                                                <td>{{ $publisher->name }}</td>
                                                <td>{{ $publisher->address }}</td>
                                                <td>{{ $publisher->city }}</td>
                                                <td>{{ $publisher->phone_number }}</td>
                                                <td style="display:flex;">
                                                    <a href="{{ url('publisher/edit/' . $publisher->id) }}"
                                                        class="btn btn-info" title="Edit publisher"><i
                                                            class="fa fa-pencil"></i> Edit </a>

                                                    <form method="POST" action="{{ route('publisher.delete',$publisher->id) }}"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger delete-button"
                                                            onclick="confirm('delete this publisher?')">
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

                    <!--   ------------ Add Publisher Section -------- -->


              
                    <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Tambahkan Penerbit </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('publisher.store') }}" enctype="multipart/form-data"
                                    novalidate>
                                    @csrf

                                     <div class="form-group">
                                        <h5>ID Penerbit <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="publisher_id"
                                                class="form-control @error('publisher_id') is-invalid @enderror"
                                                value="{{ old('publisher_id') }}">
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
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                   

                                    <div class="form-group">
                                        <h5>Alamat<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="address"
                                                class="form-control @error('address') is-invalid @enderror"
                                                value="{{ old('address') }}">
                                            @error('address')
                                                <div class="invalid-feedback text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Kota<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="city"
                                                class="form-control @error('city') is-invalid @enderror"
                                                value="{{ old('city') }}">
                                            @error('city')
                                                <div class="invalid-feedback text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Telepon<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="phone_number"
                                                class="form-control @error('phone_number') is-invalid @enderror"
                                                value="{{ old('phone_number') }}">
                                            @error('phone_number')
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
