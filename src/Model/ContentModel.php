<?php

namespace SeptemberWerbeagentur\ContaoAtomNewsIntegrationBundle\Model;

use Contao\NewsModel;

class ContentModel extends \Contao\ContentModel
{

    public static function findOneNewsContentItem($entryPid)
    {
        return ContentModel::find(
            [
                'column' => [
                    ContentModel::getTable() . '.pid=?',
                    ContentModel::getTable() . '.ptable=?'
                ],
                'value' => [
                    $entryPid,
                    NewsModel::getTable()
                ],
                'limit' => 1
            ]
        );
    }
}