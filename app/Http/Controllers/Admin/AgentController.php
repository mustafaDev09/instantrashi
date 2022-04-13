<?php

namespace App\Http\Controllers\Admin;



use Carbon\Carbon;
use App\Models\Agent;
use Illuminate\Http\Request;
use App\Http\Requests\AgentRequest;
use App\Http\Controllers\Controller;
use App\Models\AdminBalenceTransferToAgent;
use App\Http\Requests\PaymentReceiptRequest;
use App\Domain\Datatables\AgentDatatableScope;
use App\Domain\Datatables\PaymentReceiptDatatableScope;
use App\Domain\Datatables\FilterPaymentReceiptDatatableScope;

class AgentController extends Controller
{
    public function index(AgentDatatableScope $datatable)
    {
        if (request()->ajax()) {
            return $datatable->query();
        }
        return view('admin.agent.index', [
              'html' => $datatable->html(),
        ]);
        return view('admin.agent.index');
    }   

    public function create()
    {
        return view('admin.agent.create');
    }

    public function store(AgentRequest $request)
    {
        $data = Agent::create(['agent_login_id' => $request->get('agent_login_id') , 
                               'agent_name' => $request->get('agent_name'),
                               'limit' => $request->get('limit'),
                               'min_bet' => $request->get('min_bet'),
                               'phone_no' => $request->get('phone_no'),
                               'city' => $request->get('city'),
                               'password' => $request->get('password')]);
        
        session()->flash('success', 'Agent added Successfully.');
        return redirect(route('agent.index'));
    }

    public function edit(Agent $agent)
    {
        return view('admin.agent.edit', compact('agent'));
    }
    public function update(AgentRequest $request,$id)
    {
        $data = Agent::whereId($id)->update(['agent_login_id' => $request->get('agent_login_id') , 
                                            'agent_name' => $request->get('agent_name'),
                                            'limit' => $request->get('limit'),
                                            'min_bet' => $request->get('min_bet'),
                                            'phone_no' => $request->get('phone_no'),
                                            'city' => $request->get('city'),
                                            'password' => $request->get('password')]);

        session()->flash('success', 'Agent added Successfully.');
        return redirect(route('agent.index'));
          
    }
    

    //delete agent 
    public function destroy(Request $request,$id)
    {
        //delete agent
        $agent=Agent::find($id);
        
        if(Carbon::now()->format('Y-m-d h:i:s') >= $agent->delete_time  && $agent->opening_balance == 0 && $agent->is_block == 1 )
        {
            $agent->where('opening_balance' , 0)->where('is_block' , 1)->delete();
        }
        else
        {
     
           if($agent->opening_balance != 0)
            {
                 return response()->json([
                    'Error' => true,  
                    'message' => 'Agent Delete if Agent Balence is 0.',
                 ]);

            }
            elseif($agent->is_block == 0)
            {
                return response()->json([
                    'Error' => true,  
                    'message' => 'Agent is Unblock.',
                 ]);
            }
            elseif($agent->delete_time != Carbon::now())
            {
                
                return response()->json([
                    'Error' => true,  
                    'message' => 'Agent Delete after 1 Hours of Agent Block.',
                 ]);
            }
            
            
        }
        return response()->json([
            'success' => true,  
            'message' => 'Agent Delete Successfully.',
         ]);
    }
    public function isBlockAgent(Request $request)
    {
        
        $block = false;
        $message ='Agent unBlock Successfully';
        if($request->is_block == "true")
        {
           $block = true;
           $date = Carbon::now()->format('Y-m-d h:i:s');
           $delete_time = Carbon::parse($date)->addHours(1);
           Agent::whereId($request->id)->update(['is_block' =>$block ,'delete_time' => $delete_time]);
           $message ='Agent Block Successfully';
  
        } 
        Agent::whereId($request->id)->update(['is_block' =>$block]);
        return response()->json([
           'success' => true,  
           'message' => $message,
        ]);
    }

    //show Balence Transfer History
    public function BalenceTransferHistory(PaymentReceiptDatatableScope $datatable , Request $request)
    {
        
        //compact for filter dropdwon
        $agents = Agent::latest()->get();
        //filter data search query 
        if(isset($request->fromDate) && isset($request->toDate) )
        {
            $from_data = $request->get('fromDate');
            $to_data = $request->get('toDate');
            $agent_id = $request->get('agent_id');

            $filterdata = AdminBalenceTransferToAgent::whereDate('created_at', '>=', $from_data)->whereDate('created_at', '<=', $to_data)->with('agent');
            if(isset($request->agent_id))
            {  
                $filterdata = AdminBalenceTransferToAgent::where('agent_id' ,$agent_id)->whereDate('created_at', '>=', $from_data)->whereDate('created_at', '<=', $to_data)->with('agent');    
            }

            $datatable = new FilterPaymentReceiptDatatableScope($filterdata);            
        }
        if (request()->ajax()) {
            return $datatable->query();
        }
        return view('admin.agent.balence-transfer', [
              'html' => $datatable->html(),
        ],compact('agents'));
        
    }

    public function createPaymentReceipt()
    {
         $agents = Agent::latest()->get();  
         return view('admin.agent.create-balence-transfer' ,compact('agents'));
    }

    public function storePaymentReceipt(PaymentReceiptRequest $request)
    {
        
        //get agent id 
        $agent_id = $request->get('agent_id');
        //get amount 
        $amount = $request->get('amount');
        //get opening balence
        $agent = Agent::where('id' ,$agent_id)->first();
        
        if($request->type  == 'debit')
        {   
            //create  persist       
            $storepaymentreceipt = AdminBalenceTransferToAgent::create($request->persist());

            $opening_balance = $agent->opening_balance+$amount;

            Agent::whereId($agent_id)->update(['opening_balance' =>$opening_balance]);

        }
        elseif($request->type  == 'credit')
        {
           if($amount > $agent->opening_balance)
            {   
                
                 session()->flash('lowbalence', 'Balence is Not Enough To Payment!');
                 return redirect()->back()->withInput($request->only('agent_id', 'type','amount','remark'));
            }

            $storepaymentreceipt = AdminBalenceTransferToAgent::create($request->persist());
        
            $opening_balance = $agent->opening_balance-$amount;
            Agent::whereId($agent_id)->update(['opening_balance' =>$opening_balance]);
        }
        session()->flash('success', 'Agent Balence Transfer Successfully .');
        return redirect(route('agent-balence-transfer'));
    }
}
