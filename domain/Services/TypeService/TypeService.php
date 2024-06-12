<?php

namespace domain\Services\TypeService;

use App\Models\Type;


class TypeService
{
    protected $type;

    public function __construct()
    {
        $this->type = new Type();

    }

    public function all()
    {
        return $this->type->all();

    }

    public function store($data)
    {

        $this->type->create($data);
    }

    public function delete($type_id)
    {
        $type = $this->type->find($type_id);
        $type->delete();

    }

    public function status($type_id)
    {
        $type = $this->type->find($type_id);
        if ($type->status == 1) {
            $type->status = 0;
        } else {
            $type->status = 1;
        }
        $type->save();
    }

    public function get($type_id)
    {
        return $this->type->find($type_id);
    }

    public function update(array $data, $type_id)
    {

        $type = $this->type->find($type_id);
        $type->update($this->edit($type, $data));
    }

    protected function edit(Type $type, $data)
    {

        return array_merge($type->toArray(), $data);
    }

}
