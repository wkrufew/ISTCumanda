<?php

namespace App\Livewire;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

class DocumentViewer extends Component
{
    use WithPagination;

    public $search;

    public $selectedDocument = null;

    public function render()
    {
        /* $documents = Document::where('title', 'LIKE', '%' . $this->search . '%')
            ->latest('id')
            ->paginate(10); */
        $documents = Document::select(['id', 'title', 'description', 'file'])
            ->where('is_active', true)
            ->where(function ($query) {
                $query->where('title', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('description', 'LIKE', '%' . $this->search . '%');
            })
            ->latest('id')
            ->paginate(9);

        return view('livewire.document-viewer', compact('documents'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function preview($id)
    {
        $this->selectedDocument = Document::findOrFail($id);
        $this->dispatch('open-modal');
    }

    public function download($id)
    {
        $document = Document::findOrFail($id);

        $this->dispatch('start-download', url('storage/' . $document->file));
    }
}
