<?php

namespace SeptemberWerbeagentur\ContaoAtomNewsIntegrationBundle;

use DOMDocument;
use Contao\NewsModel;
use SeptemberWerbeagentur\ContaoAtomNewsIntegrationBundle\Model\ContentModel;
use SeptemberWerbeagentur\ContaoAtomNewsIntegrationBundle\Model\NewsArchiveModel;
use Psr\Log\LogLevel;
use Contao\CoreBundle\Monolog\ContaoContext;

class AtomFeedImporter
{

    public function updateFeeds()
    {
        $atomFeeds = $this->fetchAtomFeeds(NewsArchiveModel::findAllWithAtomFeed());
        $this->importFeedsToContaoNews($atomFeeds);
    }

    private function fetchAtomFeeds($atomFeedList)
    {
        $feedUrls = $this->extractFeedUrls($atomFeedList);
        $atomFeeds = [];

        foreach ($feedUrls as $feedId => $feedUrl) {
            $strFeed = file_get_contents($feedUrl);
            $atomFeeds[$feedId] = simplexml_load_string($strFeed);
        }

        return $atomFeeds;
    }

    private function importFeedsToContaoNews($atomFeeds)
    {
        foreach ($atomFeeds as $id => $atomFeed) {
            foreach ($atomFeed->entry as $entry) {
                $this->saveNewsEntry($id, $entry);
            }
        }
    }

    private function extractFeedUrls($atomFeeds)
    {
        if (null == $atomFeeds) {
            return null;
        }

        $feedUrls = [];
        foreach ($atomFeeds as $atomFeed) {
            $feedUrls[$atomFeed->id] = $atomFeed->september_atom_url;
        }

        return $feedUrls;
    }

    private function saveNewsEntry($pid, $entry)
    {
        $objNews = NewsModel::findBy('september_atom_entry_id', (string)$entry->id);
        if (null == $objNews) {
            $objNews = new NewsModel();
        }
        $objNews->tstamp = time();
        $objNews->date = strtotime((string)$entry->published);
        $objNews->time = strtotime((string)$entry->published);
        $objNews->pid = $pid;
        $objNews->september_atom_entry_id = (string)$entry->id;
        $objNews->headline = (string)$entry->title;
        $objNews->teaser = (string)$entry->summary;

        $objNews->save();

        $objElement = ContentModel::findOneNewsContentItem($objNews->id);

        if (null == $objElement) {
            $objElement = new ContentModel();
        }
        $objElement->tstamp = time();
        $objElement->pid = $objNews->id;
        $objElement->type = 'text';
        $objElement->ptable = \NewsModel::getTable();
        $objElement->heading = $objNews->headline;
        $objElement->text = (string)$entry->content;

        $objElement->save();
    }
}