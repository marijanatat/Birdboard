@extends('layouts.app')
@section('content')


   <form  method="POST" action="/projects" >
        @csrf
        <h1 class="heading is-1">Add new project:</h1>
        
        <div class="field">
            <label for="title" class="label" placeholder="Title">Title</label>       
        <div class="control">     
        <input type="text" class="input" name="title" required >
         </div>
        </div>

        <div class="field">
        <label for="description" >Description</label>
       
           <div class="control">
               <textarea name="description" required class="label" id="" class="textarea" placeholder="Textarea"></textarea>     
        
         </div>
        </div>

        <div class="field">
            <div class="control">
              <button class="button is-link" type="submit">Create project</button>
              <a href="/projects">Cancel</a>
            </div>
            </div>
</form>

<div class="field">
   
@if ($errors->any())
    <div class="field mt-6">
        @foreach ($errors->all() as $error)
            <li class="text-sm text-red">{{ $error }}</li>
        @endforeach
    </div>
@endif

</div>
@endsection
         