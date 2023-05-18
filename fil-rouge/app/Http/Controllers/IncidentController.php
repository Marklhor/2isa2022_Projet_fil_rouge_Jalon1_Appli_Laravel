<?php
namespace App\Http\Controllers;



use App\Models\Incident;
use Illuminate\Http\Request;


class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function All_Tickets()
    {
        $IsTecHotline = false;
        $getAllTickets = false;

        $IsTecHotline = session('hotline');
        $getAllTickets = session('all');

        // $db = new Incident($Tickets);
        $Tickets[] = $db->getAllTickets();
        // dd($Tickets); // pour voir la variable dans le Dom
        // TODO supprimer les données employé de session ? Utile pour la sécurité ? si non passer que par session

        if ($IsTecHotline && $getAllTickets) {
            $tickets = Incident::getAllTickets();
            return view('incidents', ['Tickets' => $Tickets, 'IsTecHotline' => $IsTecHotline]);
        } else {
            $MyId = 82001; // TODO $MyId = session('user_id');
            $tickets = Incident::getMyTiets($MyId);
            return view('incidents', ['Tickets' => $Tickets, 'MyId' => $MyId]);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
