<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Offre;
use App\Models\User;
use App\Http\Requests\StoreCommentaireRequest;
use App\Http\Requests\UpdateCommentaireRequest;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

Use PDF;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
  

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentaireRequest  $request
     * @return \Illuminate\Http\Response
     */

   
     
    public function store(Request $request,$id)
    {
        $validated = $request->validate([
            'objet' => 'required',
            'email' => 'required',
            'commentaire' => 'required',

        ]);


        $offre = Offre::findOrFail($id);
       // $user = User::findOrFail($id);
         // dd($request->user()->id);
         //ila makan ta chi user authentifié kay5raj li erreur
        
        $user = Auth::user(); 
        $comments = new Commentaire();
        $comments->offre_id = $offre->id;

        $comments->objet = $request->objet;
        $comments->email = $request->email;
        $comments->user_id = $user->id;

        $comments->commentaire = $request->commentaire;

        $comments->offre()->associate($offre);
        $comments->save();
        if ($comments instanceof Model) {
            toastr()->success('Data has been saved successfully!');

            return redirect()->route('prod-detail',[$offre->slug]);
        }

        toastr()->error('An error has occurred please try again later.');

        
        return back();

    }

 


      

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function show(Commentaire $commentaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Commentaire $commentaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommentaireRequest  $request
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function updateComment(Request $request,$id)
    {
        $request->validate([
            'commentaire' => 'required',
        ]);
    
        $comment = Commentaire::findOrfail($id);

         $this->authorize("update",$comment);

         //$this->authorize("comment.update",$comment);

        $comment->commentaire = $request->commentaire;
        $comment->save();

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //$comment=Commentaire::where('id',$id)->first(); bhal bhal
        $comment =Commentaire::findOrfail($id);

      if(Gate::denies('delete',$comment)){
       abort(403,"You can't delete this post!");
      }

     // if(Gate::denies('comment.delete',$comment)){
       // abort(403,"You can't delete this post!");
      //}
        

       // $this->authorize("comment.delete",$comment);
        $comment->delete();


        if ($comment instanceof Model) {
            toastr()->success('Data has been deleted successfully!');

            return redirect()->back();
        }

        toastr()->error('An error has occurred please try again later.');

        

      }
}
