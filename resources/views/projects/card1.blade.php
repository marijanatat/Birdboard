
    <div class="card fle flex-col" style="height:200px">
    
          <h3 class="font-normal text-xl py-4 -ml-5 border-l-4 border-blue-light pl-4 mb-3">
             <a href="{{$project->path()}}" class="text-black no-underline">{{$project->title}}</a>
          </h3>
    <div class="text-grey mb-4 flex-1">{{Illuminate\Support\Str::limit($project->description)}}</div>
    @can('menage', $project)         
    <footer>

    <form action="{{$project->path()}}" method="POST" class="text-right">
            @csrf
            @method('DELETE')
            <button class="text-xs" type="submit">Delete</button>
                </form> 
                
    </footer>
    @endcan
    </div>
