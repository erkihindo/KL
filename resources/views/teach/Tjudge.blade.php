
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
    
    
    <script>
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
                                    <th>Nr.</th>
                                    <th>Üleslaadija</th>
                                    <th>Kood</th>
                                    <th>Töö</th>
                                    <th>Link</th>
                                </tr>
                            </thead>
                            <tbody id="Body">
                                @foreach($uploads as $upload)
                                <tr>
                                    <td>{{ $upload->id }}</td>
                                    <td>{{ $upload->user->name }}</td>
                                    <td>{{ $upload->user->student->code }}</td>
                                   <td>{{ $upload->test->name }}</td>
                                   <td><a href="{{  URL::to('TviewUpload') . "/". $upload->id  }}">Vaata</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr ALIGN="center">
                    <td>
                        <input id="punkt" type="text" placeholder="Punktid">
                    </td> 
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
                            <p id="save_message"></p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <link href="{{ URL::to('src/css/Toverall.css') }}" rel="stylesheet">
        <link href="{{ URL::to('src/css/Tenter.css') }}" rel="stylesheet">
        <script src="{{ URL::to('src/js/Tjudge.js') }}">
        </script> 
        
    </div>

@endsection