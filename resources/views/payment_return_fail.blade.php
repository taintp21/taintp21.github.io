@extends('layouts.app')

@section('title', 'Thanh toán thất bại')

@section('content')
    <h1 class="text-white fw-bold text-center mb-5 iCiel">THANH TOÁN THẤT BẠI</h1>
    @if (\Session::has('message'))
        <div class="alert alert-danger">
            {!! \Session::get('message') !!}
        </div>
    @endif
@endsection
