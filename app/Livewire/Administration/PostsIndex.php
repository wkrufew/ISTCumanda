<?php

namespace App\Livewire\Administration;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class PostsIndex extends Component
{
    use WithPagination;

    public $search;
    
    public function render()
    {
        $posts = Post::where('title', 'LIKE', '%' . $this->search . '%') 
                           ->latest('id')
                            ->paginate(10);

        return view('livewire.administration.posts-index', compact('posts'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function toggleStatusc($post)
    {
        $post = Post::find($post); 
        try {

            $post->is_active = !$post->is_active;
            $post->save();
    
            $this->dispatch('alert', [
                'message' => $post->is_active == 1 ? 'Post publicado con éxito.' : 'Post en borrador.',
                'type' => 'success',
                'title' => 'Actualización exitosa'
            ]);
        } catch (\Exception $e) {
            $this->dispatch('alert', [
                'message' => 'Error al actualizar el estado del post',
                'type' => 'error',
                'title' => 'Error'
            ]);
        }
    }

    public function toggleRelevant($post)
    {

        $post = Post::find($post); 
        try {

            $post->is_relevant = !$post->is_relevant;
            $post->save();
    
            Cache::forget('relevant_posts');

            $this->dispatch('alert', [
                'message' => $post->is_relevant == 1 ? 'Post aplicado como destacado con éxito.' : 'Post quitado de destacado con éxito.',
                'type' => 'success',
                'title' => 'Actualización exitosa'
            ]);
        } catch (\Exception $e) {
            $this->dispatch('alert', [
                'message' => 'Error al actualizar el estado del post',
                'type' => 'error',
                'title' => 'Error'
            ]);
        }
    }

    public function deletePost($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
    }
}
