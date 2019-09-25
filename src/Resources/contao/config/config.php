<?php

$GLOBALS['TL_CRON']['hourly'][] = array('SeptemberWerbeagentur\ContaoAtomNewsIntegrationBundle\AtomFeedImporter', 'updateFeeds');

/* TODO use backend selection to customize frequency */
//$GLOBALS['TL_CRON']['minutely'][] = array('SeptemberWerbeagentur\ContaoAtomNewsIntegrationBundle\AtomFeedImporter', 'updateFeedsMinutely');
//$GLOBALS['TL_CRON']['hourly'][] = array('SeptemberWerbeagentur\ContaoAtomNewsIntegrationBundle\AtomFeedImporter', 'updateFeedsHourly');
//$GLOBALS['TL_CRON']['daily'][] = array('SeptemberWerbeagentur\ContaoAtomNewsIntegrationBundle\AtomFeedImporter', 'updateFeedsDaily');
//$GLOBALS['TL_CRON']['monthly'][] = array('SeptemberWerbeagentur\ContaoAtomNewsIntegrationBundle\AtomFeedImporter', 'updateFeedsMonthly');
