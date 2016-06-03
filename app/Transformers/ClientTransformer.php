<?php

namespace CodeProject\Transformers;

use League\Fractal\TransformerAbstract;
use CodeProject\Entities\Clients;

/**
 * Class ClientTransformer
 * @package namespace CodeProject\Transformers;
 */
class ClientTransformer extends TransformerAbstract
{

    /**
     * Transform the Clients entity
     * @param Clients $model
     *
     * @return array
     */
    public function transform(Clients $model)
    {
        return [
            'id'         => (int) $model->id,
            'name' => $model->name,
            'responsible' => $model->responsible,
            'email' => $model->email,
            'phone' => $model->phone,
            'address' => $model->address,
            'obs' => $model->obs
        ];
    }
}
