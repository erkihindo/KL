@extends('layouts.Tapp')

@section('content')
 
    <div class="container" >
        <div contenteditable="" id="about_text">
             {!! html_entity_decode($abouttext) !!}
        </div>    
      
        
        <button class="btn btn-primary" onclick="save()">Save
        text</button>
        <p id="save_message"></p>
        <script>
            var token = '{{ Session::token() }}';
            var urlChange = '{{ route('changeText') }}';
    
        </script>
        <script src="{{ URL::to('src/js/Tabout.js') }}">
        </script>
    </div>

         
@endsection