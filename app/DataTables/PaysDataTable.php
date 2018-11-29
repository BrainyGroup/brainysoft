<?php

namespace BrainySoft\DataTables;

use BrainySoft\Pay;
use Yajra\DataTables\Services\DataTable;

use PDFS;
use DB;
use BrainySoft\Employee;
use BrainySoft\User;
use BrainySoft\Company;

class PaysDataTable extends DataTable
{
    

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', 'paysdatatable.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \BrainySoft\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Pay $model)
    {

        $user = User::find(auth()->user()->id);

            $pays = DB::table('pays')
            ->where('pays.company_id', $user->company_id)
            ->where('posted',true)
            ->join('employees', 'employees.id','pays.employee_id')
            ->join('users', 'users.id','employees.user_id')
            ->select(

              'users.*',

              'employees.*',

              'pays.*'
              )
            ->get();

             return $this->applyScopes($pays);

        // return $model->newQuery()->select('id', 'employee_id','pay_number','created_at', 'updated_at');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    // ->addAction(['width' => '80px'])
                    // ->parameters($this->getBuilderParameters());
                    ->parameters([
                    'dom' => 'Bfrtip',
                    'buttons' => ['csv', 'excel', 'pdf', 'print', 'reset', 'reload'],
        ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'name',
            'employee_id',
            'pay_number',
            'basic_salary',
            'allowance',
            'gloss',
            'taxable',
            'paye',
            'monthly_earning',
            'deduction',
            'net',
           
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Pays_' . date('YmdHis');
    }
}
