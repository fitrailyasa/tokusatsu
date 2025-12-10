@extends('layouts.client.app')

@section('title', $category->fullname ?? '')

@section('textEra', 'rounded aktif')

@section('content')

    @include('client.data')

@endsection
