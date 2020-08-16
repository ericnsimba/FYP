<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Attachments;
use Illuminate\Support\Facades\Storage;

class Rmodal extends Component
{
     /**
     * The retirement rcode.
     *
     * @var int
     */
    public $rcode;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($rcode)
    {
          $this->rcode = $rcode;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        // $contents = Storage::get('file.jpg');
        return view('components.rmodal');
    }
    public function attachments()
    {
       return  Attachments::where('rcode',$this->rcode)->get();
    }
}
