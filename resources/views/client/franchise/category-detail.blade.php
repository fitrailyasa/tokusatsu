@extends('layouts.client.app')

@section('title', $category->fullname ?? '')

@section('textFranchise', 'rounded aktif')

@section('content')

    @include('client.data')

@endsection
