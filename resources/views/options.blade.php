@foreach($options as $option)
    <div class="col-sm-12">
        <p><b>{{$option->names[0]->name}}</b></p>
        <p>{{$option->texts[0]->text}}</p>
        <!-- <p style="margin-left: 30px;"><b>Cena: {{$option->price}}</b></p> -->
    </div>
    <div class="col-sm-12">
    @foreach($option->attributes as $attribute)
        @if($option->type == 'radio')
        <div class="col-sm-12">
            <input class="veryImportantInput2" type="{{$option->type}}" name="{{$option->names[0]->name}}" value="0">
            <label>No</label>
        </div>
        @endif
        @php
            $att = explode('/', $attribute->attributes);
        @endphp

        @foreach($att as $at)

            @if($option->type == 'radio')
            <div class="col-sm-12">
                <input class="veryImportantInput2" type="{{$option->type}}" name="{{$option->names[0]->name}}" value="{{$at}}">
                <label>{{$at}}</label>
            </div>
                @else
                <input class="veryImportantInput2" style="width: 20px;height: 20px;position: absolute;top: 2px;left: 15px;" type="{{$option->type}}" name="{{$at}}" value="{{$at}}">
                <label style="margin-left: 30px;">{{$at}}</label>
            @endif

        @endforeach

    @endforeach
    <hr>
    </div>
@endforeach
