<?php

namespace BrainySoft\DataTables;

use PDFS;
use BrainySoft\User;
use BrainySoft\Company;
use Yajra\DataTables\Services\DataTable;


class UsersDataTable extends DataTable
{
    private function company()
    {
      $user = User::find(auth()->user()->id);

      return Company::find($user->company_id);
    }

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', 'usersdatatable.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \BrainySoft\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
      
       $user = User::find(auth()->user()->id);

    //     $users = User::where('company_id',$user->company_id)->get();

    // return $this->applyScopes($users);

       
        return $model->newQuery()->select('id', 'name','email', 'created_at', 'updated_at')->where('company_id', $user->company_id)->get();
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
                    ->addAction(['width' => '80px'])

                     ->parameters([
            'dom' => 'Bfrtip',
            'buttons' => ['csv', 'excel', 'pdf', 'print', 'reset', 'reload'],
        ]);
                    // ->parameters($this->getBuilderParameters());
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
            'email',
            'created_at',
            'updated_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}
