<?php
interface IDatabase
{
//    "INSERT";
//    "SELECT";
//    "UPDATE";
//    "DELETE";
//    "WHERE";
//    "LIMIT";
//    "OFFSET";
//    "JOIN";

/*
 * Insert data to table
 * @param $data
 * // data to insert example
 * [
 *      'firstname'=>'poghos',
 *      'lastname'=>'poghosyan',
 *      'email'=>'pog@mail.ru',
 * ]
 * @returns bool true if success false if fail
 * */
public function insert($data);

/*
 * */
public function setTable($table);


public function save();


public function select($what = "*");


public function where($condition = 1);


public function one();

public function all();


public function delete();

public function update($data);


}