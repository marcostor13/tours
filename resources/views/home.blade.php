@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="alto row justify-content-between">
        <div class="col-3 col-sm-4 col-lg-3 col-xl-2 bg-color1 p-0">
            <menu-component name-page="{{$page}}"></menu-component>
        </div>

        

        <div class="col-9 col-sm-8 col-lg-9 col-xl-10 bg-color3 p-0">
            <content-component name-page="{{$page}}"></content-component>            
        </div>       

    </div>
</div>

<div class="modal-container container-fluid hide-force">
    <div id="modal" class="col-8 rounded bg-white p-5">
        <div class="d-flex justify-content-between align-items-center">
            <h3 id="modal-title">Titulo modal</h3>
            <i id="modal-close" class="far fa-window-close cursor"></i>
        </div>
        <div id="modal-content"></div>
    </div>
</div>

@endsection
