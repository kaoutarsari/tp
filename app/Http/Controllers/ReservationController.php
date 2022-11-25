<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Offre;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;
class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getReservationPdf(Reservation $reservation, $id){
        $reservation = Reservation::where('id', $id)->get();
        //  @dump($reservation);
      $pdf = PDF::loadView('pdf',array('reservation'=>$reservation));
      

      return $pdf->download('facture-resetvation.pdf' );
     // return $pdf->download($reservation->first_name .'_' .$reservation->last_name.'.pdf' );
    }


    public function index()
    {
        // return view('welcome');
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
     * @param  \App\Http\Requests\StoreReservationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //  dd($request->all());
        //request mafiha ta chi variable smiyto total
        //request gah dakchi li katsifti man front
        //kanti dayra request->total,
        //ma3andi ta chi haja f front ta chi champ f total 
        /*
         if(!$request['first_name'] || !$request['last_name'] || !$request['start_date'] || !$request['end_date'] || !$request['start_time'] || !$request['people']) 
         return redirect()->back()->with([
         'status' => 500,
         'message' => "Bad Credentials",
         ]);
         */

        //1. la validation
        $validator = Validator::make(
        $request->all(),
            [
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'start_date' => 'required|date_format:Y-m-d|after:yesterday',
                'end_date' => 'required|date_format:Y-m-d|after:start_date',
                'start_time' => 'required|date_format:H:i',
                'people' => 'required',
            ]
        );

        $offre = Offre::where($request->id)->firstOrFail();

        $total = $request->people * $offre->price;
        
        $reservation = Reservation::create(
            [
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "start_date" => $request->start_date,
                "end_date" => $request->end_date,
                "start_time" => $request->start_time,
                "people" => $request->people,
                "total" => $total,
                //"offre_id" => $offre->id, //ta hadi shiha
                "offre_id" => $request->offre_id,
            ]
        );

        return redirect()->route('welcome')->with([
                'status' => 200,
                'reservation' => $reservation->id,
                'success',
                'Commentaire ajouté.'
            ]);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservationRequest  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
