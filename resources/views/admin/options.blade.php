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

        input[type=checkbox]:checked + label, input[type=radio]:checked + label {
            background-color: rgba(90, 120, 217, 1);
        }

        input[type=checkbox]:not(:checked) + label, input[type=radio]:not(:checked) + label {
            background-color: #888;
        }

        input[type=radio] + label {
            width: 120px;
            margin-bottom: 2px;
            text-align: center;
            padding: 2px 5px;
            border-radius: 4px;
            color: #fff;
            margin-right: 10px;
        }
        .notice{
            color: red;
            font-weight: bold;
        }
    </style>
@endsection

@section('content')

    <button class="add_modal btn btn-success">Add new Options</button>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="modal_add">

        <form method="post" action="{{url('/admin/add_option')}}" enctype="multipart/form-data">

            @csrf
            <h3>Add new Options</h3>
            <p>All values must be inserted</p>
            <div class="row">
                <input name="type" id="type1" type="radio" value="checkbox" hidden checked>
                <label for="type1">Checkbox</label>
                <input name="type" id="type2" type="radio" value="radio" hidden>
                <label for="type2">Radio</label>
            </div>
            <div class="row">
                <label for="price">Price :</label>
                <input id="price" name="price" type="text" class="form-control">
            </div>

            @foreach($language as $lang)
                <div class="row row_lang_style">
                    <label class="label_lang" for="part_{{$lang->lang}}">{{strtoupper($lang->lang)}} :</label>
                    <div class="col-md-12 textarea_cls">
                        <p>Name</p>
                        <input name="name_{{$lang->lang}}" type="text" class="form-control">
                        <p>Text</p>
                        <textarea name="text_{{$lang->lang}}" type="text" class="form-control"></textarea>
                        <p>Attributes <span class="notice">Split attributes with /</span></p>
                        <textarea name="attributes_{{$lang->lang}}" type="text" class="form-control"></textarea>
                    </div>
                </div>
            @endforeach

            <div class="row" style="margin-top: 10px;">
                <button type="submit" class="btn btn-success">Save Options</button>
                <button class="close_new_modal btn btn-danger">Close</button>
            </div>

        </form>

    </div>

    <table id="options_table" class="display" style="width:100%">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Price</th>
            <th class="text-center">Type</th>
            <th class="text-center">Attributes</th>
            @foreach($language as $lang)
                <th class="text-center">{{strtoupper($lang->lang)}}</th>
            @endforeach
            <th class="text-center">Edit</th>
            <th class="text-center">Delete</th>
        </tr>
        </thead>
        <tbody>
        @if(!$options->isEmpty())
            @foreach ($options as $option)

                <div class="modal_edit edit_modal_{{$option->id}}">

                    <form method="post" action="{{url('/admin/edit_option')}}" enctype="multipart/form-data">

                        @csrf
                        <h3>Edit Options</h3>
                        <p>All values must be inserted</p>
                        <input name="option_id" type="hidden" value="{{$option->id}}">
                        <div class="row">
                            <input name="type" id="type1_{{$option->id}}" type="radio" value="checkbox" hidden @if($option->type == 'checkbox') checked @endif>
                            <label for="type1_{{$option->id}}">Checkbox</label>
                            <input name="type" id="type2_{{$option->id}}" type="radio" value="radio" hidden @if($option->type == 'radio') checked @endif>
                            <label for="type2_{{$option->id}}">Radio</label>
                        </div>
                        <div class="row">
                            <label>Price :</label>
                            <input name="price" type="text" class="form-control" value="{{$option->price}}">
                        </div>

                        @foreach($language as $lang)
                            <div class="row row_lang_style">
                                <label class="label_lang" for="part_{{$lang->lang}}">{{strtoupper($lang->lang)}} :</label>
                                <div class="col-md-12 textarea_cls">
                                    <p>Name</p>
                                    <input name="name_{{$lang->lang}}" type="text" class="form-control" value="@if ($option->names()->where('option_id', $option->id)->where('language', $lang->lang)->exists()) {{$option->names()->where('option_id', $option->id)->where('language', $lang->lang)->first()->name}} @endif">
                                    <p>Text</p>
                                    <textarea name="text_{{$lang->lang}}" type="text" class="form-control">@if ($option->texts()->where('option_id', $option->id)->where('language', $lang->lang)->exists()) {{$option->texts()->where('option_id', $option->id)->where('language', $lang->lang)->first()->text}} @endif</textarea>
                                    <p>Attributes</p>
                                    <textarea name="attributes_{{$lang->lang}}" type="text" class="form-control">@if ($option->attributes()->where('option_id', $option->id)->where('language', $lang->lang)->exists()) {{$option->attributes()->where('option_id', $option->id)->where('language', $lang->lang)->first()->attributes}} @endif</textarea>
                                </div>
                            </div>
                        @endforeach

                        <div class="row" style="margin-top: 15px;">
                            <button type="submit" class="btn btn-success">Save Option Changes</button>
                            <button class="close_edit_modal btn btn-danger">Close</button>
                        </div>

                    </form>

                </div>
                <tr>
                    <td>{{$option->id}}</td>
                    <td>{{$option->names()->where('option_id', $option->id)->where('language', 'en')->first()->name}}</td>
                    <td>{{$option->price}}</td>
                    <td>{{$option->type}}</td>
                    <td>{{$option->attributes()->where('option_id', $option->id)->where('language', 'en')->first()->attributes}}</td>
                    @foreach($language as $lang)
                        <td>@if ($option->texts()->where('option_id', $option->id)->where('language', $lang->lang)->exists()) {{$option->texts()->where('option_id', $option->id)->where('language', $lang->lang)->first()->text}} @endif</td>
                    @endforeach
                    <td>
                        <button class="edit_modal btn btn-primary" data-id="{{$option->id}}">Edit</button>
                    </td>
                    <td>
                        <form method="post" action="{{url('/admin/delete_option')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$option->id}}" name="id">
                            <button class="delete_options btn btn-danger" type="submit" data-id="{{$option->id}}">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <h1>No options!</h1>
        @endif
        </tbody>
    </table>

@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            //datatables
            $('#options_table').DataTable({
                "pageLength": 10,
                "columnDefs": [ {
                    "className": "dt-center",
                    "targets": "_all"
                } ]
            });
        });
    </script>
@endsection
