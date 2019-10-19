<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use DB;
use App\Companies;

class CompaniesController extends Controller
{
  public function index() {
    $lists = Companies::all();
    return view('companies.index', compact('lists') );
  }

  public function create() {
    return view('companies.create');
  }

  public function store(Request $request) {

    request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website' => 'required|max:255',
       ]);
       if ($files = $request->file('logo')) {
           $path = $request->file('logo')->store('public');

          $company = New Companies();
          $company->name= $request->name;
          $company->email= $request->email;
          $company->logo= $path;
          $company->website= $request->website;
          $company->save();
        }

      return redirect('/companylist')->with('success', 'Company is successfully saved');
  }

  public function edit($id)
   {
       $company = Companies::findOrFail($id);
       return view('companies.edit', compact('company'));
   }

   public function update(Request $request, $id)
   {
       request()->validate([
               'name' => 'required|max:255',
               'email' => 'required|max:255',
               'website' => 'required|max:255',
          ]);
            if($request->file('logo')!='') {
              $files = $request->file('logo');
              $path = $request->file('logo')->store('public');
            } else{
              $path = $request->uploaded_file;
            }

             DB::table('companies')
              ->where('id', $request->company_id)
                ->update(array(
                            'name' => $request->name,
                            'email' => $request->email,
                            'logo' => $path,
                            'website' => $request->website
                              )
                          );

       return redirect('/companylist')->with('success', 'Company is successfully updated');
   }
   public function destroy($id)
   {
      $company = Companies::findOrFail($id);
      $company->delete();
      return redirect('/companylist')->with('success', 'Company is successfully deleted');
  }


}
