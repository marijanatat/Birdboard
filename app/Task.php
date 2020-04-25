<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Activity;
use App\RecordsActivity;

class Task extends Model
{

    use RecordsActivity;

 protected $guarded=[];
 protected $touches=['project'];


 protected $casts=[
     'completed'=>'boolean'
 ];

 protected static $recordableEvents=['created','deleted','updated'];

 

 public function project()
 {
     
    return $this->belongsTo(Project::class);
 }

 public function path()
 {
     return "/projects/{$this->project->id}/tasks/{$this->id}";
 }


 public function complete()
    {
        $this->update(['completed'=>true]);
        $this->recordActivity('completed_task');
    }

public function incomplete()
{
    $this->update(['completed'=>false]);
    $this->recordActivity('incompleted_task');
   
}
    /*public function recordActivity($type){
        Activity::create([
            'project_id'=>$this->project->id,
            'description'=>$type
        ]);

     }
*/
    
     
     
}
