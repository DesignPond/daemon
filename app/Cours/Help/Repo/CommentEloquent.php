<?php
namespace App\Cours\Help\Repo;

use App\Cours\Help\Repo\CommentInterface;
use App\Cours\Help\Entities\Comment as M;

class CommentEloquent implements CommentInterface
{
    protected $comment;

    public function __construct(M $comment)
    {
        $this->comment = $comment;
    }

    public function getAll(){

        return $this->comment->all();
    }

    public function getPaginate(){

        return $this->comment->paginate(15);
    }

    public function find($id){

        return $this->comment->findOrFail($id);
    }

    public function create(array $data){

        $comment = $this->comment->create([
            'name'      => isset($data['name']) ? $data['name'] : null,
            'content'   => $data['content'],
            'html'      => isset($data['html']) ? $data['html'] : null,
            'ticket_id' => $data['ticket_id'],
            'user_id'   => isset($data['user_id']) ? $data['user_id'] : null,
        ]);

        if( ! $comment )
        {
            return false;
        }

        return $comment;

    }

    public function update(array $data){

        $comment = $this->comment->findOrFail($data['id']);

        if( ! $comment )
        {
            return false;
        }

        $comment->fill($data);
        $comment->save();

        return $comment;
    }

    public function delete($id){

        $comment = $this->comment->find($id);

        return $comment->delete($id);
    }

}
