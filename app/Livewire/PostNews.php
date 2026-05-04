<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Tipo;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Component;

class PostNews extends Component
{
    public $perPage = 5; // Número inicial de publicaciones
    public $increment = 5; // Incremento al cargar más publicaciones
    public $selectedTipo = null; // Tipo seleccionado para el filtro
    public $isMobile = false; // Detecta si la vista es móvil

    public function mount()
    {
        // Detectar si es móvil basándose en el User-Agent
        $this->isMobile = request()->header('User-Agent') && preg_match('/Mobile|Android|iPhone/', request()->header('User-Agent'));
        //dd($this->isMobile);
    }

    public function loadMore()
    {
        $this->perPage += $this->increment; // Incrementar las publicaciones mostradas
    }

    public function limpiarFiltro()
    {
        $this->selectedTipo = null; // Limpiar el filtro
    }

    #[Layout('layouts.app')]
    public function render()
    {
        // Publicaciones destacadas
        $relevantPosts = /* Cache::remember('relevant_posts', 60, function () {
            return */ Post::where('is_active', true)
                ->where('is_relevant', true)
                ->when($this->selectedTipo, function ($query) {
                    return $query->where('tipo_id', $this->selectedTipo);
                })
                ->orderBy('created_at', 'desc')
                ->take(5) // Siempre los 5 más recientes
                ->get();
        /* }); */

        // Publicaciones normales con paginación progresiva
        $posts = Post::where('is_active', true)
            ->where('is_relevant', false)
            ->when($this->selectedTipo, function ($query) {
                return $query->where('tipo_id', $this->selectedTipo);
            })
            ->orderBy('created_at', 'desc')
            ->take($this->perPage)
            ->get();

        // Todos los tipos para los filtros
        $tipos = Tipo::select('id', 'name')->get();

        return view('livewire.post-news', [
            'relevantPosts' => $relevantPosts,
            'posts' => $posts,
            'tipos' => $tipos,
            'isMobile' => $this->isMobile,
        ]);

        //return view('livewire.post-news');
    }
}
