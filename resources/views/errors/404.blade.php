<x-app-layout :$token :$user>
  <div class="bg-gray-100 flex items-center justify-center h-screen">
      <div class="text-center">
          <h1 class="text-9xl font-bold text-indigo-600">404</h1>
          <p class="text-2xl md:text-3xl font-light text-gray-800 mb-4">
              Sorry, the page you are looking for could not be found.
          </p>
          <a href={{route('members.index', ['token' => $token])}} class="text-indigo-600 hover:underline">
              Go to Home
          </a>
      </div>
  </div>
</x-app-layout>