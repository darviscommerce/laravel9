<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('cms.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cms.pages.list') }}">Pagina's</a></li>
            <li class="breadcrumb-item active" aria-current="page">Aanpassen</li>
        </ol>
    </nav>

    <form wire:submit.prevent="store(Object.fromEntries(new FormData($event.target)))">
        <div class="row mb-3">
            <label for="title" class="col-sm-2 col-form-label">Titel</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" wire:model="title">
                @error('title') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="slug" class="col-sm-2 col-form-label">Slug</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" wire:model="slug">
                @error('slug') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="seo_title" class="col-sm-2 col-form-label">SEO Titel</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" wire:model.lazy="seo_title">
                @error('seo_title') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="seo_description" class="col-sm-2 col-form-label">SEO Omschrijving</label>
            <div class="col-sm-10">
                <textarea class="form-control form-control-sm" wire:model.lazy="seo_description"></textarea>
                @error('seo_description') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-sm btn-primary">Opslaan</button>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-12">
                @include('includes.form_error')
            </div>
        </div>
    </form>
</div>
