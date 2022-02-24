<?php

namespace App\Http\Livewire;

use App\Petition;
use Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;
    public $searchText;
    public $search;
    public function render()
    {
        $search = '%' . $this->searchText . '%';

        if (Auth::user()->confined_in_jail == "") {

            $petitions = Petition::Where('province_id', Auth::user()->province_id)->orWhere('confined_in_jail', $search)->
                orWhere('name', 'like', "%{$search}%")->orWhere('gender', 'like', "%{$search}%")->
                orWhere('nationality', 'like', "%{$search}%")->orWhere('f_name', 'like', "%{$search}%")->
                orWhere('file_in_department', 'like', "%{$search}%")-> orWhere('status', 'like', "%{$search}%")->paginate(5);
        } else {
            //   $pet=Petition::where('status','IGP')->where('confined_in_jail', Auth::user()->confined_in_jail)->get();

            $petitions = Petition::where([
                ['file_in_department', '=', 'Jail-Supt'],
                ['confined_in_jail', '=', Auth::user()->confined_in_jail],
                ['province_id', '=', Auth::user()->province_id],
            ])  ->orWhere('name', $search)->orWhere('gender', $search)->orWhere('nationality', $search)->orWhere('f_name', $search)->paginate(5);
         

               

        }
    
        return view('livewire.search', compact('petitions'));
    }
}
