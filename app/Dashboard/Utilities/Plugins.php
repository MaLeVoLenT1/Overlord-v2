<?php

namespace App\Dashboard\Utilities;

class Plugins extends PluginLibrary
{
    /**
     * @var mixed|string
     */
    private $dashboard;
    protected $strings = ['css' => [], 'js' => [], 'cdn-css' => [], 'cdn-js' => []];
    private $location = ['npm' => '../node_modules/', 'public' =>  '/', 'cdn' =>  '' ];

    public function __construct($dashboard = 'front'){
        $this -> dashboard = $dashboard;
    }

    /**
     * @getLinks()
     * @return array[]
     */
    public function getLinks(){

        // Global Plugin to String
        foreach($this -> plugins['global'] as $plugin){
            if ($plugin['status'] == true){

                if($plugin['url']['css'] != null){

                    array_push($this -> strings[($plugin['location'] != 'cdn')? 'css':'cdn-css'], $this -> location[$plugin['location']] . $plugin['url']['css']);
                }

                if($plugin['url']['js'] != null){
                    array_push($this -> strings[($plugin['location'] != 'cdn')? 'js':'cdn-js'], $this -> location[$plugin['location']] . $plugin['url']['js']);
                }
            }
        }

        switch ($this -> dashboard){
            case 'front':
                foreach($this -> plugins['front-end'] as $plugin){
                    if ($plugin['status'] == true){

                        if($plugin['url']['css'] != null){
                            array_push($this -> strings[($plugin['location'] != 'cdn')? 'css':'cdn-css'], $this -> location[$plugin['location']] . $plugin['url']['css']);
                        }

                        if($plugin['url']['js'] != null){
                            array_push($this -> strings[($plugin['location'] != 'cdn')? 'js':'cdn-js'], $this -> location[$plugin['location']] . $plugin['url']['js']);
                        }
                    }
                }
                break;
            case 'back':
                foreach($this -> plugins['back-end'] as $plugin){
                    if ($plugin['status'] == true){

                        if($plugin['url']['css'] != null){
                            array_push($this -> strings[($plugin['location'] != 'cdn')? 'css':'cdn-css'], $this -> location[$plugin['location']] . $plugin['url']['css']);
                        }

                        if($plugin['url']['js'] != null){
                            array_push($this -> strings[($plugin['location'] != 'cdn')? 'js':'cdn-js'], $this -> location[$plugin['location']] . $plugin['url']['js']);
                        }
                    }
                }
                break;
            case 'hybrid':
                foreach($this -> plugins['front-end'] as $plugin){
                    if ($plugin['status'] == true){

                        if($plugin['url']['css'] != null){
                            array_push($this -> strings[($plugin['location'] != 'cdn')? 'css':'cdn-css'], $this -> location[$plugin['location']] . $plugin['url']['css']);
                        }

                        if($plugin['url']['js'] != null){
                            array_push($this -> strings[($plugin['location'] != 'cdn')? 'js':'cdn-js'], $this -> location[$plugin['location']] . $plugin['url']['js']);
                        }
                    }
                }

                foreach($this -> plugins['back-end'] as $plugin){
                    if ($plugin['status'] == true){

                        if($plugin['url']['css'] != null){
                            array_push($this -> strings[($plugin['location'] != 'cdn')? 'css':'cdn-css'], $this -> location[$plugin['location']] . $plugin['url']['css']);
                        }

                        if($plugin['url']['js'] != null){
                            array_push($this -> strings[($plugin['location'] != 'cdn')? 'js':'cdn-js'], $this -> location[$plugin['location']] . $plugin['url']['js']);
                        }
                    }
                }
                break;
        }

        return $this -> strings;

    }
}
