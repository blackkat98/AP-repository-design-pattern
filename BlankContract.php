<?php


namespace repositories;


interface BlankContract
{
    public function model();
    public function getModel();
    public function all();
    public function create($data);
    public function find($id);
    public function findByField($field, $value);
    public function update($id, $data);
    public function delete($id);
}