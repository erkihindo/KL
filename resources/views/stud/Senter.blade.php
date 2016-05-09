@extends('layouts.Sapp')

@section('content')
    <script src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js">
    </script>
    
    
    <script src="{{ URL::to('src/js/bootstrap-editable.js') }}">
    </script>
    <link href="{{ URL::to('src/css/Senter.css') }}" rel="stylesheet">
    <div class="container">
        <div class="page-header">
            <h1>Tööde esitamine</h1>
            <h3></h3>
            <p id="tooNimi">{{ $test->name }}</p>
        </div>
        
<!--        <input id="files" multiple name="files[]" type="file">
        <output id="list"></output> 
        <a class="btn btn-warning" href=
        "toodTudeng.html">Tagasi listi</a>
        <button onclick="save()" class="btn btn-info">Esita
        töö</button> -->
        <form action="{{ route('test.save') }}" method="post" id="myForm" enctype="multipart/form-data">

        <table class="table table-bordered table-striped fixed" id="user"
               style="clear: both">
            <tbody>
                <tr>
                    <td colspan="2">
            
                    <div class="form-group">
                        <label for="fily">Please choose text file</label>
                        <input type="file" name="fily" class="form-control" id="files">
                        <input type="hidden" name="test" value="{{ $test->id }}">
                        <output id="list"></output> 
                    </div>

                    
                </td>
            </tr>
            <tr>
                    <td colspan="2" id="names"></td>
                </tr>
                <tr id="nameSel">
                    <td colspan="2">
                        <table class="display" id="table">
                            <thead>
                                <tr>
                                    <th>Nimi</th>
                                    <th>Kood</th>
                                </tr>
                            </thead>
                            <tbody id="Body">
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $student -> name}}</td>
                                    <td>{{ $student -> code}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
        </tbody>
        </table>
            <a class="btn btn-danger" href="{{  url('/Stests') }}" onclick="">Back</a>
            <button type="submit" class="btn btn-primary" >Submit</button>
         
                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                </form>
        <link href="{{ URL::to('src/css/Toverall.css') }}" rel="stylesheet">
        
        <script src="{{ URL::to('src/js/Senter.js') }}">
        </script>
        <script>
            var enterComrad = '{{ route('enterComrad') }}';
            var token = '{{ Session::token() }}'; 
            var testID = '{{ $test->id }}';
            var userCode = '{{ $userCode->code }}';
        </script>
    </div>

@endsection