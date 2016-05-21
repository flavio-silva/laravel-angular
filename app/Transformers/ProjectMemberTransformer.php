<?php

namespace CodeProject\Transformers;

use League\Fractal\TransformerAbstract;
use CodeProject\Entities\User;

/**
 * Class ProjectMemberTransformer
 * @package namespace CodeProject\Transformers;
 */
class ProjectMemberTransformer extends TransformerAbstract
{

    /**
     * Transform the \ProjectMember entity
     * @param \ProjectMember $model
     *
     * @return array
     */
    public function transform(User $member)
    {
        return [
            'id' => (int) $member->id,
            'name' => $member->name,
            'email' => $member->email
        ];
    }
}
