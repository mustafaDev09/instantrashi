<?php

namespace App\Domain\Datatables;


use Carbon\Carbon;
use App\Models\Agent;
use App\Datatables\BaseDatatableScope;
use App\Models\AdminBalenceTransferToAgent;
use App\Domain\Util\Datatables\BaseDatatableWithoutActionScope;

class FilterPaymentReceiptDatatableScope extends BaseDatatableWithoutActionScope   
{
    /**
     * AppDatatableScope constructor.
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->setHtml([
            [
                'data' => 'agent.agent_login_id',
                'name' => 'agent.agent_login_id',
                'title' => 'login_id',
                'searchable' => true,
                'orderable' => true,
            ],
            [
                'data' => 'agent.agent_name',
                'name' => 'agent.agent_name',
                'title' => 'Name',
                'searchable' => true,
                'orderable' => true,
            ],
            [
                'data' => 'type',
                'name' => 'type',
                'title' => 'Transfer Type',
                'searchable' => true,
                'orderable' => true,
            ],
            [
                'data' => 'amount',
                'name' => 'amount',
                'title' => 'Amount',
                'searchable' => true,
                'orderable' => true,
            ],
            [
                'data' => 'remark',
                'name' => 'remark',
                'title' => 'Remark',
                'searchable' => true,
                'orderable' => true,
            ],
            [
                'data' => 'created_at',
                'name' => 'created_at',
                'title' => 'Date & Time',
                'searchable' => true,
                'orderable' => true,
            ],
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function query()
    {
        
        $query = $this->data;
         
        //  $query = AdminBalenceTransferToAgent::with('agent');
         
         return datatables()->eloquent($query)
         ->editColumn('agent_login_id', function ($model) {
            return $model->agent->agent_login_id;
          }) 
          ->editColumn('agent_name', function ($model) {
            return $model->agent->agent_name;
          }) 
          ->editColumn('type', function ($model) {
             if($model->type == 'debit')
             {
                 return 'Receipt';
             }
             return 'Payment';
          }) 
          ->editColumn('created_at', function ($model) {
              return Carbon::parse($model->created_at)->format('d-m-Y h:i:s A');;
         }) 
          ->addColumn('actions', function ($model) {
             return view('admin.shared.dtcontrols-without-ajax')
                 ->with('id', $model->getKey())
                 ->render();
         })
             
             ->rawColumns(['actions'])
             ->addIndexColumn()
             ->make(true);
    }
}
