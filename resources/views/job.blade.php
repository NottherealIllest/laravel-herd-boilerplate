<x-layout>

    <x-slot:heading>
   Job
    </x-slot:heading>
   <h2 class="text-2xl font-bold"> {{ $job['title'] }} </h2>
   <p class="text-lg text-gray-700"> This Job pays {{ $job['salary'] }} per year.</p>
</x-layout>