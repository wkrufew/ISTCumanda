<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class CoursesFilter extends Component
{
    use WithPagination;
    
    public $eliminandoFiltros = false;

     
    public $order = 'asc'; // Valor predeterminado de orden     

    /* #[Url]  */
    public $category = 'all'; // Valor predeterminado de la categoría

    public $categories; 

    /* protected $queryString=['category','order']; */

    public function mount()
    {
        // Cargar todas las categorías disponibles para el filtro
        $this->categories = Category::all();
    }

    public function updatedCategory()
    {
        // Se ejecuta cuando se actualiza la categoría seleccionada
        $this->render();
    }
    
    public function render()
    {
        // Obtener los cursos filtrados por categoría y orden
    $query = Course::query();

    $query->where('status', 2);

    // Filtrar por categoría si no se selecciona "all"
    if ($this->category != 'all') {
        $query->where('category_id', function($query) {
            $query->select('id')
                ->from('categories')
                ->where('name', $this->category)
                ->limit(1);
        });
    }

    // Aplicar el filtro de orden (ascendente o descendente)
    $query->orderBy('id', $this->order);

    $courses = $query->paginate(9);

        return view('livewire.courses-filter', compact('courses'));
    }

    public function limpiar()
    {
        $this->order = 'asc';
        $this->reset(['category']);
        $this->resetPage();
        $this->eliminandoFiltros = true;
    }
}
