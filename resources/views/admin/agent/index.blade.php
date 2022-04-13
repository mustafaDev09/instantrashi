@extends('admin.layout')
@section('title')
  Agent 
@endsection
@section('content')
<div class="container-fluid">
   <div class="col-md-12 pt-4">
          <div class=" float-right">
            <a href="{{route('agent.create')}}" class="btn btn-info ">Add Agent</a>
        </div>
        <div>
            <h4 class="bold font-italic text-bold">Agent List</h4>     
        <div>
    </div>
     <p></P>
      <p></P>
       <div class="row full-width">
        <div class="col-md-12 p-1">
             <div>
                <div class="data-section table-actions col-md-12 ">
                      {!! $html->table()!!} 
                </div>
             </div>
         </div>
    </div>
</div>
@push('script')
 <script src="{{ asset('js/datatable.js') }}"></script>
 <script>
     function is_blockAgent(id,is_block){
        $.ajax({
            url: '{{ route("isblock-agent") }}',
            type: 'POST',
            data: { id:id,is_block:is_block},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
              if(data.success)
              {
                  toastr.success(data.message); 
              }
           }
        })
        .fail(function(data){
            console.log(data);
        });
    }
</script>
    {!! $html->scripts() !!}
@endpush
@endsection
