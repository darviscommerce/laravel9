<?php

namespace App\Http\Livewire\Pages;

use App\Models\Pages;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class PagesCreate extends Component
{
    public ?string $title = null;
    public ?string $slug = null;
    public ?string $seo_title = null;
    public ?string $seo_description = null;
    public ?string $homepage = '0';

    public int $columns = 1;
    public array $configuration = [];

    public function mount()
    {
        $configuration = [];

        $cols = [];
        $cols[] = ['qty' => 2, 'config' => ['module' => 'gastenboek']];
        $cols[] = ['qty' => 3, 'config' => ['module' => 'form']];
        $cols[] = ['qty' => 4, 'config' => ['module' => 'nieuws']];

        $configuration[] = [
            'row' => [
                'cols' =>
                    $cols

            ]
        ];
        $configuration[] = [
            'row' => [
                'cols' =>
                    $cols

            ]
        ];
        $this->configuration = $configuration;

        // dd(Uuid::uuid4()->toString());

        $test = array_key_exists('aaa', $this->configuration);
        $test = Arr::pluck($this->configuration, 'row.cols');
        dd($test);

}

    public function render()
    {
        return view('livewire.pages.pages-create');
    }

    public function store()
    {

        $validatedData = $this->validate([
            'title' => 'required',
        ]);

        if ($validatedData) {
            if ($this->homepage == 1) {
                Pages::where('homepage', 1)->update(array('homepage' => null));
            }

            $item = new Pages();
            $item->title = $this->title;
            $item->slug = Str::slug($this->slug);
            $item->seo_title = $this->seo_title;
            $item->seo_description = $this->seo_description;
            $item->homepage = (int)$this->homepage;
            $item->save();

            session()->flash('message', 'Item aangemaakt.');

            return redirect()->to(route('cms.pages.list'));
        }
    }

    public function updatedTitle()
    {
        $this->slug = Str::slug($this->title);
    }

    public function updatedSlug()
    {
        $this->slug = Str::slug($this->slug);
    }
}
