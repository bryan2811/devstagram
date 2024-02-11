@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <x-posts-list :posts="$posts" />
@endsection
