@extends('template')

@section('isi')
    <!-- About Me Box -->
    <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="box-title">{{ $article->judul_article }}</h3>
        </div>
        <div class="box-header">
            <a class="fa fa-arrow-left" href="{{ route('article.index') }}"><span style="font-family: 'Microsoft Sans Serif', Tahoma, Arial, Verdana, Sans-Serif; font-size: small;">&nbspKembali ke list Article</span></a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <strong><i class="fa fa-file-text-o margin-r-5"></i>Isi Article</strong>

            <p class="text-muted">
            {{ $article->isi_article }}
            </p>

            <hr>
        </div>
        <!-- /.box-body -->

    </div>
    <!-- /.box -->

@endsection