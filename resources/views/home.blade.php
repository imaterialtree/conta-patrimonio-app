@extends('layouts.app')

@section('titulo', 'Home')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <h1>Tela inicial</h1>
            </div>
            <div class="row" style="display: inline-block;">
                <div class="top_tiles d-flex justify-content-between">
                    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 ">
                        <div class="tile-stats" style="height: 150px">
                            <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                            <p>Última contagem há</p>
                            <div class="count">172 dias</div>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6">
                        <div class="tile-stats" style="height: 150px">
                            <div class="icon"><i class="fa fa-comments-o"></i></div>
                            <div class="count">Nova contagem</div>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 ">
                        <div class="tile-stats" style="height: 150px">
                            <div class="icon"><i class="fa fa-check-square-o"></i></div>
                            <div class="count">Importar patrimônio</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
