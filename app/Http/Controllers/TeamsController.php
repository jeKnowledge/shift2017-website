<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest;
use App\Team;
use App\Edition;
use App\User;
use Auth; 

class TeamsController extends Controller
{
    public function __construct() { 
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        $section = 'teams';

        return view('teams.index', compact('teams', 'section'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        $section = 'teams';

        return view('teams.index', compact('teams', 'section'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        if(Auth::user()->isShifter() && Auth::user()->shifter->team()->count() == 0){
            $edition = Edition::where('active',true)->first();

            $team = Team::create([
                'name' => $request->name,
                'shifter_id' => Auth::user()->shifter->id,
                'logoPath' => $request->logoPath,
                'edition_id' => $edition->id,
            ]);
            $team->shifters()->attach(Auth::user()->shifter->id);
            $team->project()->create(['name' => null]);

            return redirect()->route('teams.edit', ['team' => $team->id]);
        }
        else 
            return redirect()->route('teams.index')->with('status', 'error');
    }

    /**
     * Display the specified resource.
     *
     * @param  Team $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        $section = 'teams';

        return view('teams.show', compact('team', 'section'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Team $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $section = 'teams';
        if((Auth::user()->isShifter() && Auth::user()->shifter->id == $team->owner->id) || (Auth::user()->isAdmin())){
            return view('teams.edit', compact('team', 'section'));
        }
        else {
            return redirect()->route('teams.show', ['team' => $team->id]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Team $team
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, Team $team)
    {
        if(isset($request['add_shifter'])) {
            if($team->shifters()->count()<4){
                $user = User::find($request['add_shifter']);
                if($user->shifter->team()->count() == 0){
                    $team->shifters()->attach($user->shifter->id);
                    return redirect()->route('teams.edit', ['team' => $team->id])->with('status', 'success');
                }
            }
            return redirect()->route('teams.edit', ['team' => $team->id])->with('status', 'error');
        }
        else if(isset($request['remove_shifter'])) {
            $team->shifters()->detach($request['remove_shifter']);
                return redirect()->route('teams.edit', ['team' => $team->id])->with('status', 'success');
        }
        else {
            $team->project()->update(['name' => $request['name'], 'description' => $request['description']]);
        }
        return redirect()->route('teams.edit', ['team' => $team->id])->with('status', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Team $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }
}
