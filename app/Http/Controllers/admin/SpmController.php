<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\spmprogram;
use Illuminate\Support\Str;

class SpmController extends Controller
{

   /**
    *
    *
    * @return The viewspm function is returning the viewspm view.
    */
    public function viewspm(){
        $spm_program = getspmprogram();
        return view('admin.dashboard.spm.viewspm', compact('spm_program'));
    }

   /**
    *
    *
    * @return The view 'admin.dashboard.spm.createspm' is being returned.
    */
    public function spmcreate(){
        return view('admin.dashboard.spm.createspm');
    }

  /**
   * It saves the spm program
   *
   * @param Request req The request object.
   */
    public function savespm(Request $req){
        $spm = new spmprogram();
        $spm->program_name = Str::ucfirst($req->spm);
        $status = $spm->save();
        if($status){
            return redirect(route('admin.dashboard.spm.view'))->with('success','SPM Program Save Successfully');
        }else{
            return redirect(route('admin.dashboard.spm.view'))->with('fail','Fail To Create SPM PROGRAM... Try Again');
        }
    }

   /**
    * It updates the SPM program.
    *
    * @param Request req The request object.
    *
    * @return The updated spm program is being returned.
    */
    public function update(Request $req){
        $findspm = spmprogram::find($req->spmID);
        $findspm->program_name = Str::ucfirst($req->spm);
        $findspm->save();
        return redirect(route('admin.dashboard.spm.view'))->with('updated','SPM Program Updated Successfully');
    }




   /**
    * Delete the spm program
    *
    * @param id The id of the record to be deleted.
    */
    public function delete($id){
        $delspm = spmprogram::find($id);
        $status = $delspm->delete();
        if($status){
            return back()->with('success','SPM Program Remove Successfully');
        }else{
            return back()->with('fail','SPM Program Remove not Successfully');
        }
    }
}
