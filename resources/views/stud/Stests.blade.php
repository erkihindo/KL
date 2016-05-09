@extends('layouts.Sapp')

@section('content')
 
  
    <div class="container">
        <div class="page-header">
            <h1>Tööde esitamine</h1>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tunniteema</th>
                    <th>Esitamise tähtaeg</th>
                    <th>Seisund</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tests as $index => $test)
                @if(in_array($index +1, $doneTests))
                <tr class="active" >
                    <td>{{$index +1}}</td>
                    <td>{{ $test->name }}</td>
                    <td>01/01/2017</td>
                    <td>Esitatud</td>
                </tr>
                @else
                <tr class="danger" onclick="window.open('{{ URL::to('Senter') . "/". $test->id }}','_self');" style="cursor: pointer;">
                    <td>{{$index +1}}</td>
                    <td>{{ $test->name }}</td>
                    <td>01/01/2017</td>
                    <td>Tegemata</td>
                </tr>
                @endif
                
            @endforeach

            </tbody>
        </table>
       
    </div>
<link href="{{ URL::to('src/css/Stests.css') }}" rel="stylesheet">
@endsection