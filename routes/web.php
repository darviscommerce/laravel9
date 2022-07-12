<?php

use App\Http\Livewire\Pages\PagesCreate;
use App\Http\Livewire\Pages\PagesEdit;
use App\Http\Livewire\Pages\PagesList;
use App\Http\Livewire\PagesRows\PagesRowsCreate;
use App\Http\Livewire\PagesRows\PagesRowsEdit;
use App\Http\Livewire\PagesRows\PagesRowsList;
use Illuminate\Support\Facades\Route;

Route::get('/', PagesList::class);

Route::get('/dashboard', PagesCreate::class)->name('cms.dashboard');

Route::get('/paginas', PagesList::class)->name('cms.pages.list');
Route::get('/paginas/create', PagesCreate::class)->name('cms.pages.create');
Route::get('/paginas/edit/{input}', PagesEdit::class)->name('cms.pages.edit');

Route::get('/paginas/rijen', PagesRowsList::class)->name('cms.pages.rijen.list');
Route::get('/paginas/rijen/create', PagesRowsCreate::class)->name('cms.pages.rijen.create');
Route::get('/pagipaginasnas/rijen/edit/{input}', PagesRowsEdit::class)->name('cms.pages.rijen.edit');
