@extends('admin.layout')
@section('title')
  Agent|Balence Transfer  
@endsection
@section('content')
<div class="container-fluid">
    <div class="">
        <div class="float-left col-md-12 p-2">
            <h4 class="bold">
                <a href="{{ route('agent-balence-transfer') }}" class="btn btn-info">Back</a>
            </h4>
        </div>
        <div>
              <h3 class="bold p-2 font-italic text-bold">Balence Transfer To Agent</h3>     
        <div>
    </div>
</div>
<div class="row full-width">
        <div class="col-md-12">
             <div>
                <div class="data-section table-actions">
                    <div class="col-md-12 ml-auto mr-auto">
                        <form action="{{route('store-agent-balence-transfer')}}" method="POST" id="" enctype="multipart/form-data">
                            @csrf
                             @include('admin.agent.form-balence-transfer')
                            <button class="mrg-top-15 btn btn-info float-right" type="submit">Submit</button>
                        </form>
                    </div>
                 </div>
             </div>
         </div>
    </div>
</div>
@endsection