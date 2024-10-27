<x-layout>

    <x-slot:heading>
  Log in
    </x-slot:heading>
<!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [ 
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<form method="POST" action="/login">
    @csrf 
     

    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
  
        <div class=" grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

          <x-form-field  class="sm:col-span-4">
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email Address</label>
            <div class="mt-2">
             <x-form-input name="email" id="email" type="email" required :value="old('email')"/> 
              @error('email')
                  <p class="text-red-500 text-xs font-semibold mt-1"> {{ $message }} </p>
              @enderror
            </div>
          </x-form-field>

          {{-- password  --}}
          <x-form-field  class="sm:col-span-4">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Passowrd</label>
            <div class="mt-2">
             <x-form-input name="password" id="password" type="password" required/> 
              @error('password')
                  <p class="text-red-500 text-xs font-semibold mt-1"> {{ $message }} </p>
              @enderror
            </div>
          </x-form-field>

         


  
  
   
         
        </div>
      </div>

         
      
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
    <x-form-button> Log In </x-form-button>
    </div>
  </form>
  
</x-layout>  