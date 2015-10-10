<?php
/**
 * Created by PhpStorm.
 * User: Euler
 * Date: 10/10/2015
 * Time: 12:59 PM
 */

namespace ACME\Transformers;


class LessonsTransformer extends Transformer{

    public function transform($lesson)
    {
        return [
            'title'  => $lesson['title'],
            'author' => $lesson['author']['name'],
            'body'   => $lesson['body'],
            'active' => $lesson['someBol'],
        ];
    }
}