@extends('layouts.appadmin')

@section('componentcss')
    <style>

    </style>
@endsection

@section('content')

    <table id="emails_table" class="display" style="width:100%">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Email</th>
            <th class="text-center">Country</th>
            <th class="text-center">Date</th>
        </tr>
        </thead>
        <tbody>
        @if(!$emails->isEmpty())
            @foreach ($emails as $email)
                <tr>
                    <td>{{$email->id}}</td>
                    <td>{{$email->email}}</td>
                    <td>{{$email->country}}</td>
                    <td>{{$email->created_at}}</td>
                </tr>
            @endforeach
        @else
            <h1>No Emails!</h1>
        @endif
        </tbody>
    </table>

@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            //datatables
            $('#emails_table').DataTable({
                "pageLength": 10,
                "columnDefs": [ {
                    "className": "dt-center",
                    "targets": "_all"
                } ]
            });
        });
    </script>
@endsection
