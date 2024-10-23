<x-layout>

    <x-slot:heading>
   Job
    </x-slot:heading>
   <h2 class="text-2xl font-bold"> {{ $job->title }} </h2>
   <p class="text-lg text-gray-700"> This Job pays {{ $job->salary }} per year.</p>

   <p class="mt-6">
    <x-button href="/jobs/{{ $job->id }}/edit" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold "> Edit Job </x-button>
   </p>
  
</x-layout>