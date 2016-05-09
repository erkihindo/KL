@extends('layouts.Sapp')

@section('content')
    

    <script src="{{ URL::to('src/js/bootstrap-editable.js') }}">
    </script>
    <link href="{{ URL::to('src/css/Toverall.css') }}" rel="stylesheet">
    <script src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js">
    </script>
  
    <link href="{{ URL::to('src/css/style3.css') }}" rel="stylesheet">
    <link href="{{ URL::to('src/css/Toverall2.css') }}" rel="stylesheet">
    
    <div class="container">
        <h1>Hinded</h1>
        <table class="display" id="table">
            <thead>
                <tr>
                    <th>Töö</th>
                    <th>Punktid</th>
                    <th>Hinne</th>
                    <th>Komm</th>
                </tr>
            </thead>
            <tbody id="Body">
                @foreach($grades as $grade)
                <tr>
                    <td>{{ $grade->test->name }}</td>
                    <td>{{ $grade->points }}</td>
                    <td>{{ $grade->grade }}</td>
                    <td>{{ $grade->description }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <script src="{{ URL::to('src/js/Soverall.js') }}">
        </script>
   
    </div>

@endsection