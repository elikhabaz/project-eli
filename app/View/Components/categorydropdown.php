<?php

namespace App\View\Components;
use App\Models\Cat;
use Illuminate\View\Component;

class categorydropdown extends Component
{
   
    public function render()
    {
        return view('components.category-dropdown',[
            'categoris'=> Cat::all(),
            'currentcat'=>Cat::firstWhere('slug',request('cat'))

                      
        ]);
    }
}
