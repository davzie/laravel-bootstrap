<?php namespace Davzie\LaravelBootstrap\Core;
use Davzie\LaravelBootstrap\Core\Exceptions\EntityNotFoundException;

/**
 * Base Eloquent Repository Class Built On From Shawn McCool <-- This guy is pretty amazing
 */
class EloquentBaseRepository
{
    protected $model;

    public function __construct($model = null)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * Get everything (active only)
     * @return Eloquent
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Get only deleted items
     * @return Eloquent
     */
    public function getAllTrashed()
    {
        return $this->model->onlyTrashed()->get();
    }

    public function getAllPaginated($count)
    {
        return $this->model->paginate($count);
    }

    /**
     * Get a record by its ID
     * @param  integer $id The ID of the record
     * @return Eloquent
     */
    public function getById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Get a record by its ID even if it is trashed
     * @param  integer $id The ID of the record
     * @return Eloquent
     */
    public function getByIdWithTrashed($id)
    {
        return $this->model->withTrashed()->find($id);
    }

    
    /**
     * Get a record by it's slug
     * @param  string $slug The slug name
     * @return Eloquent
     */
    public function getBySlug($slug)
    {
        return $this->model->where('slug','=',$slug)->first();
    }

    public function requireById($id)
    {
        $model = $this->getById($id);

        if ( ! $model) {
            throw new EntityNotFoundException;
        }

        return $model;
    }

    public function getNew( $attributes = array() )
    {
        return $this->model->newInstance($attributes);
    }

    public function store($data)
    {
        if ($data instanceOf \Eloquent) {
            $this->storeEloquentModel($data);
        } elseif (is_array($data)) {
            $this->storeArray($data);
        }
    }

    /**
     * Delete the model passed in
     * @param  Eloquent $model The description
     * @return void
     */
    public function delete($model)
    {
        $model->delete();
    }

    /**
     * Store the eloquent model that is passed in
     * @param  Eloquent $model The Eloquent Model
     * @return void
     */
    protected function storeEloquentModel($model)
    {
        if ($model->getDirty()) {
            $model->save();
        } else {
            $model->touch();
        }
    }

    /**
     * Store an array of data
     * @param  array $data The Data Array
     * @return void
     */
    protected function storeArray($data)
    {
        $model = $this->getNew($data);
        $this->storeEloquentModel($model);
    }

}