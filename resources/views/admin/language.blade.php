@extends('layouts.appadmin')

@section('componentcss')
    <style>

    </style>
@endsection

@section('content')

    <button class="add_modal btn btn-success">Add new Language</button>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="modal_add">

        <form method="post" action="{{url('/admin/add_language')}}" enctype="multipart/form-data">

            @csrf
            <h3>Add new Language</h3>
            <p>All values must be inserted</p>
            <div class="row">
                <label for="lang">Language (iso code) :</label>
                <input id="lang" name="lang" type="text" class="form-control">
            </div>
            <div class="row" style="margin-top: 20px;">
                <button type="submit" class="btn btn-success">Save Language</button>
                <button class="close_new_modal btn btn-danger">Close</button>
            </div>

        </form>

    </div>

    <table id="lang_table" class="display" style="width:100%">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Language</th>
            <th class="text-center">Delete</th>
        </tr>
        </thead>
        <tbody>
        @if(!$languages->isEmpty())
            @foreach ($languages as $language)
                <tr>
                    <td>{{$language->id}}</td>
                    <td>{{$language->lang}}</td>
                    <td>
                        <button class="delete_lang btn btn-danger" data-id="{{$language->id}}">Delete</button>
                    </td>
                </tr>
            @endforeach
        @else
            <h1>No Language!</h1>
        @endif
        </tbody>
    </table>

@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            //datatables
            $('#lang_table').DataTable({
                "pageLength": 10,
                "columnDefs": [ {
                    "className": "dt-center",
                    "targets": "_all"
                } ]
            });

            //delete language
            $('.delete_lang').click(function () {

                if(!confirm('Are you sure you want to delete language?')){
                    return false;
                }

                let id = $(this).data('id');
                $.ajax({
                    url: '{{ url('/admin/delete_language') }}',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {'id': id},
                    type: 'post',
                    success: function (ret) {
                        location.reload();
                    },
                    error: function (err) {
                        alert("Error");
                    }
                })
            });
        });
    </script>
@endsection
