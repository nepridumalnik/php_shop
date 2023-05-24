<?php

namespace ishop;

define('EXTENSION', '.txt');


class Cache
{
    use TSingleton;

    public function set($key, $data, $seconds = 3600): bool
    {
        if ($seconds > 0) {
            $content = array(
                'data' => $data,
                'end_time' => time() + $seconds,
            );

            if (file_put_contents(self::makeFilename($key), serialize($content))) {
                return true;
            }
        }

        return false;
    }

    public function get($name): array|bool
    {
        $file = self::makeFilename($name);
        if (file_exists($file)) {
            $content = unserialize(file_get_contents($file));

            if (time() <= $content['end_time']) {
                return $content;
            }

            unlink($file);
        }

        return false;
    }

    public function delete($name)
    {
        $file = self::makeFilename($name);

        if (file_exists($file)) {
            unlink($file);
        }
    }

    private static function makeFilename(&$name): string
    {
        return CACHE . '/' . md5($name) . EXTENSION;
    }
}

?>