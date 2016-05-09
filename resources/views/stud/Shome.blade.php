@extends('layouts.Sapp')

@section('content')
    
    
    

    <div class="container">
        <div class="page-header">
            {!! html_entity_decode($hometext) !!}
        </div>
        <h2>Kava</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tunniteema</th>
                    <th>Materjalid</th>
                    <th>Kommentaar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Sissejuhatus</td>
                    <td>
                        <a href="">Link</a>
                    </td>
                    <td>Tunnis moodustatakse grupid.</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Prototüüpimine paberil</td>
                    <td>
                        <a href="">Link</a>
                    </td>
                    <td>Too kaasa paberit.</td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection