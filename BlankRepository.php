<?php


namespace repositories;

require_once('BlankContract.php');

abstract class BlankRepository implements BlankContract
{
    public $model;
    public $system_condition;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    abstract public function model();

    public function getModel()
    {
        return $this->model();
    }

    public function all()
    {
        $sc = new \SQLCond();
        $sc->equal('system_id', \Client::$system->id);

        $query = array($this->model, 'find');
        $condition = array($sc, '*', 0, 'id asc');

        $collection = call_user_func_array($query, $condition);

        return $collection;
    }

    public function create($data)
    {
        $object = new $this->model;

        $fields = array_keys($data);
        $values = array_values($data);
        $len = count($fields);

        for ($i = 0; $i < $len; $i++) {
            $object->$fields[$i] = $values[$i];
        }

        if ($object->save()) {
            Ajax::release(\Code::success('Construction returned in success'));
        } else {
            Ajax::release(\Code::DB_ERROR);
        }
    }

    public function find($id)
    {
        $sc = new \SQLCond();
        $sc->equal('system_id', \Client::$system->id);
        $sc->equal('id', $id);

        $query = array($this->model, 'find');
        $condition = array($sc, '*', 1, 'id asc');

        $object = call_user_func_array($query, $condition);

        return $object;
    }

    public function findByField($field, $value)
    {
        $sc = new \SQLCond();
        $sc->equal('system_id', \Client::$system->id);
        $sc->equal($field, $value);

        $query = array($this->model, 'find');
        $condition = array($sc, '*', 0, 'id asc');

        $collection = call_user_func_array($query, $condition);

        return $collection;
    }

    public function update($id, $data)
    {
        $object = $this->find($id);

        $fields = array_keys($data);
        $values = array_values($data);
        $len = count($fields);

        for ($i = 0; $i < $len; $i++) {
            $object->$fields[$i] = $values[$i];
        }

        if ($object->save()) {
            Ajax::release(\Code::success('Update returned in success'));
        } else {
            Ajax::release(\Code::DB_ERROR);
        }
    }

    public function delete($id)
    {
        $object = $this->find($id);
        $object->delete();
    }
}