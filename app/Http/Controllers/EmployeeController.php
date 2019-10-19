<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    public function index() {
      $lists = Employee::all();
      return view('employees.index', compact('lists') );
    }

    public function create() {
      return view('employees.create');
    }

    public function store(Request $request) {

      $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'company' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|numeric',
        ]);
        $show = Employee::create($validatedData);

        return redirect('/employeelist')->with('success', 'Employee is successfully saved');
    }

    public function edit($id)
     {
         $employee = Employee::findOrFail($id);
         return view('employees.edit', compact('employee'));
     }

     public function update(Request $request, $id)
     {
         $validatedData = $request->validate([
           'first_name' => 'required|max:255',
           'last_name' => 'required|max:255',
           'company' => 'required|max:255',
           'email' => 'required|max:255',
           'phone' => 'required|numeric',
         ]);

         Employee::whereId($id)->update($validatedData);
         return redirect('/employeelist')->with('success', 'Employee is successfully updated');
     }
     public function destroy($id)
     {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect('/employeelist')->with('success', 'Employee is successfully deleted');
    }


}
