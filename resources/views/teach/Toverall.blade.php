
@extends('layouts.Tapp')

@section('content')

    
    <script src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js">
    </script>
    
    <script src="{{ URL::to('src/js/bootstrap-editable.js') }}">
    </script>
    
    <div class="container" id="container">
        <h1>Hinded</h1>
        <table class="display table" id="table">
                            <thead>
                                <tr>
                                    <th>Nimi</th>
                                    <th>Kood</th>
                                     @foreach($tests as $test)
                                    <td>{{$test->name }}</td>
                                    @endforeach
                                    
                                </tr>
                            </thead>
                            <tbody id="Body">
                                @foreach($students as $student)
                                
                                <tr >
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->student->code }}</td>
                                    @foreach($tests as $test)
                                    {{-- */$hasTest=0;/* --}}
                                    {{-- */$hasGrade=0;/* --}}
                                        @foreach($student->uploaddoers as $doer)
                                            @if($doer->upload->test->id ==$test->id)
                                                {{-- */$hasTest=1;/* --}}
                                                @if($doer->upload->grade)
                                                    {{-- */$hasGrade=1;/* --}}
                                                    {{-- */$points= $doer->upload->grade->points;/* --}}
                                                    {{-- */$grade= $doer->upload->grade->grade;/* --}}
                                                @endif
                                            @endif
                                        @endforeach
                                        @if($hasGrade)
                                            @if($grade =="0")
                                                <td class="warning">{{ $points }} / {{ $grade }}</td>
                                            @else
                                                <td class="success">{{ $points }} / {{ $grade }}</td>
                                            @endif
                                            
                                        @else
                                            @if($hasTest)
                                                <td class="info">hindamata</td>
                                            @else
                                                <td class="danger">N/A</td>
                                            @endif
                                            
                                        @endif
                                    @endforeach
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
       
        <link href="{{ URL::to('src/css/Toverall.css') }}" rel="stylesheet">
        <link href="{{ URL::to('src/css/Toverall2.css') }}" rel="stylesheet">
        
        <script src="{{ URL::to('src/js/Toverall.js') }}">
        </script> 
        
    </div>

@endsection