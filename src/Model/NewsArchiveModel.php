<?php

namespace SeptemberWerbeagentur\ContaoAtomNewsIntegrationBundle\Model;

use Contao\ContentModel;
use Contao\NewsModel;

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