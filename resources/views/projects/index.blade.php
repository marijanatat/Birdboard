@extends('layouts.app')

@section('content')
    

    <header class="flex items-center mb-3 py-4">
       <!-- <h1 class="mr-auto">Birdboard</h1>-->
       <div class="flex justify-between w-full items-end">
        <h2 class="text-default font-bold text-lg"> Ask for our help</h2>
       <h2 class="text-default font-bold text-xl  "> What do you need:</h2>
       
        <a href="/projects/create" class="button" @click.prevent="$modal.show('new-project')"> Create New Project</a>
       <!-- <button class="bg-blue-500 text-black font-bold rounded py-2 px-4">Click me</button>-->
      
    </div>
    </header>

    <main class="lg:flex lg:flex-wrap -mx-3">
        @forelse ($projects as $project)
        <div class="lg:w-1/3 px-3 pb-6">
         @include('projects.card')
        </div>
       @empty
        <div>No projects yet</div>
        @endforelse
</main>

<new-project-modal></new-project-modal>

 
    @endsection
    