<div class="font-italic p-2">
    <div class="p-2">
        <h5 class="font-italic">Agent Login Id </h5>
        <input type="text" id="agent_login_id"  name="agent_login_id" placeholder="Enter Agent Login Id " class="form-control font-italic" value="{{isset($agent->agent_login_id)?$agent->agent_login_id:old('agent_login_id')}}"/>
    </div>
    <p class="text-danger help-block">{{$errors->first('agent_login_id')}}</p>
    <div class="p-2">
        <h5 class="font-italic">Agent Name </h5>
        <input type="text" id="agent_name"  name="agent_name" placeholder="Enter Agent Name" class="form-control font-italic" value="{{isset($agent->agent_name)?$agent->agent_name:old('agent_name')}}"/>
    </div>
    <p class="text-danger help-block">{{$errors->first('agent_name')}}</p>
    <div class="p-2">
        <h5 class="font-italic"> Limit </h5>
        <input type="text" id="limit"  name="limit" placeholder="Enter Agent Limit" class="form-control font-italic" value="{{isset($agent->limit)?$agent->limit:old('limit')}}"/>
    </div>
    <p class="text-danger help-block">{{$errors->first('limit')}}</p>
    <div class="p-2">
        <h5 class="font-italic">Minimum Bet </h5>
        <input type="text" id="min_bet"  name="min_bet" placeholder="Enter Agent Minimum Bet" class="form-control font-italic" value="{{isset($agent->min_bet)?$agent->min_bet:old('min_bet')}}"/>
    </div>
    <p class="text-danger help-block">{{$errors->first('min_bet')}}</p>
    <div class="p-2">
        <h5 class="font-italic"> Phone Number</h5>
        <input type="text" id="phone_no"  name="phone_no" placeholder="Enter Agent Phone Number" class="form-control font-italic" value="{{isset($agent->phone_no)?$agent->phone_no:old('phone_no')}}"/>
    </div>
    <p class="text-danger help-block">{{$errors->first('phone_no')}}</p>
    <div class="p-2">
        <h5 class="font-italic">city</h5>
        <input type="text" id="city"  name="city" placeholder="Enter Agent city" class="form-control font-italic" value="{{isset($agent->city)?$agent->city:old('city')}}"/>
    </div>
    <p class="text-danger help-block">{{$errors->first('city')}}</p>
    <div class="p-2">
        <h5 class="font-italic">password</h5>
        <input type="text" id="password"  name="password" placeholder="Enter password" class="form-control font-italic" value="{{isset($agent->password)?$agent->password:old('password')}}"/>
    </div>
    <p class="text-danger help-block">{{$errors->first('password')}}</p>
</div>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
$(document).ready(function(){
  $("#limit , #min_bet, #phone_no").keypress(function(e){
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