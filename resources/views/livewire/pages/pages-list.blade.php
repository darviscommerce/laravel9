<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('cms.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Pagina's</li>
        </ol>
      </nav>
      <p>
          <a href="{{ route('cms.pages.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Toevoegen</a>
          @include('includes.form_error')
      </p>
      <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Slug</th>
              <th scope="col">SEO</th>
              <th scope="col">Tools</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($items as $item)
              <tr>
                <th scope="row">{{ $item->title }}</th>
                <td>{{ $item->slug }}</td>
                <td>
                    @if (!empty($item->seo_title)) <i class="fas fa-check text-success"></i> @endif
                    @if (!empty($item->seo_description)) <i class="fas fa-check text-success"></i> @endif
                </td>
                <td>
                    <a href="{{ route('cms.pages.edit', ['input' => $item->id]) }}" class="btn btn-sm btn-warning"><i class="fas fa-pencil"></i></a>
                    @if($confirming == $item->id)
                    <button class="btn btn-sm btn-success" wire:click="destroy('{{ $item->id }}')"><i class="fas fa-check"></i></button>
                    <button class="btn btn-sm btn-danger" wire:click="confirmUnDestroy"><i class="fas fa-times"></i></button>
                  @else
                    <button class="btn btn-sm btn-danger" wire:click="confirmDestroy('{{ $item->id }}')"><i class="fas fa-trash-alt"></i></button>
                  @endif
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
      <div style="display:table; margin:0 auto;">
        {{ $items->links() }}
    </div>
</div>
