<div class="font-italic p-2">
    <div class="p-2">
        <h5 class="font-italic">Agent</h5>
        <select id="agent_id" name="agent_id" class="form-control">
            <option value="">--- Select Agent ---</option>
         @foreach($agents as $key => $agent)
             <option value="{{$agent->id}}" {{(collect(old('agent_id'))->contains($agent->id)) ? 'selected':'' }}>{{$agent->agent_login_id}}({{$agent->opening_balance}})</option>
         @endforeach
       </select>
    </div>
    <p class="text-danger help-block">{{$errors->first('agent_id')}}</p>
    <div class="p-2">
         <h5 class="font-italic">Transfer Type</h5>
         <input class="mr-3" type="radio" name="type" value="debit" {{ old('type') == 'debit' ? 'checked' : ''}} checked>Receipt</br>
         <input class="mr-3" type="radio" name="type" value="credit" {{ old('type') == 'credit' ? 'checked' : ''}}>payment
    </div>
    <p class="text-danger help-block">{{$errors->first('type')}}</p>
    <div class="p-2">
        <h5 class="font-italic">Amount</h5>
        <input type="text" id="amount" name="amount" class="form-control" placeholder="Enter Transfer Amount" value="{{old('amount')}}" />
    </div>
    <p class="text-danger help-block">{{$errors->first('amount')}}</p>
    <div class="p-2">
        <h5 class="font-italic">Remark</h5>
        <input type="text" id="remark" name="remark" class="form-control" placeholder="Enter Transfer Amount" value="{{old('remark')}}"/>
    </div>
    <p class="text-danger help-block">{{$errors->first('remark')}}</p>
</div>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
    $(document).ready(function(){    
      toastr.options.closeButton = true;
      @if (Session::has('lowbalence'))
        toastr.error('{{ Session::get('lowbalence') }}');
      @endif
});
$(document).ready(function(){
  $("#amount").keypress(function(e){
     var keyCode = e.which;
    /*
      8 - (backspace)
      32 - (space)
      48-57 - (0-9)Numbers
    */
   if ( (keyCode != 8 || keyCode ==32 ) && (keyCode < 48 || keyCode > 57)) { 
      return false;
    }
  });
});
</script>