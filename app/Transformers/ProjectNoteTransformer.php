<?php

namespace CodeProject\Transformers;

use League\Fractal\TransformerAbstract;
use CodeProject\Entities\ProjectNote;

/**
 * Class ProjectNoteTransformer
 * @package namespace CodeProject\Transformers;
 */
class ProjectNoteTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['project'];
    /**
     * Transform the \ProjectNote entity
     * @param \ProjectNote $model
     *
     * @return array
     */
    public function transform(ProjectNote $model)
    {
        return [
            'id'         => (int) $model->id,
            'title' => $model->title,
            'note' => $model->note            
        ];
    }

    public function includeProject(ProjectNote $model)
    {
        return $this->item($model->project, new ProjectTransformer());
    }
}
