<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesFilter extends Component
{
    use WithPagination;

    public string $order = 'asc';
    public $category = 'all';

    public function updatedCategory(): void
    {
        $this->resetPage();
    }

    public function updatedOrder(): void
    {
        $this->resetPage();
    }

    public function limpiar(): void
    {
        $this->order = 'asc';
        $this->reset('category');
        $this->resetPage();
    }

    public function render()
    {
        $categories = Category::all();

        $courses = Course::query()
            ->with(['image', 'category'])
            ->where('status', 2)
            ->when($this->category !== 'all', fn($q) => $q->where('category_id', $this->category))
            ->orderBy('id', $this->order)
            ->paginate(9);

        return view('livewire.courses-filter', compact('courses', 'categories'));
    }
}
