<?php

namespace App\Http\Livewire\Pages;

use App\Models\Pages;
use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class PagesList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    protected $queryString = ['search']; // disabled because of redirects

    use WithSorting;

    public ?string $confirming = null;

    public function render()
    {
        $items = Pages::paginate(30);
        return view('livewire.pages.pages-list',compact('items'));
    }

     public function confirmDestroy(string $id)
    {
        $this->confirming = $id;
    }

    public function confirmUnDestroy()
    {
        $this->confirming = '';
    }

    public function destroy(string $id){
        $item = Pages::find($id);
        $item->delete();
    }
}
