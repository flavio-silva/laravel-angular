<?php

namespace CodeProject\Transformers;

use League\Fractal\TransformerAbstract;
use CodeProject\Entities\Project;
use CodeProject\Transformers\ProjectMemberTransformer;

class ProjectTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['members', 'client', 'owner'];
    
    public function transform(Project $project)
    {
        return [
            'id' => $project->id,
            'name' => $project->name,
            'owner_id' => $project->owner_id,
            'client_id' => $project->client_id,
            'description' => $project->description,
            'progress' => (float) $project->progress,
            'status' => $project->status,
            'due_date' => $project->due_date
        ];
    }

    public function includeMembers(Project $project)
    {
        return $this->collection($project->members, new ProjectMemberTransformer());
    }

    public function includeClient(Project $project)
    {
        return $this->item($project->client, new ClientTransformer());
    }

    public function includeOwner(Project $project)
    {
        return $this->item($project->owner, new UserTransformer());
    }
}