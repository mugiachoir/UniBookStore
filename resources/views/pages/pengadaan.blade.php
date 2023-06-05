@extends('layout.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Stok Buku <span class="badge badge-pill badge-danger">< 20</span></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Judul Buku</th>
                                <th>Stok</th>
                                <th>Publisher</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->stock }}</td>
                                    <td>{{ $book->publisher->name }}</td>
                                    <td>
                                        <a href="tel:{{ $book->publisher->phone_number }}" class="btn btn-primary">Call Publisher</a>
                                        <a href="https://wa.me/{{ $book->publisher->phone_number }}" class="btn btn-success">Whatsapp Publisher</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
@endsection
