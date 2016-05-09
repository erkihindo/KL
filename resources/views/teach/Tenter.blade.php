
@extends('layouts.Tapp')

@section('content')
    
    <!-- Optional theme 
    <link href="files/bootstrap-theme.min.css" rel="stylesheet">
    <!-- Latest compiled and minified JavaScript -->

    <script src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js">
    </script>
    
    
    <script src="{{ URL::to('src/js/bootstrap-editable.js') }}">
    </script>
    <link href="{{ URL::to('src/css/style1.css') }}" rel="stylesheet">
   <script src="{{ URL::to('src/js/MSelectDBox.js') }}">
    </script>
    
    <script> var testList = []
    
    @foreach($tests as $test)
        testList.push("{{$test}}");
    @endforeach
    
    var token = '{{ Session::token() }}';
    var urlEnter = '{{ route('enterGrade') }}';
    
    </script>
    
    <div class="container" id="container">
        <h1>Hinnete sisestus</h1>
        <table class="table table-bordered table-striped fixed" id="user"
        style="clear: both">
            <tbody>
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
                <tr  ALIGN="center">
                    <TD >
                       <input id="test"  type="text" placeholder="Töö">
                    </TD>  
                    <td>
                       <input id="hinne" type="text" placeholder="Hinne">
                    </td>
                </tr>
                <tr  ALIGN="center">
                    <td colspan="2" >
                        <textarea id="comments" placeholder="Kommentaar" name="paragraph_text" style="width:100%;" rows="2"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div>
                            <input id="submit_but" class="btn btn-primary" onclick="save()"
                            type="button"
                            value="Esita">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <p id="save_message"></p>
        <link href="{{ URL::to('src/css/Toverall.css') }}" rel="stylesheet">
        <link href="{{ URL::to('src/css/Tenter.css') }}" rel="stylesheet">
        <script src="{{ URL::to('src/js/Tenter.js') }}">
        </script> 
        
    </div>

@endsection