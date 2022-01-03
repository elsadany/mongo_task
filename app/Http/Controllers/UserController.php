<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;
class UserController extends Controller {

    function index(Request $request) {
        $users = User::latest('number_of_message');
        if ($request->has('submit')) {
//            dd($request->search);
            \DB::enableQueryLog();
            $users = $this->search($users, $request->search);
        }
        if ($request->ajax()) {
            return Datatables::of($users)
                            ->addIndexColumn()
                            ->addColumn('user_id', function($row) {
                                return $row->user_id;
                            })
                            ->addColumn('first_name', function($row) {
                                return $row->first_name;
                            })
                            ->addColumn('last_name', function($row) {
                                return $row->last_name;
                            })
                            ->addColumn('creation_date', function($row) {
                                return $row->creation_date;
                            })
                            ->addColumn('gender', function($row) {
                                return $row->gender;
                            })
                            ->addColumn('number_of_messages', function($row) {
                                return $row->number_of_messages;
                            })
                            ->addColumn('age', function($row) {
                                return $row->age;
                            })
                            ->make(true);
        }
        $users = $users->take(20);
$dates = User::select(\DB::raw('count(user_id) as `data`'), \DB::raw("DATE_FORMAT(creation_date, 'Y-m') new_date"),  \DB::raw('YEAR(creation_date) year, MONTH(creation_date) month'))
->groupby('year','month')
->get();
dd($dates);
        return view('dashboard')->with('users',$users);
    }

    function search($users, $search) {

        $users = $this->checkOperator($users, $search['column'][0], $search['operator'][0], $search['value'][0]);

        foreach ($search['column'] as $key => $column) {
            if ($key > 0)
                $users = $this->checkOperator($users, $search['column'][$key], $search['operator'][$key], $search['value'][$key], $search['contact'][$key - 1]);
        }
        return $users;
    }

    function checkOperator($users, $column, $opertor, $value, $contact = '') {
        switch ($opertor) {
            case in_array($opertor, ['=', '>', '<']):
                if (in_array($contact, ['', 'AND']))
                    return $users->where($column, "$opertor", $value);
                else
                    $users->orWhere($column, $opertor, $value);
            case $opertor == 'startswith':
                if (in_array($contact, ['', 'AND']))
                    return $users->where($column, 'like', '%' . $value);
                else
                    $users->orWhere($column, 'like', '%' . $value);
            case $opertor == 'endswith':
                if (in_array($contact, ['', 'AND']))
                    return $users->where($column, 'like', $value . '%');
                else
                    return $users->orWhere($column, 'like', $value . '%');
            case $opertor == 'contain':
                if (in_array($contact, ['', 'AND']))
                    return $users->where($column, 'like', '%' . $value, '%');
                else
                    return $users->orWhere($column, 'like', '%' . $value . '%');
            default :
                if (in_array($contact, ['', 'AND']))
                    return $users->where($column, (integer) $value);
                else
                    return $users->orWhere($column, $value);
        }
    }

}
