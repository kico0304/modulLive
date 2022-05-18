@extends('layouts.appadmin')

@section('componentcss')
    <style>
        .product_part_row{
            display:none;
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
    </style>
@endsection

@section('content')

    <button class="add_modal btn btn-success">Add new Product</button>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="modal_add">

        <form method="post" action="{{url('/admin/add_product')}}" enctype="multipart/form-data">

            @csrf
            <h3>Add new Product</h3>
            <p>All values must be inserted</p>
            <div class="row">
                <input name="type" id="type1" type="radio" value="1" hidden checked>
                <label for="type1">Residential</label>
                <input name="type" id="type2" type="radio" value="2" hidden>
                <label for="type2">Business</label>
            </div>
            <div class="row">
                <label for="product_price">Price :</label>
                <input id="product_price" name="price" type="text" class="form-control">
            </div>
            <div class="row">
                <label for="product_surface">Surface :</label>
                <input id="product_surface" name="surface" type="text" class="form-control">
            </div>

            @foreach($language as $lang)
                <div class="row row_lang_style">
                    <label class="label_lang" for="product_{{$lang->lang}}">{{strtoupper($lang->lang)}} :</label>
                    <div class="col-md-12 textarea_cls">
                        <p>Name</p>
                        <input name="name_{{$lang->lang}}" type="text" class="form-control">
                        <p>Text</p>
                        <textarea name="text_{{$lang->lang}}" type="text" class="form-control"></textarea>
                        <p>Surface Text</p>
                        <textarea name="surtxt_{{$lang->lang}}" type="text" class="form-control"></textarea>
                    </div>
                </div>
            @endforeach

            @foreach($parts as $part)
                <div class="row product_part_row">
                    <label for="part_{{$part->id}}">Product Part</label><br>
                    <select class="form-control part_pro" id="part_{{$part->id}}" name="part_{{$part->id}}">
                        <option value="">Select Category</option>
                        @foreach($parts as $part1)
                            <option name="{{$part1->id}}" value="{{$part1->id}}" data-id="{{$part1->id}}">{{$part1->part_names()->where('part_id', $part1->id)->where('language', 'en')->first()->name}}</option>
                        @endforeach
                    </select>
                    <input type="number" value="1" class="form-control" name="count_part_{{$part->id}}" placeholder="Number of modules" style="margin-top: 5px;">
                </div>
            @endforeach
            <div class="row">
                <label for="photo_upload">Upload Images</label>
                <input type="file" name="photos[]" class="form-control uploaded_photo" id="photo_upload" multiple="">
            </div>
            <div class="row">
                <button type="submit" class="btn btn-success">Save Product</button>
                <button class="close_new_modal btn btn-danger">Close</button>
            </div>

        </form>

    </div>

    <table id="product_table" class="display" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Image</th>
                <th class="text-center">Name</th>
                <th class="text-center">Price</th>
                <th class="text-center">Surface</th>
                <th class="text-center">Views</th>
                @foreach($language as $lang)
                    <th class="text-center">{{strtoupper($lang->lang)}}</th>
                @endforeach
                <th class="text-center">Edit</th>
                <th class="text-center">Delete</th>
            </tr>
        </thead>
        <tbody>
        @if(!$products->isEmpty())
            @foreach ($products as $product)
                <div class="modal_edit edit_modal_{{$product->id}}">

                    <form method="post" action="{{url('/admin/edit_product')}}" enctype="multipart/form-data">

                        @csrf
                        <h3>Edit Product</h3>
                        <p>All values must be inserted</p>
                        <input name="product_id" type="hidden" value="{{$product->id}}">
                        <div class="row">
                            <input name="type" id="type1_{{$product->id}}" type="radio" value="1" hidden @if($product->type == 1) checked @endif>
                            <label for="type1_{{$product->id}}">Residential</label>
                            <input name="type" id="type2_{{$product->id}}" type="radio" value="2" hidden @if($product->type == 2) checked @endif>
                            <label for="type2_{{$product->id}}">Business</label>
                        </div>
                        <div class="row">
                            <label>Price :</label>
                            <input name="price" type="text" class="form-control" value="{{$product->price}}">
                        </div>
                        <div class="row">
                            <label>Surface :</label>
                            <input name="surface" type="text" class="form-control" value="{{$product->surface}}">
                        </div>

                        @foreach($language as $lang)
                            <div class="row row_lang_style">
                                <label class="label_lang">{{strtoupper($lang->lang)}} :</label>
                                <div class="col-md-12 textarea_cls">
                                    <p>Name</p>
                                    <input name="name_{{$lang->lang}}" type="text" class="form-control" value="@if ($product->names()->where('product_id', $product->id)->where('language', $lang->lang)->exists()) {{$product->names()->where('product_id', $product->id)->where('language', $lang->lang)->first()->name}} @endif">
                                    <p>Text</p>
                                    <textarea name="text_{{$lang->lang}}" type="text" class="form-control">@if ($product->texts()->where('product_id', $product->id)->where('language', $lang->lang)->exists()) {{$product->texts()->where('product_id', $product->id)->where('language', $lang->lang)->first()->text}} @endif</textarea>
                                    <p>Surface Text</p>
                                    <textarea name="surtxt_{{$lang->lang}}" type="text" class="form-control">@if ($product->surface_text()->where('product_id', $product->id)->where('language', $lang->lang)->exists()) {{$product->surface_text()->where('product_id', $product->id)->where('language', $lang->lang)->first()->surface}} @endif</textarea>
                                </div>
                            </div>
                        @endforeach
                        @php
                            $num = 0;
                            if(isset($parts)){
                                $num = $parts->count();
                            }
                            $i = 0;
                        @endphp
                        @if($parts)
                            @foreach($parts as $part)
                                @if(isset($part->id))
                                    <div class="row product_part_row" @if(++$i === $num) style="display: block;" @endif>
                                        <label>Product Part</label><br>
                                        <select class="form-control part_pro" name="part_{{$part->id}}">
                                            <option value="">Select Category</option>
                                            @if($parts)
                                                @foreach($parts as $part1)
                                                    @if(isset($part1->id))
                                                        <option name="{{$part1->id}}" value="{{$part1->id}}" data-id="{{$part1->id}}">{{$part1->part_names()->where('part_id', $part1->id)->where('language', 'en')->first()->name}}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                @endif
                            @endforeach
                        @endif

                        <div class="row">
                            <label>Upload Images</label>
                            <input type="file" name="photos[]" class="form-control uploaded_photo" multiple="">
                        </div>
                        <br>
                        <br>
                        @if(!$product->images->isEmpty())
                            <div class="row">
                                <h4>Product images</h4>
                                <div class="col-md-12">
                                    <div class="row">
                                        @foreach($product->images as $image)
                                                <div class="col-md-4 edit_photo_{{$image->id}}">
                                                    <div class="edit_photos">
                                                        <img class="edit_img" alt="edit_image" src="{{asset('images/products/product_'.$product->id.'/'.$image->name)}}">
                                                        <br>
                                                        <button class="btn btn-danger btn-sm delete_photo" data-name="{{$image->name}}" data-id="{{$product->id}}" data-photoid="{{$image->id}}">Delete</button>
                                                    </div>
                                                </div>
                                        @endforeach
                                    </div>
                                </div>

                                <h4 style="margin-top: 20px;">Product Modules</h4>
                                <div class="col-md-12">
                                    <div class="row">
                                        @foreach($product->product_parts as $parts_pro)
                                            @foreach($parts_pro->part_names()->where('language', 'en')->get() as $prt_names)
                                                <div class="col-md-4 part_product_{{$parts_pro->id}}">
                                                    <p style="text-align: center;">{{$prt_names->name}}</p>
                                                    @foreach($parts_pro->part_images()->where('part_id', $prt_names->part_id)->get() as $prt_images)
                                                        <img style="max-height: 300px; max-width: 300px; margin-top: 10px;" alt="edit_image" src="{{asset('images/parts/part_'.$parts_pro->id.'/'.$prt_images->name)}}">
                                                    @endforeach
                                                    <br>
                                                    <button class="btn btn-danger btn-sm delete_part" data-id="{{$parts_pro->id}}" data-product_id="{{$product->id}}">Delete</button>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="row" style="margin-top: 40px;">
                            <button type="submit" class="btn btn-success">Save Product Changes</button>
                            <button class="close_edit_modal btn btn-danger">Close</button>
                        </div>

                    </form>

                </div>
                <tr>
                    <td>{{$product->id}}</td>
                    <td>@if(!$product->images->isEmpty())<img class="img_table" alt="image" src="{{asset('images/products/product_'.$product->id.'/'.$product->images[0]->name)}}">@else - @endif</td>
                    <td>{{$product->names()->where('product_id', $product->id)->where('language', 'en')->first()->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->surface}}</td>
                    <td>{{$product->views}}</td>
                    @foreach($language as $lang)
                        <td>@if ($product->texts()->where('product_id', $product->id)->where('language', $lang->lang)->exists()) {{$product->texts()->where('product_id', $product->id)->where('language', $lang->lang)->first()->text}} @endif</td>
                    @endforeach
                    <td>
                        <button class="edit_modal btn btn-primary" data-id="{{$product->id}}">Edit</button>
                    </td>
                    <td>
                        <form method="post" action="{{url('/admin/delete_product')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$product->id}}" name="id">
                            <button class="delete_product btn btn-danger" data-id="{{$product->id}}">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <h1>No products!</h1>
        @endif
        </tbody>
    </table>

@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            //datatables
            $('#product_table').DataTable({
                "pageLength": 10,
                "columnDefs": [ {
                    "className": "dt-center",
                    "targets": "_all"
                } ]
            });

            //delete product
            {{--$('.delete_product').click(function () {--}}

            {{--    if(!confirm('Are you sure you want to delete product?')){--}}
            {{--        return false;--}}
            {{--    }--}}

            {{--    let id = $(this).data('id');--}}
            {{--    $.ajax({--}}
            {{--        url: '{{ url('/admin/delete_product') }}',--}}
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

            //edit product delete photo
            $('.delete_photo').click(function (e) {

                e.preventDefault();

                if(!confirm('Are you sure you want to delete product?')){
                    return false;
                }

                let image_name = $(this).data('name');
                let id = $(this).data('id');
                let photo_id = $(this).data('photoid');

                $.ajax({
                    url: '{{ url('/admin/delete_product_photo') }}',
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

            //part product show next div
            $('.part_pro').change(function(){
                $(this).parents().prev().show();
            });

            $(function () {
                $('form div.product_part_row:last').show();
            });

            //delete part of product
            $('.delete_part').click(function (e) {

                e.preventDefault();

                if(!confirm('Are you sure you want to delete module for product?')){
                    return false;
                }

                let id = $(this).data('id');
                let product_id = $(this).data('product_id');

                $.ajax({
                    url: '{{ url('/admin/delete_part_product') }}',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {'id': id, 'product_id': product_id},
                    type: 'post',
                    success: function (ret) {
                        $('.part_product_'+ret.part_id).first().hide();
                    },
                    error: function (err) {
                        alert("Error");
                    }
                })
            });
        });
    </script>
@endsection
