<?php
/**
 * User: Sanchit <dev@minutephp.com>
 * Date: 11/4/2016
 * Time: 12:30 PM
 */
namespace Minute\Tracking {

    use Minute\Cache\QCache;
    use Minute\Config\Config;
    use Minute\Dom\TagUtils;
    use Minute\Event\ResponseEvent;
    use Minute\Utils\TrackerUtils;

    class Tracker {
        const TRACKERS = "trackers";
        /**
         * @var Config
         */
        private $config;
        /**
         * @var QCache
         */
        private $cache;
        /**
         * @var TagUtils
         */
        private $tagUtils;
        /**
         * @var TrackerUtils
         */
        private $trackerUtils;

        /**
         * Analytics constructor.
         *
         * @param Config $config
         * @param QCache $cache
         * @param TagUtils $tagUtils
         * @param TrackerUtils $trackerUtils
         */
        public function __construct(Config $config, QCache $cache, TagUtils $tagUtils, TrackerUtils $trackerUtils) {
            $this->config       = $config;
            $this->cache        = $cache;
            $this->tagUtils     = $tagUtils;
            $this->trackerUtils = $trackerUtils;
        }

        public function insertTracker(ResponseEvent $event) {
            if ($event->isSimpleHtmlResponse()) {
                $response = $event->getResponse();
                if (!$response->isFinal()) {
                    $code = $this->cache->get("website-trackers", function () {
                        $result   = '';
                        $trackers = $this->config->get(self::TRACKERS . '/trackers', []);
                        foreach ($trackers ?: [] as $tracker) {
                            if ($tracker['enabled'] == 'true') {
                                $result .= $this->trackerUtils->getTrackerCode($tracker['tracker_type'], $tracker['tracker_code']) . "\n\n";
                            }
                        }

                        return $result;
                    }, 3600);

                    if (!empty(trim($code))) {
                        $content = $this->tagUtils->insertBeforeTag('</body>', sprintf('<s' . 'cript>%s</script>', $code), $response->getContent());
                        $response->setContent($content);
                    }
                }
            }
        }
    }
}