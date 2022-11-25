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
        
        // ana people string
        // ayeh o chno khask diri ? 5asni nrj3a int
        // o lach madrtihach ? hi jiti o ana nfham wlah makant fahma walo
        // Mahawltich tqray ga3 l'error, nti chfti l'error safe tsdmti 
        // wach qriti dik l jomla mn l barh mnin jak had error hawlti tqray dak l'error o tfhmih ?ouii
        // o kifach mafhmtihch ?ma3rftch 
        // daba khask tfkri m3a rask kifach daba mafhmtihch ? ana rah majit glt lik tahaja
        // swltk 3la ach kay3ni dak l'error o fhmtih, 3lach mafhmtihch bohdk ?
        // fach kant bo7di kant katban liya dbaba f l'erreur safi hi d5alti Krito fhmto
        // wlah ma3rftch nkdab 3lik ila jawbtak b chi jawab
        // rah hadchi li dima kaytra lik, kat'encounctray m3a chi haja katbday katzyeri 39elk
        // Koulchi 3ndk f dmaghk, mais makat7awlich tnfsi chwya mzian o tgoli "alor kifach nqdr ndir hadchi"
        // katban lik error katbday direct tester f les solutions 
        // ch7al mn haja katwriha lia wahla fiha o ana 3arfk 3arfa ljawab mais makat3rfich kifach twsli lih
        // fach qriti l'errro lbarh achno fhmti mno ? mafhmt fih walo
        // o 3lach machditihch trjmih ? nn matrjmtoch 
        // 3lach ? je re 1 min ok 
        // dd($total);
        // Safe wakha, ila kan mchargi mn hna l 20 min ndiro appel sinn pg koi pg
        // pg = pas grave hh ok
        // malk 3la dik dhka 'hh' hhhhhhhh ziko????????tu es la??
        // oui, daba dyaf aymchiw, kantsnahom ikhrjo ok bach nslm 3lihom o nchd tani pc ah oui
        // ok o nakhod rahti f dar bohdi tani hhhhhhhhhhhh ahsan hajaaaa
        // anmchi njib driate o nzha n3iyat lik police rah 3arfa l 'addresse 
        // kidrti ta 3arfa l'address o dar li sakn fiha ana aslan ma3ndhach l'address 3arfaa
        // rah makaynach 3ndi l'address hhhhh ach 3arfa, rah mamtitryach had dar huuumm
        // khlina nzhaw 3la khatrna hhhhhhhhhh chwiya o dir liya vedio bghit nchof dryiat o nzha m3akoum
        // lawahyata 7choma! kifach hchouma 

        //2. On met a jour les informations du Reservation
        // total o offre_id bjoj null;
        // total rah nti katcalculih machi katjibih mn request
        // Daba 3lach dayra $request->total o nti yalah calculati $total qbl 
        // ?? zakaria 3afak ach nahiya request
        // request hwa dakchi kaml li kayji mn l frontend
        // dakhel fih les donnes d form o ch7al mn haja.
        // dd($request->total,  $total, $request->offre_id);
        //offre_id katji null 3lach direct 3arfti offre_id o homa m5rjin total
        // chofi error achno kaygolik 
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