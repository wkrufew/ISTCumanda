<x-administrador-layout :course="$course">
    <div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <div>
            @livewire('administration.courses-requirements', ['course' => $course], key('courses-requirements' . $course->id))
        </div>
    </div>
</x-administrador-layout>
