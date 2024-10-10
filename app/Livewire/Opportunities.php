<?php

namespace App\Livewire;

use App\Models\Item;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class Opportunities extends Component
{
    use WithPagination;

    public int $perPage = 50;
    public array $options = [20, 50, 100, 250];
    protected $queryString = ['perPage']; // Keep perPage in the URL

    public function updatingPerPage(): void
    {
        $this->resetPage(); // Reset to the first page when perPage changes
    }

    public function updatePageOption(): void
    {
        $this->updatingPerPage();
    }

    public function render(): View
    {
        logger($this->perPage);
        $items = Item::paginate($this->perPage);

        return view('livewire.opportunities', [
            'items' => $items,
        ])->layout('layouts.guest');
    }
}
