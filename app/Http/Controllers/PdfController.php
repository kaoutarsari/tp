<?php

namespace App\Http\Controllers;

use App\Models\Reservation;

use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getReservationPdf(Reservation $reservation)
    {
           // L'instance PDF avec la vue resources/views/posts/show.blade.php
          $pdf = PDF::loadView('pdf', compact('reservation'));

         // Lancement du téléchargement du fichier PDF
         return $pdf->download(\Str::slug($reservation->first_name).".pdf");
    }

 
}