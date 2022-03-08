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
             if(!empty(Auth::user()->province_id)){
        $petitions = Petition::where('province_id', Auth::user()->province_id)
       
       
        ->where(function($query) use ($search){
                $query->where('name', 'LIKE', '%'.$search.'%')
                      ->orWhere('gender', 'LIKE', '%'.$search.'%')
                      ->orWhere('confined_in_jail', 'LIKE', '%'.$search.'%')
                      ->orWhere('nationality', 'LIKE', '%'.$search.'%')
                      ->orWhere('f_name', 'LIKE', '%'.$search.'%')
                      ->orWhere('status', 'LIKE', '%'.$search.'%')
                      ->orWhere('prisonerid', 'LIKE', '%'.$search.'%');
            })->paginate(6);
        
        }
        else{
            $petitions = Petition::where('name', 'LIKE', '%'.$search.'%')
            ->orWhere('gender', 'LIKE', '%'.$search.'%')
            ->orWhere('confined_in_jail', 'LIKE', '%'.$search.'%')
            ->orWhere('nationality', 'LIKE', '%'.$search.'%')
            ->orWhere('f_name', 'LIKE', '%'.$search.'%')
            ->orWhere('status', 'LIKE', '%'.$search.'%')
            ->orWhere('prisonerid', 'LIKE', '%'.$search.'%')
  ->paginate(6); 
       
                
                   
        }   

               

    
       
        return view('livewire.search', compact('petitions'));
    }
}
