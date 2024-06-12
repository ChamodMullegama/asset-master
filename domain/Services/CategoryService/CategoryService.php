<?php

namespace domain\Services\CategoryService;

use App\Models\Category;


class CategoryService
{
    protected $category;

    public function __construct()
    {
        $this->category = new Category();

    }

    public function all()
    {
        return $this->category->all();

    }

    public function store($data)
    {

        $this->category->create($data);
    }

    public function delete($category_id)
    {
        $category = $this->category->find($category_id);
        $category->delete();

    }

    public function status($category_id)
    {
        $category = $this->category->find($category_id);
        if ($category->status == 1) {
            $category->status = 0;
        } else {
            $category->status = 1;
        }
        $category->save();
    }

    public function get($category_id)
    {
        return $this->category->find($category_id);
    }

    public function update(array $data, $category_id)
    {

        $category = $this->category->find($category_id);
        $category->update($this->edit($category, $data));
    }

    protected function edit(Category $category, $data)
    {

        return array_merge($category->toArray(), $data);
    }

}
