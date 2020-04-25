@extends('layouts.app')

@section('content')
    
<header class="flex items-center mb-3 py-4">
    <!-- <h1 class="mr-auto">Birdboard</h1>-->
    <div class="flex justify-between w-full items-end">
     <p class="text-grey font-normal text-sm"> 
         <a href="/projects" class="text-grey  font-semibold text-xl no-underline p-1">Type of help</a>/ {{$project->title}}
        </p>
   
    <div class="flex items-center">
        @foreach ($project->members as $member)
        <img
        src="{{ gravatar_url($member->email) }}"
        alt="{{ $member->name }}'s avatar"
        class="rounded-full w-8 mr-2">
            
        @endforeach
        <img
                    src="{{ gravatar_url($project->owner->email) }}"
                    alt="{{ $project->owner->name }}'s avatar"
                    class="rounded-full w-8 mr-2">
        <a href="{{$project->path().'/edit'}}" class="button ml-4"> Edit project</a>
    </div>
  {{-- <div>
     <a href="/projects/create" class="button">Invite to project</a>
    </div> --}}
    <!-- <button class="bg-blue-500 text-black font-bold rounded py-2 px-4">Click me</button>-->
   
 </div>
 </header>

 <main>
     <div class="lg:flex -mx-3">
         <div class="lg:w-3/4 px-3 mb-6">   
              <div class="mb-8">
                  <h2 class="text-grey text-lg mb-3">Task</h2>
               
                  {{--tasks--}}
                  @foreach ($project->tasks as $task)
                  <div class="card mb-3">
                  <form action="{{$task->path()}}" method="POST">
                           @csrf
                           @method('PATCH')
                           <div class="flex">
                               <input value="{{$task->body}}" name="body" class="w-full {{$task->completed ?'text-grey':'' }}">
                               <input type="checkbox" name="completed" onChange="this.form.submit()" {{$task->completed ?'checked':''}}>
                        
                            </div>
                        </form>                    
                    
                    </div>             
                  
                  @endforeach

                  <div class="card mb-3">
                    <form action="{{$project->path(). '/tasks'}}" method="POST">
                      @csrf
                            <input type="text" name="body"placeholder="Add new task..." class="w-full">
                        </form> </div>
              

              </div>



             <div>
                 <h2 class="text-grey text-lg ">Notes</h2>
    
                 {{--General notes--}}
            <form action="{{$project->path()}}" method="POST">
                @csrf
                @method('PATCH')
                <textarea name="notes" class="card w-full mb-4" style="min-height: 200px" 
                          placeholder="Anything special for you, some details about your order ">{{$project->notes}}</textarea>
                 <button type="submit" class="button">Save</button>
                 <a href="/projects" class="button no-underline ml-4 text-black">Back to all projects</a>

                 {{-- <div class="field">
   
                     @if ($errors->any())
                        <div class="field mt-6">
                            @foreach ($errors->all() as $error)
                                <li class="text-sm text-red">{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif 
                    
                    </div> --}}
                </form>
                @include('errors')

                
             </div>
                  
        </div>
        
  
         <div class="lg:w-1/4 px-3">
            
            @include('projects.card')
            @include('projects.activity.card')


            {{-- sekcija za pozivanje usera u projekat --}}
            @if (auth()->user()->is($project->owner))
            @include('projects.invite')              
            @endif

            {{-- drugi nacin provere da li je user vlasnik projekta, on jedini vidi formu za pozivanje clanova u projekat --}}
            {{-- @can('menage', $project::class)
            @include('projects.invite')              
          
            @endcan --}}

        </div>
    </div>
    

 </main>
 


@endsection