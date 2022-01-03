@extends('layout.master')
@section('title','Home')
@section('content')
<div class="app-content container center-layout mt-2">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <style>
            h5{
                color: black;
            }
        </style>
        <div class="content-body" style="min-height: 600px;">
           @include('filter.include.search')
           @include('filter.include.list')
            
        </div>
    </div>
</div>
@stop()