<?php

namespace App\Http\Livewire\Tenants\RestaurantMenu;

use App\Models\Tenant\Menu;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $listeners = ['menuItemUpdated' => '$refresh', 'menuItemDeleted' => '$refresh'];
    const TOTAL_PER_PAGE = 2;

    public function render()
    {
        return view('livewire.tenants.restaurant-menu.index')->with('menuItems', Menu::orderBy('id', 'DESC')
            ->paginate(static::TOTAL_PER_PAGE));
    }
}
