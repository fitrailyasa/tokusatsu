@extends('layouts.client.app')

@section('title', $category->fullname ?? '')

@section('textCategory', 'rounded aktif')

@section('content')

    @include('client.data')

@endsection
