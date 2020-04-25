
    @csrf
    <div class="field">
    <label for="title" class="label" placeholder="Title">Title</label>
   
       <div class="control">     
    <input type="text" class="input bg-transparent border border-muted-light rounded p-2 text-xs w-full" name="title" value={{$project->title}}>
     </div>
    </div>

    <div class="field">
    <label for="description" >Description</label>
   
       <div class="control">
           <textarea name="description" class="label" id="" class="textarea bg-transparent border border-muted-light rounded p-2 text-xs w-full" placeholder="Textarea">{{$project->description}}</textarea>     
    
     </div>
    </div>

    <div class="field">
        <div class="control">
          <button class="button is-link mr-2" type="submit">Edit project</button>
          <a href="{{$project->path()}}" class="text-default">Cancel</a>
        </div>
        </div>
   