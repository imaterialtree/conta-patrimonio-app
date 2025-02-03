@extends('layouts.guest')

@section('content')
    @include('comissao.partials.search-form', [
        'route' => route('guest.patrimonios.show'),
        'marginBottom' => '2em',
    ])
@endsection
