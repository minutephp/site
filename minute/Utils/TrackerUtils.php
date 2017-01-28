<?php
/**
 * User: Sanchit <dev@minutephp.com>
 * Date: 11/4/2016
 * Time: 1:30 PM
 */
namespace Minute\Utils {

    use StringTemplate\Engine;

    class TrackerUtils {
        /**
         * @var Engine
         */
        private $engine;

        /**
         * TrackerUtils constructor.
         *
         * @param Engine $engine
         */
        public function __construct(Engine $engine) {
            $this->engine = $engine;
        }

        public function getTrackerCode($type, $tracking_code) {
            $file = realpath(sprintf('%s/data/%s.js', __DIR__, $type));

            if (is_file($file)) {
                $hash = ['tracking_code' => $tracking_code];

                if ($type == 'statcounter') {
                    $parts = parse_url($tracking_code);

                    if ($parts['host'] === 'c.statcounter.com') {
                        $parts = explode('/', $parts['path']);;
                        $hash['sc_project']  = $parts[1];
                        $hash['sc_security'] = $parts[3];
                    }
                }

                foreach ($hash as $key => $value) {
                    $hash[$key] = strip_tags($value);
                }

                $result = $this->engine->render(file_get_contents($file), $hash);

            }

            return $result ?? null;
        }
    }
}