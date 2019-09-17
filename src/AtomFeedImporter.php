<?php

namespace SeptemberWerbeagentur\ContaoAtomNewsIntegrationBundle;

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
        return null;
    }

    private function importFeedsToContaoNews($atomFeeds)
    {

    }

    private function extractFeedUrls($atomFeeds)
    {
        if (null == $atomFeeds) {
            \System::getContainer()
                ->get('monolog.logger.contao')
                ->log(LogLevel::INFO, 'No news with atom feed found', array(
                    'contao' => new ContaoContext(__CLASS__ . '::' . __FUNCTION__, TL_CRON)));
            return null;
        }

        $feedUrls = [];

        foreach ($atomFeeds as $atomFeed) {
            $feedUrls[] = $atomFeed->september_atom_url;

            \System::getContainer()
                ->get('monolog.logger.contao')
                ->log(LogLevel::INFO, 'Found feed ' . $atomFeed->title . ' with url ' . $atomFeed->september_atom_url, array(
                    'contao' => new ContaoContext(__CLASS__ . '::' . __FUNCTION__, TL_CRON)));
        }
    }
}