@extends('admin.layout')
@section('title')
  Agent|Edit
@endsection
@section('content')
<div class="container-fluid">
    <div class="">
        <div class="float-left col-md-12 p-2">
            <h4 class="bold">
                <a href="{{ route('agent.index') }}" class="btn btn-info">Back</a>
            </h4>
        </div>
    </div>
</div>
<div class="row full-width">
        <div class="col-md-12">
             <div>
                <div class="data-section table-actions">
                    <div class="col-md-12 ml-auto mr-auto">
                        <form action="{{ route('agent.update',['id'=>$agent->id])}}" method="POST" id="" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                             @include('admin.agent.form')
                            <button class="mrg-top-15 btn btn-info float-right" type="submit">update</button>
                        </form>
                    </div>
                 </div>
             </div>
         </div>
    </div>
</div>
@endsection