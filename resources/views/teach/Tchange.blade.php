
@extends('layouts.Tapp')

@section('content')
   

    <script src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js">
    </script>
    
    
    <script src="{{ URL::to('src/js/bootstrap-editable.js') }}">
    </script>
    <link href="{{ URL::to('src/css/style1.css') }}" rel="stylesheet">
    <script src="{{ URL::to('src/js/MSelectDBox.js') }}">
    </script>
    <script> 
    
    var token = '{{ Session::token() }}';
    var urlChange = '{{ route('changeGrade') }}';
    
    </script>
    
    
    <div class="container" id="container">
        <h1>Hinnete muutmine</h1>
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
                                    <th>Punktid</th>
                                    <th>Hinne</th>
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
                                   <td>{{ $upload->grade->points }}</td>
                                   <td>{{ $upload->grade->grade }}</td>
                                   <td><a href="{{  URL::to('TviewUpload') . "/". $upload->id  }}">Vaata</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr ALIGN="center">
                     <td>
                       <input id="punkt" type="text" placeholder="Uued punktid">
                    </td>
                    <td>
                        <input id="hinne" type="text" placeholder="Uus hinne">
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
                            <input class="btn btn-primary" onclick="save()"
                            id="submit_but" type="button"
                            value="Muuda hinnet">
                            <p id="save_message"></p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <link href="{{ URL::to('src/css/Toverall.css') }}" rel="stylesheet">
        <link href="{{ URL::to('src/css/Tenter.css') }}" rel="stylesheet">
        <script src="{{ URL::to('src/js/Tchange.js') }}"></script>
        
        
    </div>

@endsection