<?php

namespace App\Cours\User\Repo;

use App\Cours\User\Repo\UserInterface;
use App\Cours\User\Entities\User as M;

class UserEloquent implements UserInterface{

    protected $user;

    public function __construct(M $user)
    {
        $this->user = $user;
    }

    public function getAll(){

        return $this->user->all();
    }

    public function find($id){

        return $this->user->findOrFail($id);
    }

    public function create(array $data){

        $user = $this->user->create(array(
            'first_name'     => $data['first_name'],
            'last_name'      => $data['last_name'],
            'email'          => $data['email'],
            'role'           => $data['role'],
            'password'       => bcrypt($data['password']),
            'created_at'     => date('Y-m-d G:i:s'),
            'updated_at'     => date('Y-m-d G:i:s')
        ));

        if( ! $user )
        {
            return false;
        }

        return $user;

    }

    public function update(array $data){

        $user = $this->user->findOrFail($data['id']);

        if( ! $user )
        {
            return false;
        }

        $user->name       = $data['name'];
        $user->email      = $data['email'];
        $user->role       = $data['role'];

        if(!empty($data['password']))
        {
            $user->password = bcrypt($data['password']);
        }

        $user->updated_at = date('Y-m-d G:i:s');

        $user->save();

        return $user;
    }

    public function delete($id){

        $user = $this->user->find($id);

        return $user->delete($id);
    }

}
