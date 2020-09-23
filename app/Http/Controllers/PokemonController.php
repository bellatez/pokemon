<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Pokemon\Pokemon;

class PokemonController extends Controller
{
    private $dataset;

    public function __construct() {

        //on controller call, check if the backup already exists, if yes, fetch the data
        if(Storage::exists('backup.json')){
            $this->dataset = json_decode(Storage::disk('local')->get('backup.json'), true);
        }
    }


    public function searchData(Request $request)
    {
        //convert json data to collection inorder to perform queries
        $q = $request->get('query');
        $search_by = $request->get('option');
        $results = [];


        if($this->dataset == null){
            Storage::put('backup.json', file_get_contents('https://api.pokemontcg.io/v1/cards?cards?setCode=base4'));
            $this->dataset = json_decode(Storage::disk('local')->get('backup.json'), true);

        }
        $collection = collect($this->dataset['cards']);

         if ($q == null) {
            return view('search');

        }

        // perform search based on varying categories
        if($search_by == 'name')
        {
            $results = $collection->where('name', ucfirst(strtolower($q)))->all();
        }
        if($search_by == 'rarity')
        {
            $results = $collection->where('rarity', ucfirst(strtolower($q)))->all();
        }
        if($search_by == 'hp')
        {
            $results = $collection->where('hp', $q)->all();
        }

        return view('search', compact('results'));
        // return $results;

    }

    public function backupData()
    {
        Storage::put('backup.json', file_get_contents('https://api.pokemontcg.io/v1/cards?setCode=base4'));
        return redirect()->back()->with('success', 'Backup created Successfully!');
    }

    public function deleteData()
    {
        Storage::delete('backup.json');
        return redirect()->back()->with('success', 'Backup deleted Successfully!');
    }
}
