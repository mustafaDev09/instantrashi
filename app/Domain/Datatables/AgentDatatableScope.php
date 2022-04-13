<?php

namespace App\Domain\Datatables;


use App\Models\Agent;
use App\Domain\Util\Datatables\BaseDatatableScope;

class AgentDatatableScope extends BaseDatatableScope   
{
    /**
     * AppDatatableScope constructor.
     */
    public function __construct()
    {
        $this->setHtml([
            [
                'data' => 'agent_login_id',
                'name' => 'agent_login_id',
                'title' => 'login_id',
                'searchable' => true,
                'orderable' => true,
            ],
            [
                'data' => 'agent_name',
                'name' => 'agent_name',
                'title' => 'Name',
                'searchable' => false,
                'orderable' => false,
            ],
            [
                'data' => 'opening_balance',
                'name' => 'opening_balance',
                'title' => 'O-Bal',
                'searchable' => true,
                'orderable' => true,
            ],
            [
                'data' => 'phone_no',
                'name' => 'phone_no',
                'title' => 'phone_no',
                'searchable' => true,
                'orderable' => true,
            ],
            [
                'data' => 'city',
                'name' => 'city',
                'title' => 'city',
                'searchable' => true,
                'orderable' => true,
            ],
            [
                'data' => 'password',
                'name' => 'password',
                'title' => 'password',
                'searchable' => true,
                'orderable' => true,
            ],
            [
                'data' => 'is_block',
                'name' => 'is_block',
                'title' => 'isBlock',
                'searchable' => false,
                'orderable' => false,
            ],
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function query()
    {
        
         $query = Agent::query();
          return datatables()->eloquent($query)
            ->addColumn('is_block', function ($model) {
                $isBlock = '';
                if ($model->is_block) {
                    $isBlock = 'checked';
                }

                return '<div class="checkbox">
				<input type="checkbox" class="facts" id="agent-'.$model->id.'" name="is_block" OnClick="is_blockAgent('.$model->id.',this.checked)" '.$isBlock.'>
				<label for="agent-'.$model->id.'"></label>
				</div>';

             })
             ->addColumn('actions', function ($model) {
                return view('admin.shared.dtcontrols-without-ajax')
                    ->with('id', $model->getKey())
                    ->with('model', $model)
                    ->with('editUrl', route('agent.edit', $model->getKey()))
                    ->with('deleteUrl', route('agent.destroy', $model->getKey()))
                    ->render();
            })
            ->rawColumns(['actions','is_block'])
            ->addIndexColumn()
            ->make(true);
    }
}
