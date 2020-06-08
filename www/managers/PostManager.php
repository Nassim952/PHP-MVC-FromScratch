<?php

namespace mvc\managers;

use mvc\core\QueryBuilder;

class PostManager{

        public function getUserPost(int $id)
        {
                return (new QueryBuilder())
                ->select('p.*, u.*')
                ->from('hlqn_post','p')
                ->join('hlqn_users','u')
                ->setParameter('iduser', $id)
                ->getQuery()
                ->getArrayResult(Post::class)
                ;
        }

}