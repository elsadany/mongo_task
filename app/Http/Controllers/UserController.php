<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;

class UserController extends Controller {

    function index(Request $request) {
        $users = User::latest('number_of_messages');

        if ($request->has('form')) {

            $users = $this->search($users, $request->get('form'));
        }

        $data['users'] = $users->paginate(30);
        return view('filter.index', $data);
    }

    function search($users, $search) {

        \DB::enableQueryLog();
        $users = $this->checkOperator($users, $search['column'][0], $search['operator'][0], $search['value'][0]);
        foreach ($search['column'] as $key => $column) {
            if ($key > 0)
                $users = $this->checkOperator($users, $search['column'][$key], $search['operator'][$key], $search['value'][$key], $search['contact'][$key - 1]);
        }
        $users = $users;
//        dd(\DB::getQueryLog());
        return $users;
    }

    function checkOperator($users, $column, $opertor, $value, $contact = '') {
        switch ($opertor) {
            case in_array($opertor, ['=', '>', '<']):
                if (in_array($contact, ['', 'AND']))
                    return $users->where($column, "$opertor", $value);
                else
                    $users->orWhere($column, $opertor, $value);
            case $opertor == 'endswith':
                if (in_array($contact, ['', 'AND']))
                    return $users->where($column, 'like', '%' . $value);
                else
                    $users->orWhere($column, 'like', '%' . $value);
            case $opertor == 'startswith':
                if (in_array($contact, ['', 'AND']))
                    return $users->where($column, 'like', $value . '%');
                else
                    return $users->orWhere($column, 'like', $value . '%');
            case $opertor == 'contain':
                if (in_array($contact, ['', 'AND']))
                    return $users->where($column, 'like', '%' . $value. '%');
                else
                    return $users->orWhere($column, 'like', '%' . $value . '%');
            default :
                if (in_array($contact, ['', 'AND']))
                    return $users->where($column, (integer) $value);
                else
                    return $users->orWhere($column, $value);
        }
    }

    function analytics(Request $request) {
        //dates query
        $dates = User::select(\DB::raw('count(*) as `count`'), \DB::raw('DATE_FORMAT(creation_date, "%b-%Y") as create_date'))
                        ->groupby('create_date')->orderBy('count','desc')->take(15)->get();
        $data['dates']=$dates->toArray();
        //
//genders query
        $genders = User::select(\DB::raw('count(*) as `count`'), 'gender')
                        ->groupby('gender')->orderBy('count','desc')->get();
       
        $data['genders'] = $genders->toArray();
        //
        //ranges
        $range['name'][] = '0 to 10 range';
        $range['count'][] = User::whereBetween('age', [0, 10])->count();
        $range['name'][] = '10 to 20 range';
        $range['count'][] = User::whereBetween('age', [10, 20])->count();
        $range['name'][] = '20 to 30 range';
        $range['count'][] = User::whereBetween('age', [20, 30])->count();
        $data['range']=$range;
        //            
        return view('analytics.index', $data);
    }
    function users(Request $request){
 
        if ($request->ajax()) {
            $users = User::latest();
            return Datatables::of($users)
                            ->addIndexColumn()
                            ->addColumn('id', function($row) {
                                return $row->id;
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
        $data['users'] = User::latest('id')->take(50)->get();
  
        return view('users.index', $data);
    }
   
}
