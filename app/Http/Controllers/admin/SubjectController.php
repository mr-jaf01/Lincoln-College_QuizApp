<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\subjects;
use Illuminate\Support\Str;


class SubjectController extends Controller
{

   /**
    * It returns the view of createSubject.
    *
    * @return A view
    */
    public function subject(){
        return view('admin.dashboard.subject.createSubject');
    }


   /**
    * This function is used to save the subject in the database.
    *
    * @param Request request The request object.
    */
    public function saveSubject(Request $request){
        $subjects = new subjects;
        $subjects->subjectname = Str::ucfirst($request->subject);
        $status =$subjects->save();
        if($status){
            return redirect(route('admin.dashboard.subject.viewSubject'))->with('success','Subject Save Successfully');
        }else{
            return redirect(route('admin.dashboard.subject.viewSubject'))->with('fail','Fail To Create Subject... Try Again');
        }

    }


   /**
    * It shows all the subjects in the database.
    *
    * @return All the subjects in the database are being returned.
    */
    public function showSubject(){
        $subjects = subjects::all();
        return view('admin.dashboard.subject.viewSubject', compact('subjects'));
    }

   /**
    * It finds the subject by the id, then updates the subject name to the new subject name, then saves
    * the changes and redirects to the viewSubject page with a success message
    *
    * @param Request request The request object.
    *
    * @return the view of the subject page.
    */
    public function updateSubject(Request $request){
        $findsubject = subjects::find($request->subjectID);
        $findsubject->subjectname = Str::ucfirst($request->subject);
        $findsubject->save();
        return redirect(route('admin.dashboard.subject.viewSubject'))->with('updated','Subject Updated Successfully');
    }

   /**
    * It deletes a subject from the database.
    *
    * @param id The id of the subject to be deleted.
    */
    public function deleteSubject($id){
        $delsubject = subjects::find($id);
        $status = $delsubject->delete();
        if($status){
            return back()->with('success','Subject Remove Successfully');
        }else{
            return back()->with('fail','Subject Remove not Successfully');
        }
    }
}
