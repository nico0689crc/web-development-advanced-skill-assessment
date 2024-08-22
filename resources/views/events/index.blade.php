<x-app-layout :$token :$user>
  <div class="py-12">
      <div class="max-w-7xl mx-4 sm:mx-auto sm:px-6 lg:px-8">
          <x-grid-card>
              @foreach ($events as $event)
                  <x-card>
                      <div class="flex items-center">
                        <h2 class="text-indigo-600 underline">{{ $event['name']}}</h2>
                      </div>
                      <div class="flex gap-1">
                        <span class="text-base font-medium">Location:</span>
                        <p class="text-base text-gray-600 line-clamp-1">{{ $event['location'] }}</p>
                      </div>
                      <div class="flex flex-col gap-1">
                        <span class="text-base font-medium">Date</span>
                        <p class="text-base text-gray-600 line-clamp-1">{{ $event['date']}}</p>
                      </div>
                      <div class="flex flex-col gap-1">
                        <span class="text-base font-medium">Time</span>
                        <p class="text-base text-gray-600 line-clamp-1">{{ $event['time'] }}</p>
                      </div>
                      <div class="flex flex-col gap-1">
                        <span class="text-base font-medium">Creator</span>
                        <p class="text-base text-gray-600 line-clamp-1">{{ $event['creator'] }}</p>
                      </div>
                      <div class="flex flex-col gap-1">
                        <span class="text-base font-medium">Description</span>
                        <p class="text-base text-gray-600 text-justify line-clamp-4">{{ $event['description'] }}</p>
                      </div>
                  </x-card>
              @endforeach
          </x-grid-card>
      </div>
  </div>
</x-app-layout>
