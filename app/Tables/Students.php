<?php

namespace App\Tables;

use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\AbstractTable;

class Students extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return Student::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['student_id'])
            ->column('student_id', sortable: true)
            ->column('uid', sortable: true)
            ->column('LRN', sortable: true)
            ->column('fcm_token', sortable: true)
            ->column('fname', sortable: true)
            ->column('mname', sortable: true)
            ->column('lname', sortable: true)
            ->column('suffix', sortable: true)
            ->column('dob', sortable: true)
            ->column('gender', sortable: true)
            ->column('mobile', sortable: true)
            ->column('email', sortable: true)
            ->column('address', sortable: true)
            ->column('guardian', sortable: true)
            ->column('relationship', sortable: true)
            ->column('guardian_contact', sortable: true)
            ->paginate(15)
            ->export();
        $table->export(
            label: 'CSV export',
            filename: 'projects.csv',
            type: Excel::CSV
        );

            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
