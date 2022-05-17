@extends('layouts.appadmin')

@section('componentcss')
    <style>

    </style>
@endsection

@section('content')

    <button class="add_modal btn btn-success">Add new Part</button>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="modal_add">

        <form method="post" action="{{url('/admin/add_part')}}" enctype="multipart/form-data">

            @csrf
            <h3>Add new Part</h3>
            <p>All values must be inserted</p>
            <div class="row">
                <label for="part_price">Price :</label>
                <input id="part_price" name="price" type="text" class="form-control">
            </div>
            <div class="row">
                <label for="part_surface">Surface :</label>
                <input id="part_surface" name="surface" type="text" class="form-control">
            </div>

            @foreach($language as $lang)
                <div class="row row_lang_style">
                    <label class="label_lang" for="part_{{$lang->lang}}">{{strtoupper($lang->lang)}} :</label>
                    <div class="col-md-12 textarea_cls">
                        <p>Name</p>
                        <input name="name_{{$lang->lang}}" type="text" class="form-control">
                        <p>Text</p>
                        <textarea name="text_{{$lang->lang}}" type="text" class="form-control"></textarea>
                    </div>
                </div>
            @endforeach

            <div class="row">
                <label for="photo_upload">Upload Images</label>
                <input type="file" name="photos[]" class="form-control uploaded_photo" id="photo_upload" multiple="">
            </div>
            <div class="row">
                <button type="submit" class="btn btn-success">Save Part</button>
                <button class="close_new_modal btn btn-danger">Close</button>
            </div>

        </form>

    </div>

    <table id="part_table" class="display" style="width:100%">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Image</th>
            <th class="text-center">Name</th>
            <th class="text-center">Price</th>
            <th class="text-center">Surface</th>
            @foreach($language as $lang)
                <th class="text-center">{{strtoupper($lang->lang)}}</th>
            @endforeach
            <th class="text-center">Edit</th>
            <th class="text-center">Delete</th>
        </tr>
        </thead>
        <tbody>
        @if(!$parts->isEmpty())
            @foreach ($parts as $part)
                <div class="modal_edit edit_modal_{{$part->id}}">

                    <form method="post" action="{{url('/admin/edit_part')}}" enctype="multipart/form-data">

                        @csrf
                        <h3>Edit Part</h3>
                        <p>All values must be inserted</p>
                        <input name="part_id" type="hidden" value="{{$part->id}}">
                        <div class="row">
                            <label>Price :</label>
                            <input name="price" type="number" step="any" class="form-control" value="{{$part->price}}">
                        </div>
                        <div class="row">
                            <label for="part_surface">Surface :</label>
                            <input id="part_surface" name="surface" type="text" class="form-control" value="{{$part->surface}}">
                        </div>

                        @foreach($language as $lang)
                        <div class="row row_lang_style">
                            <label class="label_lang">{{strtoupper($lang->lang)}} :</label>
                            <div class="col-md-12 textarea_cls">
                                <p>Name</p>
                                <input name="name_{{$lang->lang}}" type="text" class="form-control" value="@if ($part->part_names()->where('part_id', $part->id)->where('language', $lang->lang)->exists()) {{$part->part_names()->where('part_id', $part->id)->where('language', $lang->lang)->first()->name}} @endif">
                                <p>Text</p>
                                <textarea name="text_{{$lang->lang}}" type="text" class="form-control">@if ($part->part_texts()->where('part_id', $part->id)->where('language', $lang->lang)->exists()) {{$part->part_texts()->where('part_id', $part->id)->where('language', $lang->lang)->first()->text}} @endif</textarea>
                            </div>
                        </div>
                        @endforeach

                        <div class="row">
                            <label>Upload Images</label>
                            <input type="file" name="photos[]" class="form-control uploaded_photo" multiple="">
                        </div>

                        @if(!$part->part_images->isEmpty())
                            <div class="row">
                                @foreach($part->part_images as $image)
                                    <div class="col-md-4 edit_photo_{{$image->id}}">
                                        <div class="edit_photos">
                                            <img class="edit_img" alt="edit_image" src="{{asset('images/parts/part_'.$part->id.'/'.$image->name)}}">
                                            <br>
                                            <button class="btn btn-danger btn-sm delete_photo" data-name="{{$image->name}}" data-id="{{$part->id}}" data-photoid="{{$image->id}}">Delete</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <div class="row">
                            <button type="submit" class="btn btn-success">Save Part Changes</button>
                            <button class="close_edit_modal btn btn-danger">Close</button>
                        </div>

                    </form>

                </div>
                <tr>
                    <td>{{$part->id}}</td>
                    <td>@if(!$part->part_images->isEmpty())<img class="img_table" alt="image" src="{{asset('images/parts/part_'.$part->id.'/'.$part->part_images[0]->name)}}">@else - @endif</td>
                    <td>{{$part->part_names()->where('part_id', $part->id)->where('language', 'en')->first()->name}}</td>
                    <td>{{$part->price}}</td>
                    <td>{{$part->surface}}</td>
                    @foreach($language as $lang)
                        <td>@if ($part->part_texts()->where('part_id', $part->id)->where('language', $lang->lang)->exists()) {{$part->part_texts()->where('part_id', $part->id)->where('language', $lang->lang)->first()->text}} @endif</td>
                    @endforeach
                    <td>
                        <button class="edit_modal btn btn-primary" data-id="{{$part->id}}">Edit</button>
                    </td>
                    <td>
                        <form method="post" action="{{url('/admin/delete_part')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$part->id}}" name="id">
                            <button class="delete_part btn btn-danger" data-id="{{$part->id}}">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <h1>No parts!</h1>
        @endif
        </tbody>
    </table>

@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            //datatables
            $('#part_table').DataTable({
                "pageLength": 10,
                "columnDefs": [ {
                    "className": "dt-center",
                    "targets": "_all"
                } ]
            });

            //delete part
            {{--$('.delete_part').click(function () {--}}

            {{--    if(!confirm('Are you sure you want to delete part?')){--}}
            {{--        return false;--}}
            {{--    }--}}

            {{--    let id = $(this).data('id');--}}
            {{--    $.ajax({--}}
            {{--        url: '{{ url('/admin/delete_part') }}',--}}
            {{--        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},--}}
            {{--        data: {'id': id},--}}
            {{--        type: 'post',--}}
            {{--        success: function (ret) {--}}
            {{--            location.reload();--}}
            {{--        },--}}
            {{--        error: function (err) {--}}
            {{--            alert("Error");--}}
            {{--        }--}}
            {{--    })--}}
            {{--});--}}

            //edit part delete photo
            $('.delete_photo').click(function (e) {

                e.preventDefault();

                if(!confirm('Are you sure you want to delete part photo?')){
                    return false;
                }

                let image_name = $(this).data('name');
                let id = $(this).data('id');
                let photo_id = $(this).data('photoid');

                $.ajax({
                    url: '{{ url('/admin/delete_part_photo') }}',
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
        });
    </script>
@endsection
