
    
    <!--
    <link href="files/bootstrap.min.css" rel="stylesheet">
    
    <link href="files/bootstrap-theme.min.css" rel="stylesheet">
    

    <script src="files/jquery.min.js">
    </script>
    <script src="files/bootstrap.min.js">
    </script>-->

@extends('layouts.Tapp')

@section('content')
    <div class="container">
        <div class="page-header" id="home_text" contenteditable="">
            {!! html_entity_decode($hometext) !!}
        </div>
        <h2>Kava</h2>
        <div id="tablecontent"></div>
        
        </script> <button class="btn btn-danger" onclick="del()">delete
        row(s)</button> <button class="btn btn-warning" onclick="add()">add
        row</button><br>
        <br>
        <button class="btn btn-primary" onclick="save()">Save Page</button>
        <div id="save_message"></div>
    
    </div>
        <script>
            var token = '{{ Session::token() }}';
            var urlChange = '{{ route('changeText') }}';
    
        </script>
<script src="{{ URL::to('src/js/Thome.js') }}"></script>
<link href="{{ URL::to('src/css/style1.css') }}" rel="stylesheet">


@endsection