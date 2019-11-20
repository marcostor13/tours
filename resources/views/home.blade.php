@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="alto row justify-content-between">
        <div class="col-3 col-sm-4 col-lg-3 col-xl-2 bg-color1 p-0">
            <menu-commponent name-page="{{$page}}"></menu-commponent>
        </div>

        

        <div class="col-9 col-sm-8 col-lg-9 col-xl-10 bg-color3 p-0">
            <content-commponent name-page="{{$page}}"></content-commponent>            
        </div>

    </div>
</div>
@endsection
