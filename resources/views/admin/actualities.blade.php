@extends('layouts.appadmin')

@section('componentcss')
    <style>
        input[type=checkbox] + label {
            width: 60px;
            margin-bottom: 2px;
            text-align: center;
            padding: 2px 5px;
            border-radius: 4px;
            color: #fff;
        }

        input[type=checkbox]:checked + label {
            background-color: rgba(90, 120, 217, 1);
        }

        input[type=checkbox]:not(:checked) + label {
            background-color: #888;
        }
    </style>
@endsection

@section('content')

    <button class="add_modal btn btn-success">Add new Actualities</button>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="modal_add">

        <form method="post" action="{{url('/admin/add_actualities')}}" enctype="multipart/form-data">

            @csrf
            <h3>Add new Actualities</h3>
            <p>All values must be inserted</p>

            <div class="row">
                <div class="form-group">
                    <div class='input-group date datetimepicker1'>
                        <label>Date:</label>
                        <br>
                        <input name="date" type='text' class="form-control" />
                        <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                    </div>
                </div>
            </div>

            <div class="row">
                <label for="name">Name :</label>
                <input id="name" name="name" type="text" class="form-control">
            </div>
            <div class="row">
                <label>Text :</label>
                <textarea name="text" type="text" class="form-control"></textarea>
            </div>
            <div class="row" style="margin-top: 10px; margin-bottom: 10px;">
                @foreach($language as $lang)
                    <input name="lang_{{$lang->id}}" id="actualities_{{$lang->lang}}" type="checkbox" hidden>
                    <label for="actualities_{{$lang->lang}}" style="margin-left: 3px;">{{strtoupper($lang->lang)}}</label>
                @endforeach
            </div>

            <div class="row">
                <label for="photo_upload">Upload Images</label>
                <input type="file" name="photos[]" class="form-control uploaded_photo" id="photo_upload" multiple="">
            </div>

            <div class="row">
                <button type="submit" class="btn btn-success">Save Actualities</button>
                <button class="close_new_modal btn btn-danger">Close</button>
            </div>

        </form>

    </div>

    <table id="actualities_table" class="display" style="width:100%">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Image</th>
            <th class="text-center">Name</th>
            <th class="text-center">Text</th>
            <th class="text-center">Language</th>
            <th class="text-center">Date</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Delete</th>
        </tr>
        </thead>
        <tbody>
        @if(!$actualities->isEmpty())
            @foreach ($actualities as $actualitie)

                <div class="modal_edit edit_modal_{{$actualitie->id}}">

                    <form method="post" action="{{url('/admin/edit_actualities')}}" enctype="multipart/form-data">

                        @csrf
                        <h3>Edit Actualities</h3>
                        <p>All values must be inserted</p>
                        <input name="actualities_id" type="hidden" value="{{$actualitie->id}}">

                        <div class="row">
                            <div class="form-group">
                                <div class='input-group date datetimepicker1'>
                                    <label>Date:</label>
                                    <br>
                                    <input name="date" type='text' class="form-control" value="{{$actualitie->created_at}}" />
                                    <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <label>Name :</label>
                            <input name="name" type="text" class="form-control" value="{{$actualitie->name}}">
                        </div>

                        <div class="row">
                            <label>Text :</label>
                            <textarea name="text" type="text" class="form-control">{{$actualitie->text}}</textarea>
                        </div>

                        <div class="row" style="margin-top: 10px; margin-bottom: 10px;">
                            @foreach($language as $lang)
                                @php $check = ''; @endphp
                                @foreach($actualitie->actualities_lang as $lang_ac)
                                   @if($lang->lang == $lang_ac->lang) @php $check = 'checked'; @endphp @endif
                                @endforeach
                                <input name="lang_{{$lang->id}}" id="actualities_edit_{{$lang->lang}}" type="checkbox" hidden {{$check}}>
                                <label for="actualities_edit_{{$lang->lang}}" style="margin-left: 3px;">{{strtoupper($lang->lang)}}</label>
                            @endforeach
                        </div>

                        <div class="row">
                            <label>Upload Images</label>
                            <input type="file" name="photos[]" class="form-control uploaded_photo" multiple="">
                        </div>

                        @if(!$actualitie->images->isEmpty())
                            <div class="row">
                                @foreach($actualitie->images as $image)
                                    <div class="col-md-4 edit_photo_{{$image->id}}">
                                        <div class="edit_photos">
                                            <img class="edit_img" alt="edit_image" src="{{asset('images/actualities/actualities_'.$actualitie->id.'/'.$image->name)}}">
                                            <br>
                                            <button class="btn btn-danger btn-sm delete_photo" data-name="{{$image->name}}" data-id="{{$actualitie->id}}" data-photoid="{{$image->id}}">Delete</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <div class="row" style="margin-top: 10px;">
                            <button type="submit" class="btn btn-success">Save Actualities Changes</button>
                            <button class="close_edit_modal btn btn-danger">Close</button>
                        </div>

                    </form>

                </div>
                <tr>
                    <td>{{$actualitie->id}}</td>
                    <td>@if(!$actualitie->images->isEmpty())<img class="img_table" alt="image" src="{{asset('images/actualities/actualities_'.$actualitie->id.'/'.$actualitie->images[0]->name)}}">@else - @endif</td>
                    <td>{{$actualitie->name}}</td>
                    <td>{{$actualitie->text}}</td>
                    <td>@foreach($actualitie->actualities_lang as $lang) <span style="border: 1px solid green; padding: 5px;">{{$lang->lang}}</span> @endforeach</td>
                    <td>{{$actualitie->created_at}}</td>
                    <td>
                        <button class="edit_modal btn btn-primary" data-id="{{$actualitie->id}}">Edit</button>
                    </td>
                    <td>
                        <button class="delete_actualities btn btn-danger" data-id="{{$actualitie->id}}">Delete</button>
                    </td>
                </tr>
            @endforeach
        @else
            <h1>No actualities!</h1>
        @endif
        </tbody>
    </table>

@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            //datatables
            $('#actualities_table').DataTable({
                "pageLength": 10,
                "columnDefs": [ {
                    "className": "dt-center",
                    "targets": "_all"
                } ]
            });

            //delete actualities
            $('.delete_actualities').click(function () {

                if(!confirm('Are you sure you want to delete actualities?')){
                    return false;
                }

                let id = $(this).data('id');
                $.ajax({
                    url: '{{ url('/admin/delete_actualities') }}',
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

            //edit part delete photo
            $('.delete_photo').click(function (e) {

                e.preventDefault();

                if(!confirm('Are you sure you want to delete actualities photo?')){
                    return false;
                }

                let image_name = $(this).data('name');
                let id = $(this).data('id');
                let photo_id = $(this).data('photoid');

                $.ajax({
                    url: '{{ url('/admin/delete_actualities_photo') }}',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {'image_name': image_name, 'id': id, 'photo_id': photo_id},
                    type: 'post',
                    success: function (ret) {
                        $('.edit_photo_'+ret.image_id).hide();
                    },
                    error: function (err) {
                        alert("Error");
                    }
                })
            });

            $(function () {
                $('.datetimepicker1').datepicker({
                    format: "mm/dd/yy",
                    weekStart: 0,
                    calendarWeeks: true,
                    autoclose: true,
                    todayHighlight: true,
                    orientation: "auto"
                });
            });
        });
    </script>
@endsection
