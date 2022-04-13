@extends('admin.layout')
@section('title')
  Agent|Balence Transfer
@endsection
@section('content')
<div class="container-fluid">
   <div class="col-md-12 pt-5">
          <div class=" float-right">
            <a href="{{route('create-agent-balence-transfer')}}" class="btn btn-info ">Payment/Receipt</a>
        </div>
        <div>
            <h4 class="bold font-italic text-bold">Balence Transfer History</h4>     
        <div>
    </div>
    <p></p>
    <div  class="p-3">
        <div class="row">
                 <p class="h5">Name :-</p>
                 <select id="agent_id" name="agent_id" class="mr-2 form-select bg-info" id="agent_id" >
                 <option value="" class="bg-light">All</option>
                 @foreach($agents as $index => $agent)
                    <option class="bg-light" value="{{$agent->id}}" {{(collect(old('agent_id'))->contains($agent->id)) ? 'selected':'' }}>{{$agent->agent_login_id}}({{$agent->opening_balance}})</option>
                  @endforeach
                </select>
                 <p class="h5 ">From Date :-</p>
                 <input class="form-control col-md-2 ml-2" type="date"  name="form-date" id="from-date" value="" onkeydown="return false" />
                 <p class="h5 ml-2">To Date   :-</p>
                 <input class="form-control col-md-2 ml-2" type="date"  name="to-date" id="to-date" value="" onkeydown="return false"/>
                 <button onclick="filterSearch()" class="btn btn-sm btn-info form-control col-md-2 ml-5" id="search" >Search</button>
            </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
  $(document).ready(function() {

    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
      month = '0' + month.toString();
    if(day < 10)
      day = '0' + day.toString();
    var maxDate = dtToday.toISOString().substr(0, 10);

      $('#from-date').attr('max', maxDate);
      $('#from-date').val(maxDate);
      $('#to-date').attr('max', maxDate);
      $('#to-date').val(maxDate);
});
    function filterSearch() {
        var fromDate = $('#from-date').val();
        var toDate = $('#to-date').val();
        var agent_id = $('#agent_id').val();
        if (fromDate == '') {
            alert('From date is required')
            return false;
        }
        if (toDate == '') {
            alert('To date is required')
            return false;
        }
        if (fromDate > toDate) {
            alert('From date must be less than To date.')
            return false;
        }
           LaravelDataTables["dataTableBuilder"].ajax.url(
            '{{ route('agent-balence-transfer') }}?ajax_call=1&fromDate=' + fromDate + '&toDate=' +
            toDate + '&agent_id=' + agent_id).load();
   };           
</script>
@push('script')
 <script src="{{ asset('js/datatable.js') }}"></script>
    {!! $html->scripts() !!}
@endpush
@endsection
