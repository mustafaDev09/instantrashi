{{-- @if(isset($showUrl))
    <a href="{{ $showUrl }}" class="danger show_url" title="Show">
        show
    </a>
@endif
@if(isset($showUrlAjax))
    <a href="javascript:void(0)" class="danger" title="Show" onClick="{{$method}}">
        <button type="button" class="btn btn-sm btn-primary" ><i class="ti-eye"></i></button>
    </a>
@endif --}}
{{-- 
@if(isset($print))

<a href="{{route('stickers.print',['id'=>$model->sticker_pack_id])}}" class="danger" target="_blank">
    <button type="button" class="btn btn-sm btn-primary">edit<i class="fa fa-print"></i></button>
</a>
@endif --}}
{{-- @include('admin.stickers.print-sticker') --}}
@if(isset($editUrl))
    <!-- <a href="javascript:void(0)" class="danger edit_url" title="Edit" data-href={{ $editUrl }}>
        edit
    </a> -->
     <a href="{{ $editUrl }}" class="btn btn-sm btn-info mx-3">
        <i class="ti-pencil-alt"></i>
        {{-- Edit --}}
    </a>
@endif
{{-- @if(isset($reviewUrl))

<a href="{{route('events.step2',['id'=>$model->id])}}" class="primary-btn" title="Add user review">
    <button type="button" class="btn btn-sm btn-secondary"><i class="ti-link"></i></button>
</a>
@endif --}}
{{-- @include('admin.stickers.print-sticker') --}}
@if(isset($deleteUrl))

    <button  class="btn btn-sm btn-danger"  onClick="destroy('{{$deleteUrl}}')">
	    <i class="ti-trash"></i>
        {{-- Delete --}}
	</button>

@endif
 @if(isset($deleteUrlUnit) && (!in_array($model->slug, ['kg','g','l','ml'])))
    <button  class="btn btn-sm btn-danger"  onClick="destroy('{{$deleteUrlUnit}}')">
        <i class="ti-trash"></i>
        
    </button>
@endif

