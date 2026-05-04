<x-administrador-layout :course="$course">
    <div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <div>
            @livewire('administration.courses-advantages', ['course' => $course], key('courses-advantages' . $course->id))
        </div>
    </div>
</x-administrador-layout>
