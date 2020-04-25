<div class="card flex flex-col mt-3" >
    
    <h3 class="font-normal text-xl py-4 -ml-5 border-l-4 border-blue-light pl-4 mb-3">
       Invite User
    </h3>

<form action="{{$project->path().'/invitations'}}" method="POST" >
      @csrf
     <div class='mb-3'>
         <input type="email" name='email' class="border border-grey-light rounded w-full py-2 px-3" placeholder="Email address">
     </div >
      <button class="bg-button text-xs" type="submit" class="button">Invite</button>
          </form> 
           @include('errors',['bag'=>'invitations']) 
          
</div>