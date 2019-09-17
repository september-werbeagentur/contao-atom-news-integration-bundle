<?php

namespace SeptemberWerbeagentur\ContaoAtomNewsIntegrationBundle\Model;

class NewsArchiveModel extends \Contao\NewsArchiveModel
{

    public static function findAllWithAtomFeed()
    {
       return NewsArchiveModel::findAll(
           [
               'column' => 'septemberUseAtom',
               'value' => '1'
           ]
       );
    }
}