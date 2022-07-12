<?php

namespace App\Http\Livewire\Pages;

use App\Models\Pages;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class PagesEdit extends Component
{

    public Pages $item;
    public string $itemId;

    public ?string $title = null;
    public ?string $slug = null;
    public ?string $seo_title = null;
    public ?string $seo_description = null;
    public ?string $homepage = '0';

    public function mount($input){
        $this->item = Pages::find($input);

        if($this->item == null){
            redirect(route('cms.pages.list'));
        }
        $this->itemId = $this->item->id;

        $this->title = $this->item->title;
        $this->slug = $this->item->slug;
        $this->seo_title = $this->item->seo_title;
        $this->seo_description = $this->item->seo_description;
        $this->homepage = $this->item->homepage;
    }

    public function render()
    {
        return view('livewire.pages.pages-edit');
    }

    public function store(){

        $validatedData = $this->validate([
            'title' => 'required',
        ]);

        if($validatedData){
            if($this->homepage == 1){
                Pages::where('homepage', 1)->update(array('homepage' => null));
            }

            $item = Pages::find($this->itemId);
            $item->title = $this->title;
            $item->slug = Str::slug($this->slug);
            $item->seo_title = $this->seo_title;
            $item->seo_description = $this->seo_description;
            $item->homepage = (int)$this->homepage;
            $item->save();

            session()->flash('message', 'Item aangepast.');
        }
    }

    public function updatedTitle(){
        $this->slug = Str::slug($this->title);
    }

    public function updatedSlug(){
        $this->slug = Str::slug($this->slug);
    }
}
