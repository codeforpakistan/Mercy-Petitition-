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

            $petitions = Petition::where('confined_in_jail', 'like', "%{$search}%")->
                orWhere('name', 'like', "%{$search}%")->orWhere('gender', 'like', "%{$search}%")->
                orWhere('nationality', 'like', "%{$search}%")->orWhere('f_name', 'like', "%{$search}%")->
                orWhere('status', 'like', "%{$search}%")->orderBy("id", "desc")->paginate(5);
        } else {
            //   $pet=Petition::where('status','IGP')->where('confined_in_jail', Auth::user()->confined_in_jail)->get();

            $petitions = Petition::where('status', 'IGP')->where('confined_in_jail', Auth::user()->confined_in_jail)->orWhere('name', 'like', "%{$search}%")->orWhere('gender', 'like', "%{$search}%")->

                orWhere('nationality', 'like', "%{$search}%")->orWhere('f_name', 'like', "%{$search}%")->orderBy("id", "desc")->paginate(5);

        }

        return view('livewire.search', compact('petitions'));
    }
}
