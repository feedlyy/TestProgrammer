@extends('template')


@section('isi')
    @if(session()->has('status'))
        <script>
            $().ready(function (e) {
                swal({
                    title: "Success!",
                    text: "Data Telah Ditambahkan",
                    icon: "success",
                    button: false,
                    timer: 2000
                });
            })
        </script>
    @elseif(session()->has('update'))
        <script>
            $().ready(function (e) {
                swal({
                    title: "Success!",
                    text: "Data Telah Di Perbarui",
                    icon: "success",
                    button: false,
                    timer: 2000
                });
            })
        </script>
    @elseif(session()->has('hapus'))
        <script>
            $().ready(function (e) {
                swal({
                    title: "Success!",
                    text: "Data Telah Di Hapus",
                    icon: "success",
                    button: false,
                    timer: 2000
                });
            })
        </script>
    @endif

    <script type="text/javascript">
        /*ini javascript buat konfirmasi delete*/
        $(document).ready(function(){
            $(".hapus").submit(function(event) {
                var form = this;
                event.preventDefault();
                swal({
                    title: 'Apakah Anda Yakin?',
                    text: "Data yang hilang tidak akan kembali",
                    icon: 'warning',
                    buttons: true
                }).then(function (isConfirm) {
                    if (isConfirm){
                        form.submit();
                    } else {
                        swal('Cancelled', '', 'error');
                    }
                })
            });
        });
    </script>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">List Article</h3>
        </div>
        <a style="margin-left: 1%;" href="{{ route('article.create') }}"><button class="fa fa-plus btn btn-primary">Tambah Article</button></a>
        <!-- /.box-header -->

        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID Article</th>
                    <th>Judul Article</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($article as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->judul_article }}</td>
                    <td>
                        {!! Form::open(['route' => ['article.destroy', $data->id], 'method' => 'delete', 'class' => 'hapus']) !!}
                        <a href="{{ route('article.show', $data->id) }}">
                            <input type="button" class="btn btn-primary" value="Show">
                        </a>
                        <a href="{{ route('article.edit', $data->id) }}">
                            <input type="button" class="btn btn-warning" value="Edit">
                        </a>
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger hapus']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection