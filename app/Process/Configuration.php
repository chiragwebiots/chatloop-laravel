<?php

namespace App\Process;
use Illuminate\Support\Facades\File;

/**
 * Configuration class
 */
class Configuration
{
    public function getConfiguration()
    {
        $configured = [];

    	foreach(config('config.configuration') as $type => $configuration)
    	{
    		switch ($type) {
                case 'version':
    					$configured[$type][array_key_first($configuration)] = version_compare(phpversion(), array_shift($configuration), '>=');
    				break;
    			case 'extensions':
    					for ($i = 0; $i < count($configuration); $i++) {
    						$configured[$type][$configuration[$i]] = extension_loaded($configuration[$i]);
    					}
                    break;
    			default:
    				break;
    		}
        }

    	return $configured;
    }

    public function checkWritableDir()
    {
        $writables = [];

        foreach(config('config.writables') as $key => $folder)
    	{
            if(File::isDirectory(base_path($folder))) {
                $writables[$folder] = is_writable(base_path($folder));
            }
        }

        return $writables;

    }

    public function configured()
    {
        $configured = collect($this->getConfiguration());
        $configured = $configured->collapse()->every(function($set) {
            return $set;
        });

        return $configured;
    }

    public function isDirConfigured()
    {
        $isDirConfigured = collect($this->checkWritableDir());
        $isDirConfigured = $isDirConfigured->collapse()->every(function($set) {
            return $set;
        });

        return $isDirConfigured;
    }

}
