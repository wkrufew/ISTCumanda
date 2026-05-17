<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Tipo;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Component;

class PostNews extends Component
{
    public int $perPage = 6;
    public $selectedTipo = null;

    public function updatedSelectedTipo(): void
    {
        $this->perPage = 6;
    }

    public function loadMore(): void
    {
        $this->perPage += 6;
    }

    public function limpiarFiltro(): void
    {
        $this->selectedTipo = null;
        $this->perPage = 6;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        $tipos = Cache::remember('posts_tipos', 3600, fn() =>
            Tipo::select('id', 'name')->get()
        );

        $version = Cache::get('posts_version', 0);
        $cacheKey = "posts_relevant_{$this->selectedTipo}_{$version}";

        $relevantPosts = Cache::remember($cacheKey, 300, function () {
            return Post::with(['image', 'tipo', 'user'])
                ->where('is_active', true)
                ->where('is_relevant', true)
                ->when($this->selectedTipo, fn($q) => $q->where('tipo_id', $this->selectedTipo))
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();
        });

        $feed = Post::with(['image', 'tipo', 'user'])
            ->where('is_active', true)
            ->where('is_relevant', false)
            ->when($this->selectedTipo, fn($q) => $q->where('tipo_id', $this->selectedTipo))
            ->orderBy('created_at', 'desc')
            ->take($this->perPage + 1)
            ->get();

        $hasMore = $feed->count() > $this->perPage;
        $posts   = $feed->take($this->perPage);

        return view('livewire.post-news', compact('relevantPosts', 'posts', 'tipos', 'hasMore'));
    }
}
