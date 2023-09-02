<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Profil {{ isset($user->name) }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @if ($user->avatar)
        <img src="/avatars/{{ $user->avatar }}" class="w-9 h-9 mx-2 rounded-full shadow-lg">
        @else
        <img src="/avatars/noavatar.png" class="h-9 w-9 mx-2 rounded-full shadow-lg" alt="Fără Poză">
        @endif
      </div>
  </div>
</x-app-layout>