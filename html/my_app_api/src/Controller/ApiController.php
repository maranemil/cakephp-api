<?php

namespace App\Controller;


use Cake\View\JsonView;
use Cake\View\XmlView;
use DateTime;
use DateTimeZone;

class ApiController extends AppController
{
    public function viewClasses(): array
    {
        return [JsonView::class];
    }

    public function index(): void
    {
        $this->viewBuilder()->setLayout('ajax');
        $this->set('message', "welcome");
        $this->viewBuilder()->setOption('serialize', ['message']);

    }

    public function hello(): void
    {
        $this->viewBuilder()->setLayout('ajax');
        $this->set('message', "hello");
        $this->viewBuilder()->setOption('serialize', ['message']);
    }

    public function howAreYou(): void
    {
        $this->viewBuilder()->setLayout('ajax');
        $this->set('message', "I\'m fine");
        $this->viewBuilder()->setOption('serialize', ['message']);
    }

    /**
     * @throws \Exception
     */
    public function whattimeisit(): void
    {
        $params = $this->request->getAttribute('params');
        $utc_location = "";
        if (isset($params["pass"][1])) {
            $utc_location = $params["pass"][1];
        }
        $message = $this->getMessage($utc_location);

        $this->viewBuilder()->setLayout('ajax');
        $this->set('message', $message);
        $this->viewBuilder()->setOption('serialize', ['message']);
    }

    private function getMessage($utc_location)
    {
        list ($hour, $minutes, $meridiem) = $this->calculateTime($utc_location);
        if ($minutes < 10) {
            $message = "It's $minutes past to $hour $meridiem";
        } else {
            $diff = 60 - $minutes;
            $hourp = $hour++;
            if ($hour == 12) {
                $hourp = 1;
            }
            $message = "It's {$diff} to $hourp $meridiem";
        }
        return $message;
    }

    private function calculateTime($utc_location): array
    {
        if ($utc_location) {
            $strLocation = 'Europe/' . ucwords($utc_location);
            $given = new DateTime('now', new \DateTimeZone($strLocation));
        } else {
            $given = new DateTime('now', new \DateTimeZone('Europe/Berlin'));
        }

        $hm = $given->format("h:i:A");
        $arr_hm = explode(":", $hm);

        $hour = $arr_hm[0];
        $minutes = $arr_hm[1];
        $meridiem = strtolower($arr_hm[2]);

        return [$hour, $minutes, $meridiem];
    }
}
