<?php

namespace CodeProject\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectMember extends Model
{
    protected $table = 'projects_members';
    public $timestamps = false;
    protected $fillable = ['project_id', 'user_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function member()
    {
        return $this->belongsTo(User::class);
    }

}
